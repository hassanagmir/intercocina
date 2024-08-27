<div class="mx-auto max-w-7xl">
    <div x-data="{ showNavbar: true, lastScrollY: window.scrollY }"
        @scroll.window="
            showNavbar = window.scrollY <= lastScrollY || window.scrollY < 50;
            lastScrollY = window.scrollY;
        "
        :class="{
            '-translate-y-full': !showNavbar,
            'translate-y-0': showNavbar
        }"
        class="fixed top-0 left-0 bg-slate-50 boreder-b-2 border-b-gray-200 z-50 w-full shadow-sm transition-transform duration-200">
        <nav class="flex items-center justify-between px-4 max-w-7xl mx-auto">

            <div class="py-4 ">
                <a href="/">
                    <img class="md:w-[130px] w-[150px] " src="{{ asset('assets/imgs/intercocina-logo.png') }}"
                        alt="{{ config('app.name') }}'s logo">
                </a>
            </div>

            <div class="hidden xl:flex">
                <ul class="flex items-center gap-10 ">
                    <li>
                        <x-nav-link href="" :active="request()->routeIs('site.notre-processus')">
                        Notre Approche
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="" :active="request()->routeIs('case-studies.*')">
                        Case studies
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="" :active="request()->routeIs('portfolio.*')">
                        Portfolio
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="" :active="request()->routeIs('site.formation')">
                        Formation
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link href="" :active="request()->routeIs('site.a-propos')">
                        À propos
                        </x-nav-link>
                    </li>
                    <li>
                        <button x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-primary">
                            Contact
                        </button>

                        <template x-teleport="body">
                            {{-- <x-cta-contact /> --}}
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
<nav id="mobNav" class="fixed top-0 bottom-0 left-0 right-0 z-30 p-2 backdrop-blur-sm md:p-6 xl:hidden"
    :class="openMenu ? 'visible' : 'invisible'">
    <ul class="absolute top-0 bottom-0 right-0 w-10/12 py-8 text-lg transition-all bg-white drop-shadow-2xl "
        :class="openMenu ? 'translate-x-0' : 'translate-x-full'">
        <li class="py-10">
            <div class="flex justify-center ">
                <a href="/"><img class="h-[80px] md:h-[150px]" src="{{ asset('assets/imgs/intercocina-logo.png') }}" alt="Intercocina"></a>
            </div>
        </li>
        <li class="border-B border-inherit">
            <a class="block p-4 text-center" href="">Notre Approche</a>
        </li>
        <li class="border-y border-inherit">
            <a class="block p-4 text-center" href="">Case studies</a>
        </li>
        <li class="border-y border-inherit">
            <a class="block p-4 text-center" href="">Portfolio</a>
        </li>
        <li class="border-y border-inherit">
            <a class="block p-4 text-center" href="">Formation</a>
        </li>
        <li class="border-y border-inherit">
            <a class="block p-4 text-center" href="">À propos</a>
        </li>
    </ul>
    {{-- close navMenu --}}
    <button class="p-2 rounded-full bg-accent-redm md:p-4 " x-on:click="openMenu = !openMenu"
        aria-label="close-navMenu" :aria-expanded="openMenu" aria-controls="mobNav">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffff"
            fill="none">
            <path d=" M19.0005 4.99988L5.00045 18.9999M5.00045 4.99988L19.0005 18.9999" stroke="currentColor"
                stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</nav>
