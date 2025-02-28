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
        <div id="product">
            <div class="slider-box w-full h-full max-lg:mx-auto mx-0 hidden">
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
            <div class="hidden">
                @livewire('product', ['product' => $product], key($product->id))
            </div>
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

            
            @if ($product->color)
            <div class="w-full mt-6 cursor-pointer" x-data="{modalIsOpen: false}">
                <span id="color_id" class="hidden">{{$product->color->id}}</span>
                <section x-on:click="modalIsOpen = true" class="rounded-xl p-6 relative flex flex-col transition-all duration-300 group bg-white hover:bg-red-50 border border-red-100 shadow-sm hover:shadow-md text-black">
                  <!-- Updated testimonial content -->
                  <div class="font-medium text-base md:text-lg text-gray-700 mb-4 grow text-center">
                    <p class="mb-6 text-2xl">Cliquez ici pour voir la couleur actuelle dans la cuisine virtuelle.</p>
                  </div>
                  
                  <!-- Virtual kitchen view button -->
                  <div class="mb-4 flex justify-center">
                    <span class="relative inline-flex items-center gap-2 py-2 px-4 rounded-lg bg-red-100 text-red-700 font-medium group-hover:bg-red-200 transition-colors duration-300 z-20 pointer-events-none">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="animate-pulse">
                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg>
                      Salle d'exposition virtuelle
                    </span>
                  </div>
                </section>
                
                <!-- Modal separated from the section to avoid click propagation issues -->
                <div x-cloak 
                     x-show="modalIsOpen" 
                     x-transition.opacity.duration.200ms 
                     x-trap.inert.noscroll="modalIsOpen" 
                     x-on:keydown.escape.window="modalIsOpen = false" 
                     x-on:click.self="modalIsOpen = false" 
                     class="z-50 fixed inset-0 flex items-end justify-center bg-black/50 p-4 pb-8 backdrop-blur-lg sm:items-center lg:p-8" 
                     role="dialog" 
                     aria-modal="true" 
                     aria-labelledby="defaultModalTitle">
                  <!-- Modal Dialog -->
                  <div class="flex flex-col gap-4 overflow-hidden rounded-radius border border-outline bg-surface text-on-surface bg-gray-100" 
                       x-show="modalIsOpen" 
                       x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" 
                       x-transition:enter-start="scale-0" 
                       x-transition:enter-end="scale-100"
                       @click.away="modalIsOpen = false">
                    <!-- Dialog Header -->
                    <div class="flex items-center justify-between border-b border-outline bg-surface-alt/60 p-4">
                      <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-on-surface-strong-strong text-xl">Salle d'exposition virtuelle</h3>
                      <button @click="modalIsOpen = false" aria-label="close modal" class="p-2 hover:bg-gray-200 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                      </button>
                    </div>
                    <!-- Dialog Body -->
                    <div class="px-4 py-8" id="viewer"></div>
                  </div>
                </div>
              </div>
            @endif
            <div>
                <x-share-buttons :product="$product" />
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