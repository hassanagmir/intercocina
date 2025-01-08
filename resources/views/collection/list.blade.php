@extends('layouts.base')


@section('content')
<section class="px-4 py-4 md:py-20 md:max-w-full md:flex gap-3 bg-gray-100">

   <div class="w-full md:w-9/12">
    <h1 class="text-xl font-semibold">Collection produits intercocina</h1>
    <p class="mb-3">Que vous cherchiez à transformer votre intérieur, à optimiser votre espace de travail ou simplement à vous faire plaisir avec un objet unique, notre catalogue regorge de trésors à découvrir.</p>
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
    </div>
   </div>
</section>
@endsection