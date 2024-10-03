@extends('layouts.base')


@section('content')
<section class="px-4 py-20 md:max-w-7xl md:mx-auto">
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
          <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-md font-bold text-gray-700 hover:text-primary-600">
              <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"></path>
              </svg>
              {{__("Accueil")}}
            </a>
          </li>
          <li>
            <div class="flex items-center">
              <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"></path>
              </svg>
              <a href="#" class="ms-1 text-md font-bold text-gray-700 hover:text-primary-600 md:ms-2">
                {{ __("Collections")}}
            </a>
            </div>
          </li>
        </ol>
      </nav>
    <h1 class="text-xl font-semibold">Collection produits intercocina</h1>
    <p class="mb-3">Que vous cherchiez à transformer votre intérieur, à optimiser votre espace de travail ou simplement à vous faire plaisir avec un objet unique, notre catalogue regorge de trésors à découvrir.</p>
    @foreach ($categories as $category)
        @if ($category->types->count())
        <h2 class="mb-3 text-2xl font-black">
            <span class="underline underline-offset-3 decoration-7 decoration-red-400">
                {{__("Collection des")}} {{ $category->name }}
            </span>
        </h2>
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($category->types as $type)
            <div class="rounded-xl">
                <a class="relative flex max-h-96 overflow-hidden rounded-xl bg-gray-200" href="/category/{{ $category->slug }}?type={{ $type->slug }}">
                  @if ($type->image)
                  <img class="object-contain w-full" src="{{ Storage::url($type->image) }}" alt="{{ $type->name }}" title="{{ $type->name }}" width="auto" height="auto" loading="lazy" />
                  @else
                  <img class="object-cover w-full border-2 rounded-xl" src="/assets/imgs/placeholder-image.webp" alt="{{ $type->name }}" title="{{ $type->name }}" width="auto" height="auto" loading="lazy" />
                  @endif
                </a>
                <div class="mt-4 pb-5 ">
                    <a href="/category/{{ $category->slug }}?type={{ $type->slug }}">
                        <h3 class="text-lg font-semibold leading-tight text-gray-900 hover:underline">
                          {{ $type->name }}
                        </h3>
                    </a>
                    <div class="mt-2 mb-5 w-full">
                        <a href="/category/{{ $category->slug }}?type={{ $type->slug }}" class="text-center border-2 relative flex h-9 w-full rounded-full text-red-500 hover:text-white hover:bg-red-500 items-center justify-center px-4 before:absolute before:inset-0 before:rounded-full border-red-500 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 duration-500">
                            <span class="leading-none relative text-base tracking-wider font-semibold">{{__("Voir plus")}}</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    @endforeach
</section>
@endsection