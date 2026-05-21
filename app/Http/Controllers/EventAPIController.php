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
            $url = $event->getFirstMediaUrl('default') ?: null;

            if ($url && preg_match('/\]\((https?:\/\/[^)]+)\)/', $url, $matches)) {
                $url = $matches[1];
            }

            if ($url && str_starts_with($url, '/storage/')) {
                $url = config('app.url') . $url;
            }

            $event->image = $url;
            unset($event->media);
            return $event;
        });

        return response()->json($events);
    }

    public function show(Event $event)
    {
        $images = $event->getMedia('default')->map(function ($media) {
            $url = $media->getUrl();

            // Strip markdown link format if present: [text](url)
            if (preg_match('/\]\((https?:\/\/[^)]+)\)/', $url, $matches)) {
                $url = $matches[1];
            }

            // Handle relative /storage/... path
            if (str_starts_with($url, '/storage/')) {
                $url = config('app.url') . $url;
            }

            return $url;
        });

        return response()->json([
            'id'          => $event->id,
            'title'       => $event->title,
            'city'        => $event->city,
            'description' => $event->description,
            'content'     => $event->content,
            'created_at'  => $event->created_at,
            'images'      => $images,
        ]);
    }


}
