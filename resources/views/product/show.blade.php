@extends('layouts.base')
@section('content')
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Product",
      "name": "{{ $product->name }}",
      "description": "{{ $product->description ?  $product->description : $product->type->description }}",
      "image": "{{ url(config('app.storage'), $image) }}",
      "brand": {
        "@type": "Brand",
        "name": "INTERCOCINA"
      },
      "offers": {
        "@type": "Offer",
        "url": "{{ request()->fullUrl() }}",
        "priceCurrency": "MAD",
        "price": "{{ count($product->dimensions) ? $product->dimensions->first()->price : $product->price }}",
        "availability": "https://schema.org/InStock",
        "itemCondition": "https://schema.org/NewCondition"
      },
      "manufacturer": {
        "@type": "Organization",
        "name": "INTERCOCINA"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4.5",
          "bestRating": "5"
        },
        "author": {
          "@type": "Person",
          "name": "Hassan Agmir"
        }
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.4",
        "reviewCount": "89",
        "bestRating": "5",
        "worstRating": "1"
      }
    }
    </script>
<section class="py-6 md:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class=""  id="product">
            <div class="slider-box w-full h-full max-lg:mx-auto mx-0">
                <!-- Main Swiper -->
                <div class="swiper main-slide-carousel ml-3 swiper-container relative mb-6">
                    <div class="swiper-wrapper pswp-gallery" id="gallery">
                        @foreach ($product->images()->orderBy('order')->get() as $image)
                        <a
                            href="{{ url(config('app.storage'), $image->image) }}"
                            data-pswp-width="1669"
                            data-pswp-height="2500"
                            target="_blank"
                            class="swiper-slide mt-0 image-wrapper loading"
                        >
        
                            <x-image image="{{ url(config('app.storage'), $image->image) }}" alt="{{ $product->name}}" class="max-lg:mx-auto rounded-2xl m-auto max-h-[500px] mt-0" />
                        </a>
                        @endforeach
                    </div>
                </div>
                
                <div class="swiper nav-for-slider mx-2">
                    <div class="swiper-wrapper">
                        @foreach ($product->images()->orderBy('order')->get() as $image)
                        <div class="swiper-slide thumbs-slide image-wrapper loading">
                            <img src="{{ url(config('app.storage'), $image->image)}}" loading="lazy" title="{{ $product->name }}" alt="{{ $product->name }}" width="auto" height="auto" class="cursor-pointer rounded-xl transition-all duration-500 max-h-36">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @livewire('product', ['product' => $product], key($product->id))
        </div>
        
        <div class="mt-6">
            @if ($product->options || $product->content)
            <div class="p-4 rounded-xl border bg-white">
                <h2 class="sm:text-2xl text-xl font-bold">{{ __("Détails du produit")}} {{ $product->name}}</h2>
                @if ($product->options)
                <div class="relative overflow-x-auto border-t-2 border-x-2 sm:rounded-lg mt-4">
                    <table class="w-full text-sm text-left rtl:text-right">
                        <tbody>
                            @foreach ($product->options as $key => $value)
                            <tr class="border-b-2 font-semibold hover:bg-gray-50 duration-500">
                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                    {{ $key }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $value }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                <div class="mt-4 prose">
                    {!! $product->content !!}
                </div>
            </div>
            @endif

            <div>
                <x-share-buttons :product="$product" />
            </div>

            
            
            <div x-data="{modalIsOpen: false}">
                <button x-on:click="modalIsOpen = true" type="button" class="whitespace-nowrap rounded-radius border border-primary bg-primary px-4 py-2 text-center text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0">Open Modal</button>
                <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false" class="z-50 fixed inset-0 z-30 flex items-end justify-center bg-black/0 p-4 pb-8 backdrop-blur-lg sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                    <!-- Modal Dialog -->
                    <div class="flex flex-col gap-4 overflow-hidden rounded-radius border border-outline bg-surface text-on-surface bg-gray-100" x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" >
                        <!-- Dialog Header -->
                        <div class="flex items-center justify-between border-b border-outline bg-surface-alt/60 p-4">
                            <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-on-surface-strong-strong">Salle d'exposition virtuelle</h3>
                            <button x-on:click="modalIsOpen = false" aria-label="close modal">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        <!-- Dialog Body -->
                        <div class="px-4 py-8" id="viewer"> </div>
                    </div>
                </div>
            </div>

            @if ($product->type->category->name == "Parquets")
            <x-floopr-ceatures />
            <div class="bg-white border-2 p-4 rounded-2xl mt-10">
                <div class="block">
                    <h2 class="mb-8 text-2xl font-semibold">Couches</h2>
                    <img src="https://www.kastamonuentegre.com/uploads/2022/12/fr-floorpan.png" alt="">
                </div>
            </div>    
            @endif

            {{-- Recomendation product --}}
            <h2 class="mb-2 mt-3 text-2xl font-black">
                <span class="underline underline-offset-3 decoration-7 decoration-red-400">
                    {{ __("Nos recommandations") }}
                </span>
            </h2>


            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($products as $item)
                <x-product-card name="{{ $item->name}}" price="{{ $item->price() }}" 
                    category="{{ $item?->type?->category->name }}"
                    image="{{ $item->images?->first()?->image }}" slug="{{ $item->slug }}" />
                @endforeach
            </div>
           
            <div class="bg-white border-2 p-4 rounded-2xl mt-10">
                @livewire('rating-form', ['product' => $product], key($product->id))
            </div>
            
            @if(count($product->reviews->where("status", 1)))
                {{-- Rating list --}}
                <div>
                    @livewire('reviews-list', ['product' => $product], key($product->id))
                </div>                
            @endif

        </div>
    </div>
</section>

@endsection