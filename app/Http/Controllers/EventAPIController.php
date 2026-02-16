<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventAPIController extends Controller
{
    public function index()
    {
        $events = Event::select('id', 'city', 'title', 'description', 'slug')
            ->with('media')
            ->paginate(10);

        $events->getCollection()->transform(function ($event) {
            $event->image = $event->getFirstMediaUrl('default'); 
            return $event;
        });

        return response()->json($events);
    }

    public function show(Event $event)
    {
        return response()->json([
            'id'          => $event->id,
            'title'       => $event->title,
            'city'        => $event->city,
            'description' => $event->description,
            'content'     => $event->content,
            'created_at'     => $event->created_at,
            'images'      => $event->getMedia('default')->map(fn($m) => $m->getUrl()),
        ]);
    }


}
