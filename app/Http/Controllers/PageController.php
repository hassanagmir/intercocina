<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{


    public function index(Request $request): JsonResponse
    {
        $perPage = min($request->integer('per_page', 15), 100);

        $pages = Page::query()
            ->select('id', 'title', 'slug', 'created_at', 'image')
            ->latest()
            ->paginate($perPage);

        return response()->json($pages);
    }

    public function show(Page $page): JsonResponse
    {
        return response()->json($page);
    }
}
