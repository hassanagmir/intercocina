<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\Dimension;
use App\Models\Family;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ImportController extends Controller
{
    public function caisson(Request $request)
    {
        ini_set('max_execution_time', 3600);
        set_time_limit(3600);
        $request->validate([
            'jsonFile' => ['required', 'file', 'max:9048'],
        ]);

        $jsonData = json_decode($request->file('jsonFile')->getContent(), true);

        if (!is_array($jsonData)) {
            return response()->json(['message' => 'Invalid JSON format'], 400);
        }

        $processedData = collect($jsonData)->map(function ($item) {

            return DB::transaction(function () use ($item) {
                $category = Category::firstOrCreate(['name' => $item['category']]);

                $type = Type::firstOrCreate([
                    'name' => $category->name . " " . $item['type'],
                    'category_id' => $category->id,
                ]);


                if (isset($item['color'])) {
                    $color = Color::firstOrCreate([
                        'name' => ucfirst($item['color']),
                    ]);
                }

                if (isset($item['attribute'])) {
                    $attribute = Attribute::firstOrCreate(
                        ['name' => ucfirst($item['attribute'])],
                        ['category_id' => $category->id]
                    );
                }


                $product = Product::firstOrCreate(
                    ['name' =>  $type->name . " " . $item['name']],
                    [
                        'type_id' => $type->id,
                        'price' => isset($item['dimensions']) ? null : $item['price'],
                        'code' => isset($item['dimensions']) ? null : $item['code']
                    ]
                );

                // $product->code = $item['code'];
                // $product->save();

                if (isset($item['color'])) {
                    $product->colors()->syncWithoutDetaching([$color->id]);
                }

                if (isset($item['attribute'])) {
                    $product->attributes()->syncWithoutDetaching([$attribute->id]);
                }

                if (isset($item["height_unit"])) {
                    switch ($item['height_unit']) {
                        case 'mm':
                            $height_unit = 1;
                            break;

                        case 'cm':
                            $height_unit = 2;
                            break;

                        case 'm':
                            $height_unit = 3;
                            break;
                    }
                }


                if (isset($item['dimensions'])) {

                    if (strpos($item['dimensions'], '*') !== false) {
                        $height = explode('*', $item['dimensions'])[0];
                        $width = explode('*', $item['dimensions'])[1];
                    } else {
                        $height = $item['dimensions'];
                        $width = null;
                    }


                    return Dimension::firstOrCreate(
                        ['code' => $item['code']],
                        [
                            'price' => $item['price'],
                            'height' => $height,
                            'width' => $width,
                            'product_id' => $product->id,
                            'color_id' => isset($item['color']) ? $color->id : null,
                            'height_unit' =>  isset($height_unit) ? $height_unit : null,
                            'attribute_id' => isset($item['attribute']) ? $attribute->id : null,
                            'depth' => isset($item['depth']) ? $item['depth']  : null,
                            'thicknesse' => isset($item['thickness']) ? $item['thickness']  : null,
                        ]
                    );
                }

                return $product;
            });
        });

        return response()->json(['data' => $processedData]);
    }


    public function laca()
    {
        return view('import.laca');
    }

    public function laca_store(Request $request)
    {
        ini_set('max_execution_time', 3600);
        set_time_limit(3600);

        $request->validate([
            'jsonFile' => ['required', 'file', 'max:9048'],
        ]);

        $jsonData = json_decode($request->file('jsonFile')->getContent(), true);

        if (!is_array($jsonData)) {
            return response()->json(['message' => 'Invalid JSON format'], 400);
        }

        $processedData = collect($jsonData)->map(function ($item) {

            return DB::transaction(function () use ($item) {

                // --- Category ---
                $category = Category::firstOrCreate(['name' => $item['category']]);

                // --- Family (optional) — looked up by code from JSON ---
                $family = null;
                if (isset($item['family'])) {
                    $family = Family::where('code', $item['family'])->first();
                }

                // --- Type ---
                $type = Type::firstOrCreate([
                    'name'        => $category->name . " " . $item['type'],
                    'category_id' => $category->id,
                ]);

                // --- Color (optional) ---
                $color = null;
                if (isset($item['color'])) {
                    $color = Color::firstOrCreate([
                        'name' => ucwords(strtolower($item['color'])),
                    ]);
                }

                // --- Attribute (optional) ---
                $attribute = null;
                if (isset($item['attribute'])) {
                    $attribute = Attribute::firstOrCreate(
                        ['name' => ucfirst($item['attribute'])],
                        ['category_id' => $category->id]
                    );
                }

                // --- Product ---
                $product = Product::firstOrCreate(
                    ['name' => $type->name . " " . $item['name']],
                    [
                        'type_id'   => $type->id,
                        'family_id' => $family?->id,              // ← new
                        'price'     => isset($item['dimensions']) ? null : ($item['price'] ?? null),
                        'code'      => isset($item['dimensions']) ? null : ($item['code']  ?? null),
                    ]
                );

                if ($color) {
                    $product->colors()->syncWithoutDetaching([$color->id]);
                }

                if ($attribute) {
                    $product->attributes()->syncWithoutDetaching([$attribute->id]);
                }

                // --- Height unit (optional) ---
                $height_unit = null;
                if (isset($item['height_unit'])) {
                    $height_unit = match ($item['height_unit']) {
                        'mm'    => 1,
                        'cm'    => 2,
                        'm'     => 3,
                        default => null,
                    };
                }

                // --- Thickness unit (optional) ---
                $thickness_unit = null;
                if (isset($item['thickness_unit'])) {
                    $thickness_unit = match ($item['thickness_unit']) {
                        'mm'    => 1,
                        'cm'    => 2,
                        'm'     => 3,
                        default => null,
                    };
                }

                // --- Dimensions ---
                if (isset($item['dimensions'])) {

                    if (strpos($item['dimensions'], '*') !== false) {
                        [$height, $width] = explode('*', $item['dimensions']);
                    } else {
                        $height = $item['dimensions'];
                        $width  = null;
                    }

                    return Dimension::firstOrCreate(
                        ['code' => $item['code']],
                        [
                            'price'          => $item['price']     ?? null,
                            'height'         => $height,
                            'width'          => $width,
                            'product_id'     => $product->id,
                            'color_id'       => $color?->id,
                            'height_unit'    => $height_unit,
                            'attribute_id'   => $attribute?->id,
                            'depth'          => $item['depth']     ?? null,
                            'thicknesse'     => $item['thickness'] ?? null,
                            'thickness_unit' => $thickness_unit,   // ← new
                        ]
                    );
                }

                return $product;
            });
        });

        return response()->json(['data' => $processedData]);
    }
}
