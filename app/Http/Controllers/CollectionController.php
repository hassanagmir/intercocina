<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{

    public function index()
    {
        return Collection::with([
            'products.images' => function ($query) {
                $query->take(3);
            }
        ])
            ->select('id', 'title', 'image', 'description', 'end_date')
            ->latest()
            ->paginate(3);
    }


    public function show(Collection $collection)
    {
        $collection->load('products.images');
        return $collection;
    }
}
