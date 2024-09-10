@extends('layouts.base')


@section('content')
<section class="px-4 py-20 md:max-w-6xl md:mx-auto">
  <h1 class="text-4xl mb-3 font-semibold">{{ $event->title }}</h1>
  <p class="mb-4 font-semibold text-gray-800">{{ $event->description }}</p>
  <div class="swiper">
    <div class="swiper-wrapper">
      @foreach ($event->getMedia() as $image)
      <div class="swiper-slide">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="{{ $image->getUrl() }}" alt="Card 1" class="w-full h-80 object-cover">
        </div>
      </div>
      @endforeach

    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>

  <article class="mt-5 prose">
    {!! $event->content !!}
  </article>
</section>
@endsection