<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeAPIController extends Controller
{
    public function index()
    {
        return response()->json(
            Type::with(['category' => function ($query) {
                    $query->select('id', 'name', 'slug');
                }])
                ->select('name', 'slug', 'image', 'status', 'order', 'category_id') // Include 'category_id' for the relation to work
                ->get()
        );
    }


    // In your controller
    public function show($slug)
    {
        $type = Type::where('slug', $slug)
            ->with([
                'products' => function ($query) {
                    $query->select('id', 'type_id', 'name', 'slug', 'status', 'order', 'price');
                },
                'products.images' => function ($query) {
                    $query->select('id', 'product_id', 'image', 'order');
                }
            ])
            ->first();
    
        return $type 
            ? response()->json($type) 
            : response()->json(['message' => 'Type not found'], 404);
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
