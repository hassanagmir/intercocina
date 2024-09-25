@extends('layouts.base')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-20 overflow-x-hidden md:overflow-visible">
    <article class="px-4 mx-auto max-w-screen-xl prose-img:w-full prose-h2:text-2xl prose-h3:text-xl prose-h4:text-md prose-h5:text-md prose-h2:underline prose-h2:underline-offset-3 prose-h2:decoration-7 prose-h2:decoration-red-400">
        <h1 class="mb-2 text-3xl font-bold text-gray-900">{{ $page->title }}</h1>
        <div class="font-semibold mb-8 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="me-3" width="23" height="23" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M12 6v6h4.5"/><circle cx="12" cy="12" r="9"/></g></svg>
            <span>{{ $page->created_at->format('M, d Y')}}</span>
        </div>
        <div class="prose text-xl ">{!! $page->content !!}</div>
    </article>
</div>
@endsection