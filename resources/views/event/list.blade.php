@extends('layouts.base')


@section('content')
<section class="px-4 py-20 md:max-w-6xl md:mx-auto">
    <div class="relative z-10 mx-auto px-6 md:max-w-2xl lg:max-w-5xl lg:px-12">
        <div class="mx-auto text-center lg:w-4/5">
            <h1 class="text-xl font-black text-red-600 sm:text-4xl drop-shadow-md">
                <span class="hidden sm:inline-block">Clés pour Tout Savoir sur les Tendances de la Cuisine et du Design</span>
                <div class="mx-auto block w-max">
                    <div class="relative block pb-2">
                        <span class="absolute inset-0 z-[1] block bg-gradient-to-b from-red-600 via-red-600 to-transparent bg-clip-text text-transparent">Joignez-vous à Nous lors des Événements</span>
                        <span class="absolute inset-0 block bg-gradient-to-l from-[#b6b9b8] to-[#cfd0d1] bg-clip-text text-transparent">Joignez-vous à Nous lors des Événements</span>
                        <span class="block">Joignez-vous à Nous lors des Événements</span>
                    </div>
                    <div class="-mt-4 grow overflow-hidden">
                        <svg class="w-60 sm:w-80" height="22" viewBox="0 0 283 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.24715 19.3744C72.4051 10.3594 228.122 -4.71194 281.724 7.12332" stroke="url(#paint0_linear_18_19)" stroke-width="4"></path>
                            <defs>
                                <linearGradient id="paint0_linear_18_19" x1="282" y1="5.49999" x2="40" y2="13" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#b6b9b8"></stop>
                                    <stop offset="1" stop-color="#cfd0d1"></stop>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>
            </h1>
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