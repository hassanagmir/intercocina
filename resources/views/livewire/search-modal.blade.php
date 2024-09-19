<div x-data="{modalIsOpen: false}" class="mx-h-screen">
    <button @click="modalIsOpen = true" type="button" class="cursor-pointer whitespace-nowrap rounded-md bg-gray-600 px-4 py-2.5 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
    </button>
    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false" class="fixed inset-0 z-50 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8 max-h-screen" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
        <!-- Modal Dialog -->
        <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity max-h-screen" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 w-full">
            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4">
                <form class="flex">   
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

                <button @click="modalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <!-- Dialog Body -->
            <div class="px-4 py-8"> 
               
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl overflow-auto max-h-[500px]">
                    <div class="space-y-6">
                        @foreach ($articles as $product)
                        <div class="rounded-lg border border-gray-200 bg-white p-2 shadow-sm md:p-3">
                            <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                <a href="http://localhost:8000/product/caisson-haut-avec-etagere" class="shrink-0 md:order-1">
                                    <img class="h-20 w-20" src="/storage/01J7JX834XGGXGVCSPBE9456C2.png" alt="1">
                                </a>
                                <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                    <a href="http://localhost:8000/product/caisson-haut-avec-etagere" class="text-base font-bold text-gray-900 hover:underline">
                                        {{ $product->name }}
                                    </a>
                                    <div class="flex items-center gap-4">
                                        <strong>{{ $product->price }} {{__("MAD")}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="m-auto w-full">
                        @if ($search == "")
                            <div class="text-lg font-semibold text-center">{{ __("Commencez à taper pour rechercher") }}</div>
                        @elseif(count($articles) == 0)
                            <div class="text-lg font-semibold text-center">{{ __("No produits") }} ({{ $search }})</div>
                        @endif
                    </div>


                    
                </div>
            </div>
        </div>
    </div>
</div>