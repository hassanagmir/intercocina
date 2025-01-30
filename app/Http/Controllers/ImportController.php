<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\Dimension;
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
}
