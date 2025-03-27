<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeAPIController extends Controller
{
    public function index()
    {
        return response()->json(Type::select('name', 'slug', 'image', 'status', 'order', 'category_id')->get());
    }


    public function show($slug)
    {
        $type = Type::where('slug', $slug)
            ->with([
                'products:id,type_id,name,slug,status,order,price',
                'products.images' => function ($query) {
                    $query->without('dimensions')->select('id', 'product_id', 'image', 'order');
                }
            ])
            ->first();
    
        if ($type) {
            return response()->json($type);
        } else {
            return response()->json(['message' => 'Type not found'], 404);
        }
    }


    public function store(Request $request)
    {
        $type = Type::create($request->all());
        return response()->json($type, 201);
    }


    public function update(Request $request, $id)
    {
        $type = Type::findOrFail($id);
        $type->update($request->all());
        return response()->json($type);
    }

    public function destroy($id)
    {
        Type::destroy($id);
        return response()->json(null, 204);
    }
}
