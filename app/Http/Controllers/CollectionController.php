<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{

    public function index()
    {
        return Collection::with([
            'products' => function ($q) {
                $q->latest()->take(4);
            },
            'products.images'
        ])
        ->select('id', 'title', 'image', 'description', 'end_date', 'slug')
        ->latest()
        ->paginate(6);
    }

    public function show(Collection $collection)
    {
        $collection->load('products.images');
        return $collection;
    }
}
