<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{


    public function show(Collection $collection)
    {
        $products = $collection->products;
        $title = $collection->title;
        $description = $collection->description;
        return view('collection.show', compact('collection', 'products', 'title', 'description'));
    }
}
