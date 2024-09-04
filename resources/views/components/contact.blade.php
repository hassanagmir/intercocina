<div id="contact-form-modal" x-data="{ modalOpen: false }" x-show="modalOpen" @open-contact-form-modal.window="modalOpen = true"
class="fixed inset-0 z-50" aria-labelledby="modal-title" role="dialog" :aria-modal="modalOpen">
<div class="min-h-screen">
    <div x-cloak x-on:click="modalOpen = false" x-show="modalOpen"
        x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-10 backdrop-blur-lg" aria-hidden="true">
    </div>

    <div x-cloak x-show="modalOpen" x-trap="modalOpen"
        x-effect="modalOpen ?  document.body.style.overflow = 'hidden':  document.body.style.overflow = 'auto'"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="fixed top-0 left-0 flex items-center justify-center w-full h-full p-4 mt-4 md:p-8">

        <section @click.away="modalOpen = false"
            class="relative p-4 py-10 overflow-hidden text-left shadow-2xl bg-accent-red md:py-24 rounded-t-2xl md:rounded-2xl max-h-[100vh] mx-auto max-w-7xl md:overflow-hidden overflow-y-auto">

            <button @click="modalOpen = false"
                class="absolute z-50 grid w-8 text-lg font-bold text-red-500 bg-white rounded-full right-4 top-4 aspect-square place-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>

            <div class="relative z-10 grid gap-4 px-4 md:grid-cols-2 md:gap-16 md:px-10 md:max-w-6xl md:mx-auto">
                <div class="py-16 space-y-6">
                    <h2 class="text-3xl font-bold text-left text-white md:text-4xl">
                        Toujours intéressés ? Besoin d'un rendez-vous ?
                    </h2>

                    <p class="text-xl text-white text-start">
                        Entrez vos informations et nous vous contacterons directement!
                    </p>
                </div>
                {{-- <livewire:cta-contact-form /> --}}
            </div>

            <div
                class="absolute z-0 rounded-full bg-accent-blue w-28 h-28 md:w-80 md:h-80 md:-top-36 md:-right-28 -top-12 -right-6">
            </div>
            <div class="bg-gray-400 hidden md:block w-80 h-80 rounded-full absolute z-0 md:-bottom-36 md:-left-28">
            </div>
        </section>

    </div>

</div>
</div>