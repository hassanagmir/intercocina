<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return Group::paginate(10);
    }

    public function show(Group $group)
    {
        $group->load(['types.category','types' => function ($q) {
            $q->orderBy('order', 'asc');
        }]);

        return $group;
    }

}
