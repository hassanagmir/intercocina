
  
<div x-data="{openMenu: false}">
    <div class="mx-auto max-w-7xl">
        <div x-data="{ showNavbar: true, lastScrollY: window.scrollY }"
            @scroll.window="
                showNavbar = window.scrollY <= lastScrollY || window.scrollY < 50;
                lastScrollY = window.scrollY;
            "
            :class="{
                // '-translate-y-full': !showNavbar,
                // 'translate-y-0': showNavbar
            }"
            class="fixed top-0 left-0 bg-slate-50 boreder-b-2 border-b-gray-200 z-50 w-full shadow-sm transition-transform duration-200">
            <x-top-nav />
            <nav class="flex items-center justify-between px-4 max-w-7xl mx-auto">
                <div class="py-4 ">
                    <a href="/">
                        <img class="md:w-[130px] w-[100px]" src="{{ asset('assets/imgs/intercocina-logo.png') }}" width="auto" height="auto" alt="{{ config('app.name') }}'s logo" title="Intercocina logo" loading="lazy">
                    </a>
                </div>
                <div class="hidden xl:flex">
                    <ul class="flex items-center gap-10 ">
                        <li>
                            <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                                {{ __("Accueil") }}
                            </x-nav-link>
                        </li>
                        <li>
                            <div x-data="{ isOpen: false, openedWithKeyboard: false, leaveTimeout: null }" @mouseleave.prevent="leaveTimeout = setTimeout(() => { isOpen = false }, 250)" @mouseenter="leaveTimeout ? clearTimeout(leaveTimeout) : true" @keydown.esc.prevent="isOpen = false, openedWithKeyboard = false" @click.outside="isOpen = false, openedWithKeyboard = false" class="relative">
                                <!-- Toggle Button -->
                                <a href="{{ route('products') }}" class="hover:text-accent-red text-gray-600 flex gap-2 justify-center items-center" type="button" @mouseover="isOpen = true" @keydown.space.prevent="openedWithKeyboard = true" @keydown.enter.prevent="openedWithKeyboard = true" @keydown.down.prevent="openedWithKeyboard = true" :class="isOpen || openedWithKeyboard ? 'text-neutral-900' : 'text-neutral-600'" :aria-expanded="isOpen || openedWithKeyboard" aria-haspopup="true">
                                    {{ __("Produits") }}
                                    <svg aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4 rotate-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                    </svg>        
                                </a>
    
                                <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition x-trap="openedWithKeyboard" @click.outside="isOpen = false, openedWithKeyboard = false" @keydown.down.prevent="$focus.wrap().next()" @keydown.up.prevent="$focus.wrap().previous()" class="absolute top-11 left-0 flex w-full min-w-[12rem] flex-col overflow-hidden rounded-md border border-neutral-300 bg-neutral-50 py-1.5" role="menu">
                                    <a href="/category/caissons?type=caisson-bas" class="bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none" role="menuitem">
                                        Caissons
                                    </a>
                                    <a href="/category/facade" class="bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none" role="menuitem">
                                        Façades
                                    </a>
                                    <a href="/category/parquettes" class="bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none" role="menuitem">
                                        Parquets
                                    </a>
                                    <a href="/category/accessoiriser" class="bg-neutral-50 px-4 py-2 text-sm text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none" role="menuitem">
                                        Accessoiriser
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li>
                            <x-nav-link href="{{ route('event.list') }}" :active="request()->routeIs('event.list')">
                                {{ __("Événements") }}
                            </x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                                {{ __("À propos") }}
                            </x-nav-link>
                        </li>

                        <li>
                            <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                                {{ __("Contactez-nous") }}
                            </x-nav-link>
                        </li>
                        <li>
                            <div x-data="{ showModalCart: false }" @open-cart-modal.window="showModalCart = true" x-cloak x-show="showModalCart" class="fixed inset-0 z-30 backdrop-blur-md flex justify-center items-center" @keydown.escape.window="showModalCart = false">
                                <div class="max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg animate__animated animate__zoomIn animate__faster"
                                    style="min-width: 50%!important"
                                    @click.away="showModalCart = false"
                                    x-transition:enter="motion-safe:ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="motion-safe:ease-in duration-300"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-90">

                                    <livewire:cart-modal />
                                    <a href="{{ route('checkout' )}}" class="flex mt-4 w-full items-center justify-center rounded-lg bg-red-500 px-5 py-2.5 text-sm font-semibold text-white hover:bg-red-600">
                                        {{ __("Envoyer la commande") }}
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li>
                            <!-- Trigger for Modal -->
                            <button x-on:click="$dispatch('open-cart-modal')" class="py-4 px-1 relative border-2 border-transparent text-gray-800 rounded-full hover:text-gray-400 focus:outline-none focus:text-gray-500 transition duration-75 ease-in-out" aria-label="Cart">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 21a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-8 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3M3.71 5.4h15.214c1.378 0 2.373 1.27 1.995 2.548l-1.654 5.6C19.01 14.408 18.196 15 17.27 15H8.112c-.927 0-1.742-.593-1.996-1.452zm0 0L3 3"/></svg>
                                    <span class="absolute inset-0 object-right-top -mr-6">
                                    <livewire:cart-counter>
                                </span>
                            </button>
                        </li>

                        @if (auth()->user())
                        <div>
                            <a href="{{ route("profile") }}">
                                <img class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300" width="auto" height="auto" src="https://www.testhouse.net/wp-content/uploads/2021/11/default-avatar.jpg" alt="{{ auth()->user()->first_name . " " . auth()->user()->first_name }}">
                            </a>
                        </div>
                        @else
                        <li>
                            <a x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-primary">
                                {{__("Se connecter")}}
                            </a>

                            <template x-teleport="body">
                                <x-auth-modal />
                            </template>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="flex xl:hidden">
                    <button x-on:click="openMenu = !openMenu" aria-label="navMenu" :aria-expanded="openMenu"
                        aria-controls="mobNav">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="#ec2228" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 6l16 0"></path>
                            <path d="M4 12l16 0"></path>
                            <path d="M4 18l16 0"></path>
                        </svg>
                    </button>
                </div>

            </nav>
        </div>
    </div>
    <hr class="h-px bg-gray-200 border-0">

    {{-- Mobile navMenu --}}
    <nav class="fixed top-0 bottom-0 left-0 right-0 p-2 backdrop-blur-sm md:p-6 xl:hidden z-50 hidden" :class="{ 'hidden': ! openMenu }" id="mobNav" x-transition>
        <ul :class="openMenu ? 'translate-x-0' : 'translate-x-full'" class="absolute top-0 bottom-0 right-0 w-10/12 py-8 text-lg transition-all bg-white drop-shadow-2xl">
            <li class="py-10">
                <div class="flex justify-center ">
                    <a href="/"><img class="h-[80px] md:h-[150px]" height="80px" width="auto" src="{{ asset('assets/imgs/intercocina-logo.png') }}" alt="Interconcina logo" title="Interconcina logo" loading="lazy"></a>
                </div>
            </li>
            <li class="p-4">
                @if (auth()->user())
                <div>
                    <a href="{{ route("profile") }}" class="flex gap-3">
                        <img class="w-14 h-14 p-1 rounded-full ring-2 ring-gray-300" width="auto" height="auto" src="https://www.testhouse.net/wp-content/uploads/2021/11/default-avatar.jpg" alt="{{ auth()->user()->first_name . " " . auth()->user()->first_name }}">
                        <div>
                            @if (auth()->user()->first_name && auth()->user()->last_name)
                                <span class="text-xl font-semibold">{{ auth()->user()->full_name }}</span>
                            @else
                                <span class="text-xl font-semibold">{{ auth()->user()->name }}</span>
                            @endif <br>
                                <span>{{ auth()->user()->getRoleNames()->first() }}</span>
                        </div>
                    </a>
                </div>
                @else
                <li class="flex gap-4 justify-center">
                    <a href="{{ route("user.login")}}" class="btn btn-primary">
                        {{__("Se connecter")}}
                    </a>
                </li>
                @endif
            </li>
            <li class="border-B border-inherit">
                <a class="block p-4 text-xl" href="/">{{ __("Accueil") }}</a>
            </li>
            <li class="border-y border-inherit">
                <a class="block p-4 text-xl" href="{{ route('products') }}">{{ __("Produits") }}</a>
            </li>

            <li class="border-y border-inherit">
                <a class="block p-4 text-xl" href="{{ route('cart') }}">{{ __("Panier") }} <livewire:cart-counter></a>
            </li>
            <li class="border-y border-inherit">
                <a class="block p-4 text-xl" href="{{ route('event.list') }}">{{ __("Événements") }}</a>
            </li>
            <li class="border-y border-inherit">
                <a class="block p-4 text-xl" href="{{ route('about') }}">{{ __("À propos") }}</a>
            </li>
            <li class="border-y border-inherit">
                <a class="block p-4 text-xl" href="{{ route('contact') }}"> {{ __("Contactez-nous") }}</a>
            </li>
            <li class="border-y border-inherit">
                <a class="block p-4 text-xl" href="{{ route('post.index') }}">{{ __("Blog") }}</a>
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
</div>