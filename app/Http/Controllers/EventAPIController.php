<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventAPIController extends Controller
{
    public function index()
    {
        $events = Event::paginate(10);
        return response()->json($events);
    }
}
