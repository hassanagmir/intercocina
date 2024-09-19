<section class="py-8 antialiased md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <form class="flex mt-3 max-w-xl">   
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                    </svg>
                </div>
                <input type="text" wire:model.live="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full ps-10 p-2.5 " placeholder="{{__("Recherche...")}}" required />
            </div>
            <button type="submit" class="p-2.5 px-4 ms-2 text-sm font-medium text-white bg-red-500 rounded-lg border border-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
        <div wire:loading.remove wire:target='changeType' class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
                <x-product-card
                    name="{{ $product->name}}"
                    price="{{ $product->price() }}"
                    image="{{ $product->images?->first()?->image }}"
                    slug="{{ $product->slug }}"
                 />
            @endforeach
        </div>
        <div class="m-auto w-full">
            @if ($search == "")
                <div class="text-lg font-semibold text-center">{{ __("Commencez à taper pour rechercher") }}</div>
            @elseif(count($products) == 0)
                <div class="text-lg font-semibold text-center">{{ __("No produits") }} ({{ $search }})</div>
            @endif
        </div>
    </div>
  </section>