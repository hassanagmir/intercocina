<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function list(){
        $title = __("Événements et exposition");
        $events = Event::paginate(20);
        return view("event.list", compact('title', 'events'));
    }


    public function show(Event $event){
        $title = $event->title;
        return view("event.show", compact('title', 'event'));
    }
}
