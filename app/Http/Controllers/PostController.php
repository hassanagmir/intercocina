<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::select('title', 'slug', 'image', 'created_at')->latest()->paginate(20));
    }

    public function list()
    {
        return response()->json(Post::select('title', 'slug', 'image', 'created_at')->latest()->take(3)->get());
    }



    public function show($slug)
    {
        $post = Post::with([
            'products' => function ($query) {
                $query->select([
                    'products.id',
                    'products.name',
                    'products.price',
                    'products.description',
                    'products.slug',
                    'products.status',
                    'products.order',
                    'products.is_new',
                    'products.family_id',
                ]);
            },

            'products.firstImage' => function ($query) {
                $query->select([
                    'images.id',
                    'images.product_id',
                    'images.image',
                    'images.order',
                ]);
            },
        ])
            ->where('slug', $slug)
            ->first();

        if (!$post) {
            return response()->json([
                'message' => 'post not found',
            ], 404);
        }

        $post->products->each(function ($product) {
            $image = $product->firstImage?->image;

            $product->unsetRelation('firstImage');

            $product->setAttribute('first_image', $image);
        });

        return response()->json($post);
    }
}
