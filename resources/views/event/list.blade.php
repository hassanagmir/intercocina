@extends('layouts.base')


@section('content')
<section class="px-4 py-20 md:max-w-6xl md:mx-auto">
    <div class="px-3 max-w-3xl m-auto">
        <div class="">
             <h2 class="mb-4 text-3xl font-bold text-center md:text-4xl" x-animate.intersect="fadeInUp">
                Joignez-vous à Nous lors des Événements
             </h2>
             <p class="text-center text-slate-500 md:text-lg" x-animate.intersect.delay.100="fadeInUp">
                Clés pour Tout Savoir sur les Tendances de la Cuisine et du Design.
             </p>
        </div>
     </div>
    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4 mt-8">
        @foreach ($events as $event)
            <div class="rounded-xl bg-white border-2 border-gray-400 overflow-hidden">
                <a class="relative flex sm:h-96 h-auto overflow-hidden bg-gray-300" href="{{ route('event.show', $event->slug) }}">
                    <img class="object-cover w-full h-full border-gray-400" src="{{ $event->getFirstMediaUrl() }}" alt="{{ $event->title }}" title="{{ $event->title }}" loading="lazy" width="100%" height="100%" />
                </a>
                <div class="mt-4 pb-5 px-3">
                    <a href="{{ route('event.show', $event->slug) }}">
                        <h2 class="text-lg font-semibold leading-tight text-gray-900">{{ $event->title }}</h2>
                    </a>
                    <div class="mt-2 flex items-center justify-between">
                        <p class="w-full">
                            <span class="text-sm text-slate-900">{{ Str::limit($event->description, 80, "....") }}</span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection