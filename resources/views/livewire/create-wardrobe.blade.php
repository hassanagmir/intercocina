<div class="mt-4">
    <div class="mx-auto container px-4 bg-white border shadow-sm rounded-xl pb-4">
        <h2 class="text-xl font-semibold text-gray-800 my-4">Type de Porte</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <label class="group relative border-2 border-gray-200 rounded-xl p-6 cursor-pointer hover:shadow-md transition-all duration-300">
                <input type="radio" wire:model.change="doorType" name="doorType" value="normal" class="peer hidden">
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto mb-3 bg-gray-100 rounded-lg">
                        <img src="https://www.centimetre.com/bundles/pdepsite/img/configurateur/with-door-0.jpg?f2ff7e6" class="w-full h-full" alt="">
                    </div>
                    <h3 class="text-lg font-medium text-gray-700 group-hover:text-gray-900">Porte Normale</h3>
                </div>
                <div class="absolute inset-0 border-2 border-transparent peer-checked:border-blue-500 peer-checked:bg-blue-50/50 rounded-xl transition-all duration-300"></div>
            </label>
            <label class="group relative border-2 border-gray-200 rounded-xl p-6 cursor-pointer hover:shadow-md transition-all duration-300">
                <input type="radio" wire:model.change="doorType" name="doorType" value="sliding" class="peer hidden">
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto mb-3 bg-gray-100 rounded-lg">
                        <img src="https://www.centimetre.com/bundles/pdepsite/img/configurateur/with-door-1.jpg?f2ff7e6" class="w-full h-full" alt="">
                    </div>
                    <h3 class="text-lg font-medium text-gray-700 group-hover:text-gray-900">Porte Coulissante</h3>
                </div>
                <div class="absolute inset-0 border-2 border-transparent peer-checked:border-blue-500 peer-checked:bg-blue-50/50 rounded-xl transition-all duration-300"></div>
            </label>
        </div>
    </div>
    <div class="mx-auto container px-4 sm:px-6 lg:px-8 bg-white border shadow-sm rounded-xl mt-4 py-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <div class="grid grid-cols-2 gap-2">
                <div class="w-full max-w-sm">
                    <label for="Hauteur">Hauteur (cm)</label>
                    <input type="number" wire:model.change="width" placeholder="Hauteur" max="300" min="60"  class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"  />
                </div>
        
                <div class="w-full max-w-sm">
                    <label for="Largeur">Largeur (cm)</label>
                    <input type="number" wire:model.change="height" placeholder="Largeur" max="600" min="60"  class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"  />
                </div>
        
                <div class="w-full max-w-sm">
                    <label for="Profondeur">Profondeur (cm)</label>
                    <input type="number" wire:model.change="depth" placeholder="Profondeur" max="200" min="20" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"  />
                </div>
            </div>
            <div class="w-full max-w-sm">
                <label for="Profondeur">Epaisser en mm</label>
                <div class="grid grid-cols-3 gap-6">
                    <label class="group relative border-2 border-gray-200 rounded-xl cursor-pointer hover:shadow-md transition-all duration-300 h-10 w-24">
                        <input type="radio" wire:model.change="thickness" name="thickness" value="16" class="peer hidden">
                        <div class="absolute inset-0 border-2 border-transparent peer-checked:border-blue-500 peer-checked:bg-blue-50/50 rounded-xl transition-all duration-300 flex justify-center items-center">16</div>
                    </label>
                    <label class="group relative border-2 border-gray-200 rounded-xl cursor-pointer hover:shadow-md transition-all duration-300 h-10 w-24">
                        <input type="radio" wire:model.change="thickness" name="thickness" value="12" class="peer hidden">
                        <div class="absolute inset-0 border-2 border-transparent peer-checked:border-blue-500 peer-checked:bg-blue-50/50 rounded-xl transition-all duration-300 flex justify-center items-center">18</div>
                    </label>
                    <label class="group relative border-2 border-gray-200 rounded-xl cursor-pointer hover:shadow-md transition-all duration-300 h-10 w-24">
                        <input type="radio" wire:model.change="thickness" name="thickness" value="22" class="peer hidden">
                        <div class="absolute inset-0 border-2 border-transparent peer-checked:border-blue-500 peer-checked:bg-blue-50/50 rounded-xl transition-all duration-300 flex justify-center items-center">22</div>
                    </label>
                </div>
            </div>
        </div>
        <div x-data="{modalIsOpen: false}">
            <button @click="modalIsOpen = true" wire:click="generate()" type="button" class="cursor-pointer whitespace-nowrap rounded-md bg-red-600 mt-2 px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">
                Valider
            </button>
            <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex w-full items-center justify-center bg-black/20 p-4 pb-8 backdrop-blur-md lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                <!-- Modal Dialog -->
                <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                    <!-- Dialog Header -->
                    <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                        <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">Special Offer</h3>
                        <button @click="modalIsOpen = false" aria-label="close modal">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <!-- Dialog Body -->
                    <div class="grid grid-cols-2 gap-4 p-4">
                        <ul class="max-w-md space-y-1 text-gray-500 list-decimal list-inside dark:text-gray-400 p-4">
                            <li>
                                <span class="font-semibold text-gray-600 dark:text-white">{{ __("Hauteur")}}</span>
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $result['height'] }}</span> 
                            </li>
                            <li>
                                <span class="font-semibold text-gray-600 dark:text-white">{{ __("Largeur")}}</span>
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $result['width'] }}</span> 
                            </li>
                            <li>
                                <span class="font-semibold text-gray-600 dark:text-white">{{ __("Profondeur")}}</span>
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $result['depth'] }}</span> 
                            </li>

                            <li>
                                <span class="font-semibold text-gray-600 dark:text-white">{{ __("Epaisser")}}</span>
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $result['color'] ?  $result['color']->thickness : "N/E"  }}</span> 
                            </li>
                        </ul>

                        <ul class="max-w-md space-y-1 text-gray-500 list-decimal list-inside dark:text-gray-400 p-4">
                            <li>
                                <span class="font-semibold text-gray-600 dark:text-white">{{ __("Couleur")}}</span>
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $result['color'] ? $result['color']->name : "N/E" }}</span> 
                            </li>
                            <li>
                                <span class="font-semibold text-gray-600 dark:text-white">{{ __("Ref de couleur")}}</span>
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $result['color'] ? $result['color']?->code : "N/E" }}</span> 
                            </li>
                        </ul>
                    </div>
                    <!-- Dialog Footer -->
                    <div class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                        <button @click="modalIsOpen = false" type="button" class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Remind me later</button>
                        <button @click="modalIsOpen = false" type="button" class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Upgrade Now</button>
                    </div>
                </div>
            </div>
    </div>

    <div class="mx-auto container px-4 sm:px-6 lg:px-8 bg-white border shadow-sm rounded-xl mt-4 py-4">
        <h2 class="text-xl mb-2">Couleurs</h2>
        <div wire:loading role="status" class="animate-[spin_0.6s_linear_infinite] w-8 h-8 mb-4">
            <svg class="text-gray-200 dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-2" role="radiogroup">
            @foreach ($colors as $color)
            <label tabindex="0" class="w-full shadow-sm border border-gray-300 overflow-hidden rounded-lg cursor-pointer transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 hover:border-blue-300">
                <img src="{{ Storage::url($color->image) }}" alt="{{ $color->name }}" class="w-full h-40 object-cover">
                <input type="radio" wire:model.change="color" name="color" value="{{ $color->id }}" class="peer hidden">
                <div class="p-3 peer-checked:bg-blue-50">
                    <h2 class="text-lg">{{ $color->name }}</h2>
                    <p class="text-gray-500 text-sm">{{ $color->code }}, {{ $color->thickness }}mm</p>
                </div>
            </label>
            @endforeach
        </div>
    </div>

    </div>
</div>