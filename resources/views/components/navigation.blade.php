
<div class="mx-auto max-w-7xl">
    <div x-data="{ showNavbar: true, lastScrollY: window.scrollY }"
        @scroll.window="
            showNavbar = window.scrollY <= lastScrollY || window.scrollY < 50;
            lastScrollY = window.scrollY;
        "
        :class="{
            '-translate-y-full': !showNavbar,
            // 'translate-y-0': showNavbar
        }"
        class="fixed top-0 left-0 bg-slate-50 boreder-b-2 border-b-gray-200 z-50 w-full shadow-sm transition-transform duration-200">
        <nav class="flex items-center justify-between px-4 max-w-7xl mx-auto">

            <div class="py-4 ">
                <a href="/">
                    <img class="md:w-[130px] w-[150px] " src="{{ asset('assets/imgs/intercocina-logo.png') }}" alt="{{ config('app.name') }}'s logo">
                </a>
            </div>

            <div class="hidden xl:flex">
                <ul class="flex items-center gap-10 ">
                    <li>
                        <x-nav-link href="/aprops" :active="request()->routeIs('site.notre-processus')">
                        Notre Approche
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="/aprops" :active="request()->routeIs('case-studies.*')">
                        Case studies
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="/aprops" :active="request()->routeIs('portfolio.*')">
                        Portfolio
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="/aprops" :active="request()->routeIs('site.formation')">
                        Formation
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="/aprops" :active="request()->routeIs('site.a-propos')">
                        À propos
                        </x-nav-link>
                    </li>

                    <li>
                        @livewire('cart-modal')
                    </li>

                    <li>
                        <!-- Trigger for Modal -->
                        <button x-on:click="$dispatch('open-cart-modal')" class="py-4 px-1 relative border-2 border-transparent text-gray-800 rounded-full hover:text-gray-400 focus:outline-none focus:text-gray-500 transition duration-75 ease-in-out" aria-label="Cart">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 21a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-8 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3M3.71 5.4h15.214c1.378 0 2.373 1.27 1.995 2.548l-1.654 5.6C19.01 14.408 18.196 15 17.27 15H8.112c-.927 0-1.742-.593-1.996-1.452zm0 0L3 3"/></svg>
                                <span class="absolute inset-0 object-right-top -mr-6">
                                <span class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                                    {{ \Cart::getContent()->count() }}
                                </span>
                            </span>
                        </button>
                    </li>


                    <li>
                        <button x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-primary">
                            Contact
                        </button>

                        <template x-teleport="body">
                            <x-contact />
                        </template>
                    </li>
                </ul>
            </div>

            <div class="flex xl:hidden">
                <button x-on:click="openMenu = !openMenu" aria-label="navMenu" :aria-expanded="openMenu"
                    aria-controls="mobNav">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="#58d185" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 6l16 0" />
                        <path d="M4 12l16 0" />
                        <path d="M4 18l16 0" />
                    </svg>
                </button>
            </div>

        </nav>
    </div>
</div>
<hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">

{{-- Mobile navMenu --}}
<nav :class="openMenu ? 'visible' : 'invisible'" id="mobNav" class="fixed top-0 bottom-0 left-0 right-0 p-2 backdrop-blur-sm md:p-6 xl:hidden z-50">
    <ul :class="openMenu ? 'translate-x-0' : 'translate-x-full'" class="absolute top-0 bottom-0 right-0 w-10/12 py-8 text-lg transition-all bg-white drop-shadow-2xl">
        <li class="py-10">
            <div class="flex justify-center ">
                <a href="/"><img class="h-[80px] md:h-[150px]" src="{{ asset('assets/imgs/intercocina-logo.png') }}" alt=""></a>
            </div>
        </li>
        <li class="border-B border-inherit">
            <a class="block p-4 text-center" href="/noter">Notre Approche</a>
        </li>
        <li class="border-y border-inherit">
            <a class="block p-4 text-center" href="/noter">Case studies</a>
        </li>
        <li class="border-y border-inherit">
            <a class="block p-4 text-center" href="/noter">Portfolio</a>
        </li>
        <li class="border-y border-inherit">
            <a class="block p-4 text-center" href="/noter">Formation</a>
        </li>
        <li class="border-y border-inherit">
            <a class="block p-4 text-center" href="/noter">À propos</a>
        </li>
    </ul>
    {{-- close navMenu --}}
    <button class="p-2 rounded-full bg-accent-green/30 md:p-4 " x-on:click="openMenu = !openMenu"
        aria-label="close-navMenu" :aria-expanded="openMenu" aria-controls="mobNav">
        <svg xmlns="http://www.w3.org/2000/svg" class="text-red-600" viewBox="0 0 24 24" width="24" height="24" color="#ffff"
            fill="none">
            <path d=" M19.0005 4.99988L5.00045 18.9999M5.00045 4.99988L19.0005 18.9999" stroke="currentColor"
                stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</nav>
