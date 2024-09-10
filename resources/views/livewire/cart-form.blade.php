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


    </div>
  </div>
