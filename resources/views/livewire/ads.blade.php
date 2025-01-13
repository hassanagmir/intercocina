<div x-data="{videoModalIsOpen: true}">
    <div x-cloak x-show="videoModalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="videoModalIsOpen" @keydown.esc.window="videoModalIsOpen = false, $refs.video.pause()" @click.self="videoModalIsOpen = false, $refs.video.pause()" class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 p-4 backdrop-blur-md lg:p-8" role="dialog" aria-modal="true" aria-labelledby="videoModalTitle">
        <!-- Modal Dialog -->
        <div x-show="videoModalIsOpen" x-transition:enter="transition ease-out duration-300 delay-200 z-50" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" class="max-w-4xl w-full relative">
            <!-- Close Button -->
            <button type="button" x-show="videoModalIsOpen" @click="videoModalIsOpen = false, $refs.video.pause()" x-transition:enter="transition ease-out duration-200 delay-500" x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100" class="absolute -top-12 right-0 flex items-center justify-center rounded-full bg-neutral-50 p-1.5 text-neutral-900 hover:opacity-75 active:opacity-100 dark:bg-neutral-900 dark:text-white" aria-label="close modal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
               </svg>
            </button>
            <!-- Ads image -->
            <a href="/collections/lacado-offer"><img src="{{ asset("assets/ads/promotion.png") }}" alt="bis event intercocina" loading="lazy" class="w-full object-cover"></a>
        </div>
    </div>
</div>
