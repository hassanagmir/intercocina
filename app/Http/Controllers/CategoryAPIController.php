<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryAPIController extends Controller
{
    public function index()
    {
        return response()->json(Category::select('name', 'slug', 'image', 'status', 'order', 'description')->get());
    }


    public function show($slug)
    {
        $category = Category::where('slug', $slug)
            ->with(['types:id,category_id,name,slug,image,status,order'])
            ->first();
    
        if ($category) {
            return response()->json([
                'category' => $category,
                'types' => $category->types
            ]);
        } else {
            return response()->json(['message' => 'Category not found'], 404);
        }
    }
    

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json($category);
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(null, 204);
    }
}
