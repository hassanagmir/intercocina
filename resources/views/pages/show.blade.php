@extends('layouts.base')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-20 overflow-x-hidden md:overflow-visible">
    <article class="px-4 mx-auto max-w-screen-xl">
        <h1 class="mb-2 text-3xl font-bold text-gray-900">{{ $page->title }}</h1>
        <div class="font-semibold mb-8 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M12 6v6h4.5"/><circle cx="12" cy="12" r="9"/></g></svg>
            <span>{{ $page->created_at->format('M, d Y')}}</span>
        </div>
        <div class="prose text-xl ">{!! $page->content !!}</div>
    </article>
</div>
@endsection