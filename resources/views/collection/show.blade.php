@extends('layouts.base')

@section('content')
<section class="px-4 py-4 md:py-20 md:max-w-full md:flex gap-3 bg-gray-100 m-auto flex justify-center">
    <div class="w-full md:w-9/12">
        <h1 class="text-2xl font-semibold mb-4">{{ $collection->title }}</h1>
        <p class="mb-3">{{ $collection->description }}</p>
        <img class="mb-4 rounded-lg" src="{{ asset('assets/ads/offres.webp')}}" alt="">
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @forelse ($products as $product)
                <x-product-card
                    :name="$product->name"
                    :price="$product->price()"
                    :image="$product->images->first()->image ?? ''"
                    :slug="$product->slug"
                    :category="$product->type->category->name ?? ''"
                    loading="lazy"
                />
            @empty
                <p>Aucun produit trouvé</p>
            @endforelse
        </div>
    </div>
</section>
@endsection