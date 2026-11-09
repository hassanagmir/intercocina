<div>
    <div class="container mx-auto px-4">
        <div class="text-center mb-3">
            <!-- Title Section -->
            @if (!empty($type) && isset($products_type))
                <div class="mb-4">
                    <h1 class="text-xl md:text-2xl font-bold text-gray-900 flex items-center justify-center gap-2">
                        <span class="bg-gradient-to-r from-red-600 to-red-400 bg-clip-text text-transparent">
                            {{ $products_type->name }}
                        </span>
                        <svg 
                            wire:loading 
                            wire:target='changeType'
                            class="inline w-5 h-5 text-red-500 animate-spin" 
                            viewBox="0 0 24 24"
                        >
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"/>
                        </svg>
                    </h1>
                </div>
            @endif
{{--     
            @if ($category->description)
                <p class="text-lg text-gray-600 mb-6">{{ $category->description }}</p>
            @endif --}}
    
            <!-- Controls Section -->
            <div class="flex flex-wrap justify-center items-center gap-4">
                <!-- Type Filters -->
                <div class="flex flex-wrap items-center justify-center gap-2">
                    @foreach ($category->types()->where('status', true)->orderBy('order')->get() as $item)
                        <button 
                            wire:click='changeType("{{ $item->slug }}")' 
                            type="button"
                            aria-label="{{ __('Filter products by type') }}: {{ $item->name }}"
                            class="flex items-center gap-1.5 px-4 py-2 text-sm font-semibold transition-all duration-200 rounded-full shadow-sm
                                   {{ $item->slug == $type 
                                       ? 'bg-red-600 text-white hover:bg-red-700 shadow-red-200' 
                                       : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-200 hover:border-gray-300' }}"
                        >
                            {{ $item->name }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    @endforeach

                     <!-- Search Button -->
                    <div class="md:ml-4">
                        <a 
                            href="{{ route('search') }}" 
                            class="md:hidden flex gap-3 cursor-pointer whitespace-nowrap rounded-full px-7 bg-gray-600 shadow-sm py-2.5 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0"
                            aria-label="{{ __('Open search') }}"
                        >
                            <span>{{ __('Recherche') }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </a>
                    </div>
                    <livewire:search-modal />
                </div>
    
               
            </div>
        </div>
    </div>

    <div wire:loading wire:target="changeType" class="w-full">
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            <x-skeleton />
            <x-skeleton />
            <x-skeleton />
            <x-skeleton />
        </div>
    </div>

    <div 
        wire:loading.remove 
        wire:target='changeType' 
        class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-4"
    >
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
            <div class="col-span-full flex justify-center py-6">
                <div>
                    <img 
                        class="w-32 m-auto" 
                        src="{{ asset('assets/imgs/empty-cart.png') }}" 
                        width="80px" 
                        height="auto" 
                        alt="{{ __('No products available') }}" 
                        title="{{ __('Cart empty') }}" 
                        loading="lazy"
                    >
                    <p class="mt-3 text-2xl">
                        {{ __("Aucun produit") }} (<strong>{{ $category->name }}</strong>)
                    </p>
                </div>
            </div>
        @endforelse
    </div>
</div>