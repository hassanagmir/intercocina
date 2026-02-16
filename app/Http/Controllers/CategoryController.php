<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category){
        $title = $category->name;
        return view("category.show", compact('category', 'title'));
    }
}
