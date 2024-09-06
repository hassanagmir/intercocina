<div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
    <div class="mx-auto w-full flex-none lg:max-w-1xl xl:max-w-3xl">
        <div class="space-y-6">
            <!-- Card -->
            @forelse( \Cart::getContent() as $product)
            <div wire:key='{{ $product->id }}' class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                    <a href="#" class="shrink-0 md:order-1">
                        <img class="h-20 w-20 dark:hidden" src="{{ Storage::url($product['attributes']['image']) }}" alt="Product image">
                    </a>
                    <label for="counter-input" class="sr-only">Choose quantity:</label>
                    <div class="flex items-center justify-between md:order-3 md:justify-end">
                        <div class="flex items-center">
                            <button type="button" id="decrement-button" data-input-counter-decrement="counter-input" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"></path>
                                </svg>
                            </button>
                            <input type="text" id="counter-input" class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white" placeholder="1" value="{{ $product['quantity']}}" required>
                            <button type="button" id="increment-button" data-input-counter-increment="counter-input" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="text-end md:order-4 md:w-32">
                            <p class="text-base font-bold text-gray-900 dark:text-white">{{ $product['price'] }} MAD</p>
                        </div>
                    </div>
        
                    <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                        <a href="{{ route('product.show', $product['attributes']['slug']) }}" class="text-base font-bold text-gray-900 hover:underline dark:text-white">
                            {{ $product['name'] }} - 
                            {{ $product['attributes']['dimension'] ? $product['attributes']['dimension'] . " mm" : '' }} 
                            {{ $product['attributes']['color'] ? "(" .$product['attributes']['color'] . ")" : ''}}
                        </a>
                        <div class="flex items-center gap-4">
                            <button wire:click="delete('{{ $product['id'] }}')" type="button" class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
        
                                <svg wire:loading.remove wire:target="delete('{{ $product['id'] }}')" class="me-1.5 h-5 w-5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"></path>
                                </svg>
        
        
                                <div role="status" wire:loading wire:target="delete('{{ $product['id'] }}')">
                                    <svg aria-hidden="true" class="inline me-1.5 h-5 w-5 text-gray-200 animate-spin dark:text-gray-600 fill-red-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                </div>
                                {{ __("Supprimer") }}
                            </button>
                        </div>
                        
                    </div>
                </div>
            </div>
            @empty
            <div class="flex justify-center py-4">
                <img class="w-20" src="/assets/imgs/empty-cart.png" alt="Cart empty">
            </div>
            @endforelse
            <!-- Card -->
        </div>
      <div class="hidden xl:mt-8 xl:block">
        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">People also bought</h3>
        <div class="mt-6 grid grid-cols-3 gap-4 sm:mt-8">
          <div class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <a href="#" class="overflow-hidden rounded">
              <img class="mx-auto h-44 w-44 dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="imac image" />
              <img class="mx-auto hidden h-44 w-44 dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="imac image" />
            </a>
            <div>
              <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">iMac 27”</a>
              <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">This generation has some improvements, including a longer continuous battery life.</p>
            </div>
            <div>
              <p class="text-lg font-bold text-gray-900 dark:text-white">
                <span class="line-through"> $399,99 </span>
              </p>
              <p class="text-lg font-bold leading-tight text-red-600 dark:text-red-500">$299</p>
            </div>
            <div class="mt-6 flex items-center gap-2.5">
              <button data-tooltip-target="favourites-tooltip-1" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"></path>
                </svg>
              </button>
              <div id="favourites-tooltip-1" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                Add to favourites
                <div class="tooltip-arrow" data-popper-arrow></div>
              </div>
              <button type="button" class="inline-flex w-full items-center justify-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                </svg>
                Add to cart
              </button>
            </div>
          </div>
          <div class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <a href="#" class="overflow-hidden rounded">
              <img class="mx-auto h-44 w-44 dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/ps5-light.svg" alt="imac image" />
              <img class="mx-auto hidden h-44 w-44 dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/ps5-dark.svg" alt="imac image" />
            </a>
            <div>
              <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Playstation 5</a>
              <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">This generation has some improvements, including a longer continuous battery life.</p>
            </div>
            <div>
              <p class="text-lg font-bold text-gray-900 dark:text-white">
                <span class="line-through"> $799,99 </span>
              </p>
              <p class="text-lg font-bold leading-tight text-red-600 dark:text-red-500">$499</p>
            </div>
            <div class="mt-6 flex items-center gap-2.5">
              <button data-tooltip-target="favourites-tooltip-2" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"></path>
                </svg>
              </button>
              <div id="favourites-tooltip-2" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                Add to favourites
                <div class="tooltip-arrow" data-popper-arrow></div>
              </div>
              <button type="button" class="inline-flex w-full items-center justify-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                </svg>
                Add to cart
              </button>
            </div>
          </div>
          <div class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <a href="#" class="overflow-hidden rounded">
              <img class="mx-auto h-44 w-44 dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-light.svg" alt="imac image" />
              <img class="mx-auto hidden h-44 w-44 dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-dark.svg" alt="imac image" />
            </a>
            <div>
              <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Apple Watch Series 8</a>
              <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">This generation has some improvements, including a longer continuous battery life.</p>
            </div>
            <div>
              <p class="text-lg font-bold text-gray-900 dark:text-white">
                <span class="line-through"> $1799,99 </span>
              </p>
              <p class="text-lg font-bold leading-tight text-red-600 dark:text-red-500">$1199</p>
            </div>
            <div class="mt-6 flex items-center gap-2.5">
              <button data-tooltip-target="favourites-tooltip-3" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"></path>
                </svg>
              </button>
              <div id="favourites-tooltip-3" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                Add to favourites
                <div class="tooltip-arrow" data-popper-arrow></div>
              </div>

              <button type="button" class="inline-flex w-full items-center justify-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                </svg>
                Add to cart
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mx-auto mt-6 max-w-5xl flex-1 space-y-6 lg:mt-0 lg:w-full">
      <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
        <p class="text-xl font-semibold text-gray-900 dark:text-white">{{ __("Résumé de la commande") }}</p>

        <div class="space-y-4">
          <div class="space-y-2">
            <dl class="flex items-center justify-between gap-4">
              <dt class="text-base font-normal text-gray-500 dark:text-gray-400">{{ _("Prix d'origine")}}</dt>
              <dd class="text-base font-bold text-gray-900 dark:text-white">{{ \Cart::getTotal() }} MAD</dd>
            </dl>

            <dl class="flex items-center justify-between gap-4">
              <dt class="text-base font-normal text-gray-500 dark:text-gray-400">{{ _("Livraison")}}</dt>
              <dd class="text-base font-bold text-gray-900">0.0 MAD</dd>
            </dl>

            <dl class="flex items-center justify-between gap-4">
              <dt class="text-base font-normal text-gray-500 dark:text-gray-400">{{ __("Taxe") }}</dt>
              <dd class="text-base font-bold text-gray-900 dark:text-white">0.0 MAD</dd>
            </dl>
          </div>

          <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
            <dt class="text-base font-bold text-gray-900 dark:text-white">{{ __("Total") }}</dt>
            <dd class="text-xl font-black text-gray-900 dark:text-white">{{ \Cart::getTotal() }}</dd>
          </dl>
        </div>

        <a href="#" class="btn btn-primary gap-2 text-center flex items-start justify-center">
            <span>{{ __("Envoyer la commande") }}</span>
            <svg class="h-5 w-5 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
            </svg>
        </a>

        {{-- <div class="flex items-center justify-center gap-2">
          <a href="#" title="" class="inline-flex items-center gap-2 text-sm font-medium text-red-700 underline hover:no-underline dark:text-red-500">
            {{ __("Continuer les achats")}}
            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
            </svg>
          </a>
        </div> --}}
      </div>

      <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
        <form class="space-y-4">
          <div>
            <label for="voucher" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Do you have a voucher or gift card? </label>
            <input type="text" id="voucher" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-red-500 focus:ring-red-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-red-500 dark:focus:ring-red-500" placeholder="" required />
          </div>
          <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Apply Code</button>
        </form>
      </div>
    </div>
  </div>
