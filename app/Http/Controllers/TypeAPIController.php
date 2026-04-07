<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeAPIController extends Controller
{
    public function index()
    {
        return response()->json(
            Type::where('status', 1)->with(['category' => function ($query) {
                    $query->select('id', 'name', 'slug');
                }])
                ->select('name', 'slug', 'image', 'status', 'order', 'category_id')
                ->orderBy('order')
                ->where('status', 1)
                ->get()
        );
    }


    public function show($slug)
    {
        $type = Type::where('slug', $slug)
            ->with([
                'products' => function ($query) {
                    $query->select('id', 'type_id', 'name', 'slug', 'status', 'order', 'price')
                    ->whereIn("status", [1, 5])
                    ->orderBy('order');
                },
                'products.images' => function ($query) {
                    $query->orderBy('order')->select('id', 'product_id', 'image', 'order');
                }
            ])
            ->first();

        return $type
            ? response()->json($type)
            : response()->json(['message' => 'Type not found'], 404);
    }


    public function store(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $type = Type::create($request->all());
            return response()->json($type, 201);
        }
        return response()->json(['message' => "Unauthorized", 401]);

    }


    public function update(Request $request, $id)
    {
        if(auth()->user()->hasRole('admin')){
            $type = Type::findOrFail($id);
            $type->update($request->all());
            return response()->json($type);
        }

        return response()->json(['message' => "Unauthorized", 401]);

    }

    public function destroy($id)
    {
        if(auth()->user()->hasRole('admin')){
            Type::destroy($id);
            return response()->json(null, 204);
        }
        return response()->json(['message' => "Unauthorized", 401]);
    }
}
