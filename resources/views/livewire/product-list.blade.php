<div>
  <div class="my-4 items-end justify-between space-y-4 md:flex sm:space-y-0 md:mb-8">
      <div>
          <nav class="flex" aria-label="Breadcrumb">
              <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                  <li class="inline-flex items-center">
                      <a href="{{ route('home') }}" class="inline-flex items-center text-md font-bold text-gray-700 hover:text-primary-600">
                          <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                          </svg>
                          {{__("Accueil")}}
                      </a>
                  </li>
                  <li>
                      <div class="flex items-center">
                          <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                          </svg>
                          <a href="{{ route('products') }}" class="ms-1 text-md font-bold text-gray-700 hover:text-primary-600 md:ms-2">
                            {{ $category->name }}
                          </a>
                      </div>
                  </li>
                  <li aria-current="page">
                      <div class="flex items-center">
                          <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                          </svg>
                          <span class="ms-1 text-md font-medium text-gray-500 md:ms-2">{{ $products_type->name }}</span>
                      </div>
                  </li>
              </ol>
          </nav>
          @if (!empty($type) && isset($products_type))
          <h1 class="mt-3 text-xl font-semibold text-gray-900 sm:text-2xl">
              {{ $products_type->name }}
              <svg wire:loading wire:target='changeType' aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-red animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                  <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
              </svg>
          </h1>
          @endif
      </div>
      <div class="flex items-center space-x-0 justify-end flex-wrap gap-2">
          @foreach ($category->types()->where('status', true)->get() as $item)
          <button wire:click='changeType("{{ $item->slug }}")' type="button" class="font-bold {{ $item->slug == $type ? 'bg-red-500 text-white hover:bg-red-400' : 'bg-white hover:bg-gray-100 hover:text-primary-700'}} text-sm px-3 text-nowrap flex w-full items-center justify-center rounded-lg border border-gray-200 py-2 text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 sm:w-auto">
              {{ $item->name }}
              <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
              </svg>
          </button>
          @endforeach
          <a href="{{ route('search') }}" class="sm:hidden flex m-auto justify-center items-center cursor-pointer whitespace-nowrap  w-full rounded-md bg-gray-600 px-4 py-2.5 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0">
               <span class="flex">
                {{ __('Recherche') }}  &#xa0;
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                
               </span>
            </a>
          <livewire:search-modal />
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

  <div wire:loading.remove wire:target='changeType' class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
      @forelse ($products as $product)
          <x-product-card
              :name="$product->name"
              :price="$product->price()"
              :image="$product->images->first()->image ?? ''"
              :slug="$product->slug"
          />
      @empty
          <div class="col-span-full flex justify-center py-6">
              <div>
                  <img class="w-32 m-auto" src="{{ asset('assets/imgs/empty-cart.png') }}" width="80px" height="auto" alt="Empty Products" title="Cart empty" loading="lazy">
                  <p class="mt-3 text-2xl">{{ __("Aucun produit") }} (<strong>{{ $category->name }}</strong>)</p>
              </div>
          </div>
      @endforelse
  </div>
</div>