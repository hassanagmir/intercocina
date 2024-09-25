@extends('layouts.base')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-20 overflow-x-hidden md:overflow-visible">
    <div class="px-4 mx-auto max-w-screen-xl">
        <h1 class="mb-8 text-2xl font-bold text-gray-900">{{ __("Derniers blog articles") }}</h1>
        <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
            <article class="w-full">
                <a href="{{ route('post.show', $post->slug)}}">
                    <img src="{{ Storage::url($post->image) }}" class="bg-[#dddddd] border h-80 mb-5 object-contain rounded-lg w-full" alt="{{ $post->title }}" width="100%" height="100%" title="{{ $post->title }}" loading="lazy">
                </a>
                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">
                    <a href="{{ route('post.show', $post->slug)}}">{{ $post->title }}</a>
                </h2>
                <p class="mb-4 text-gray-500">{{ Str::limit($post->description, 90, "...")}}</p>
                <a href="{{ route('post.show', $post->slug)}}" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 hover:no-underline">
                    {{ __("En savoir plus sur nous") }} →
                </a>
            </article>
            @endforeach
        </div>
        @if (!$posts->count())
            <div  class="flex justify-center py-5">
               <div class="m-auto">
                    <svg class="text-center m-auto text-gray-600" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M3.25 13h3.68a2 2 0 0 1 1.664.89l.812 1.22a2 2 0 0 0 1.664.89h1.86a2 2 0 0 0 1.664-.89l.812-1.22A2 2 0 0 1 17.07 13h3.68"/><path d="m5.45 4.11l-2.162 7.847A8 8 0 0 0 3 14.082V19a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4.918a8 8 0 0 0-.288-2.125L18.55 4.11A2 2 0 0 0 16.76 3H7.24a2 2 0 0 0-1.79 1.11"/></g></svg>
                    <div class="text-xl mt-3">{{ __("Aucun article de blog") }}</div>
               </div>
            </div>
        @endif
        <div  class="flex justify-center py-5">
            {{ $posts->links()}}
        </div>
    </div>
</div>
@endsection