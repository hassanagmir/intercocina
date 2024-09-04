
<div x-data="{ 'showModalCart': false }" @open-cart-modal.window="showModalCart = true" x-show="showModalCart" class="fixed inset-0 z-30 backdrop-blur-md flex justify-center items-center ">
    <!-- Modal inner -->
    <div class="max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg animate__animated animate__zoomIn animate__faster"
        style="min-width: 50%!important"
        @click.away="showModalCart = false">
        <!-- Title / Close-->
        <div class="flex items-center justify-between top-0">
            <h5 class="mr-3 text-black max-w-none font-bold text-xl">Votre panier ({{ Cart::getContent()->count() }})</h5>
            <button type="button" class="z-50 cursor-pointer" @click="showModalCart = false" aria-label="Close Modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- content -->
        <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl mt-4 overflow-auto max-h-[500px]">
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

        <dl class="flex items-center justify-between gap-4 pt-3">
            <dt class="text-base font-bold text-gray-900">Total</dt>
            <dd class="text-base font-bold text-gray-900">MAD {{ \Cart::getTotal() }}</dd>
        </dl>
        <a href="{{ route('checkout' )}}" disabled class="flex mt-4 w-full items-center justify-center rounded-lg bg-red-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-red-500 dark:hover:bg-red-700 dark:focus:ring-primary-800">
            {{ __("Envoyer la commande") }}
        </a>
    </div>
</div>
