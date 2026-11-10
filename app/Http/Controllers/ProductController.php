<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatusEnum;
use App\Exports\ArticleExport;
use App\Models\Dimension;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /** Statuses for which a related product is considered visible. */
    private const VISIBLE_RELATED_STATUSES = [1, 5];

    private const SEARCH_LIMIT = 15;

    /**
     * Display a product with its relations.
     */
    public function show(Product $product): Product
    {
        return $product
            ->load([
                'products:id,slug,name,description,price,is_new,family_id',
                'products.images' => fn($q) => $q->select('image', 'id', 'product_id')->orderBy('order'),
                'images'         => fn($q) => $q->select('image', 'id', 'product_id', 'color_id')->orderBy('order'),
                'type',
                'piece:id,product_id,title,description,file',
                'color',
            ])
            ->loadCount('reviews');
    }

    /**
     * List related products that have at least one visible product.
     */
    public function relatedProducts(Product $product)
    {
        return $product->products()
            ->with([
                'products:id,type_id,name,slug,status,order,price,is_new,family_id',
                'products.images:id,product_id,image,order',
            ])
            ->whereHas('products', fn($query) => $query->whereIn('status', self::VISIBLE_RELATED_STATUSES))
            ->get();
    }

    /**
     * List approved reviews for a product.
     */
    public function reviews(string $slug): JsonResponse
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $reviews = $product->reviews()
            ->where('status', 1)
            ->select('full_name', 'comment', 'stars')
            ->latest()
            ->get();

        return response()->json($reviews);
    }

    /**
     * Return the attributes, colors and dimensions available for a product.
     */
    public function dimensions(string $slug): JsonResponse
    {
        $product = Product::where('slug', $slug)->first();

        if (! $product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json([
            'attributes' => $product->attributes()
                ->select('attributes.id', 'attributes.name')
                ->get(),

            'colors' => $product->colors()
                ->select('colors.id', 'colors.name', 'colors.image', 'colors.code')
                ->get()
                ->map(fn($color) => $color->only(['id', 'name', 'code', 'image'])),

            'dimensions' => $product->dimensions()
                ->select('id', 'product_id', 'width', 'height', 'price', 'code', 'color_id', 'attribute_id')
                ->with('color:id,name,code')
                ->get(),
        ]);
    }

    /**
     * Search visible products by name, description, code, dimension code or tags.
     */
    public function search(Request $request): JsonResponse
    {
        $term = trim((string) $request->input('search'));

        if ($term === '') {
            return response()->json([]);
        }

        $like = '%' . addcslashes($term, '%_\\') . '%';

        $products = Product::query()
            ->with('images')
            ->where('status', '!=', ProductStatusEnum::HIDE)
            ->whereHas('type', fn($query) => $query->where('status', true))
            ->where(function ($query) use ($like) {
                $query->whereRaw('LOWER(name) LIKE LOWER(?)', [$like])
                    ->orWhereRaw('LOWER(description) LIKE LOWER(?)', [$like])
                    ->orWhere('code', 'like', $like)
                    ->orWhereHas('dimensions', fn($q) => $q->where('code', 'like', $like))
                    ->orWhereRaw('LOWER(tags) LIKE LOWER(?)', [$like]);
            })
            ->orderByRaw(
                'CASE
                    WHEN LOWER(name) LIKE LOWER(?) THEN 1
                    WHEN LOWER(description) LIKE LOWER(?) THEN 2
                    ELSE 3
                 END',
                [$like, $like]
            )
            ->select(['id', 'name', 'price', 'slug', 'type_id'])
            ->limit(self::SEARCH_LIMIT)
            ->get();

        return response()->json($products);
    }

    /**
     * Export all products and their dimensions to an Excel file.
     */
    public function exportProducts(): JsonResponse|BinaryFileResponse
    {

        ini_set('memory_limit', '512M');
        set_time_limit(300);


        if (! auth()->user()->hasRole('super_admin')) {
            return response()->json(['message' => 'Unauthorized access.'], 403);
        }

        $rows = collect(DB::select($this->exportQuery()))
            ->map(fn($row) => [
                'Ref'        => $row->Ref,
                'Desg'       => trim($row->Desg),
                'Dimension'  => $row->Dimension,
                'Profondeur' => $row->Profondeur,
                'Epaisseur'  => $row->Epaisseur,
                'Prix'       => $row->Prix,
                'Couleur'    => $row->Couleur,
            ])
            ->all();

        return Excel::download(new ArticleExport($rows), 'products.xlsx');
    }

    public function colorImage(int $product, int $color)
    {
        $image = Image::query()
            ->where('product_id', $product)
            ->where('color_id', $color)
            ->orderBy('order')
            ->value('image');

        return response()->json([
            'image' => $image
                ? url(preg_replace(
                    '#(/storage/)+#',
                    '/storage/',
                    Storage::url($image)
                ))
                : null,
        ]);
    }

    /**
     * SQL for the export: one row per dimension, plus products without dimensions.
     */
    private function exportQuery(): string
    {
        return <<<'SQL'
        SELECT
            D.code AS Ref,
            CONCAT(COALESCE(A.name, ''), ' ', REPLACE(P.name, 'Façade ', '')) AS Desg,
            D.dimension AS Dimension,
            D.depth AS Profondeur,
            D.thicknesse AS Epaisseur,
            D.price AS Prix,
            C.name AS Couleur
        FROM dimensions D
        INNER JOIN products P ON P.id = D.product_id
        LEFT JOIN attributes A ON A.id = D.attribute_id
        LEFT JOIN colors C ON C.id = D.color_id

        UNION ALL

        SELECT
            P.code AS Ref,
            REPLACE(P.name, 'Façade ', '') AS Desg,
            NULL AS Dimension,
            NULL AS Profondeur,
            NULL AS Epaisseur,
            P.price AS Prix,
            NULL AS Couleur
        FROM products P
        WHERE P.code IS NOT NULL
          AND NOT EXISTS (
              SELECT 1 FROM dimensions D WHERE D.product_id = P.id
          )
    SQL;
    }


    public function imagesByCode(string $code): JsonResponse
    {
        $dimension = null;

        $product = Product::where('code', $code)->first();

        if (! $product) {
            $dimension = Dimension::with('product')->where('code', $code)->first();
            $product   = $dimension?->product;
        }

        if (! $product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }

        $images = $product->images()
            ->select('id', 'product_id', 'color_id', 'image', 'order')
            ->orderBy('order')
            ->get();

        if ($dimension?->color_id) {
            $colorImages = $images->where('color_id', $dimension->color_id);

            if ($colorImages->isNotEmpty()) {
                $images = $colorImages->values();
            }
        }

        return response()->json([
            'product_id' => $product->id,
            'code'       => $code,
            'images'     => $images->map(fn($image) => [
                'id'       => $image->id,
                'color_id' => $image->color_id,
                'order'    => $image->order,
                'url'      => Str::startsWith($image->image, ['http://', 'https://'])
                    ? $image->image
                    : Storage::disk('public')->url($image->image),
            ])->values(),
        ]);
    }
}
