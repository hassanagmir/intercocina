
  
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
            <nav class="bg-red-400 hidden text-white p-2 md:flex justify-between items-center">
                <div class="flex items-center space-x-4">
                  <div class="flex justify-center items-center gap-3">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087a3 3 0 0 0 1.398 0c.52-.125 1.001-.446 1.963-1.087l6.98-4.654M7.158 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"/></svg></span>
                    <span class="transition-colors duration-200 text-sm">Contact@intercocina.com</span>
                  </div>
                  <span class="mx-2">|</span>
                  <div class="flex justify-center items-center gap-3">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.6 14.522c-2.395 2.52-8.504-3.534-6.1-6.064c1.468-1.545-.19-3.31-1.108-4.609c-1.723-2.435-5.504.927-5.39 3.066c.363 6.746 7.66 14.74 14.726 14.042c2.21-.218 4.75-4.21 2.214-5.669c-1.267-.73-3.008-2.17-4.342-.767"/></svg>
                      </span>
                      <span class="transition-colors text-sm duration-200">+212 6 61 54 79 00  </span>
                  </div>
                  <span class="mx-2">|</span>
                  <div class="flex justify-center items-center gap-3">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.6 14.522c-2.395 2.52-8.504-3.534-6.1-6.064c1.468-1.545-.19-3.31-1.108-4.609c-1.723-2.435-5.504.927-5.39 3.066c.363 6.746 7.66 14.74 14.726 14.042c2.21-.218 4.75-4.21 2.214-5.669c-1.267-.73-3.008-2.17-4.342-.767"/></svg>
                      </span>
                      <span class="transition-colors text-sm duration-200">+212 5 36 35 88 88</span>
                  </div>
                </div>

                <ul class="flex items-center gap-4">
                    <li>
                        <a href="https://www.linkedin.com/company/inter-cocina" aria-label="Linkedin page link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93zM6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37z"/></svg>

                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/IntercocinaSARL" aria-label="facebook page link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/intercocinasarl" aria-label="Instagram page link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95"/></svg>
                        </a>
                    </li>
                </ul>
              </nav>
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
                                {{ _("Accueil") }}
                            </x-nav-link>
                        </li>
                        <li>
                            <x-nav-link href="{{ route('products') }}" :active="request()->routeIs('products')">
                                {{ __("Produits") }}
                            </x-nav-link>
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
                            <button x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-primary">
                                {{__("Se connecter")}}
                            </button>

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
            <li class="border-B border-inherit">
                <a class="block p-4 text-center" href="/">{{ __("Accueil") }}</a>
            </li>
            <li class="border-y border-inherit">
                <a class="block p-4 text-center" href="{{ route('products') }}">{{ __("Produits") }}</a>
            </li>

            <li class="border-y border-inherit">
                <a class="block p-4 text-center" href="{{ route('cart') }}">{{ __("Panier") }} <livewire:cart-counter></a>
            </li>

            @if (auth()->user())
            <li class="border-y border-inherit">
                <a class="block p-4 text-center" href="{{ route('profile') }}">{{ __("Profile") }}</a>
            </li>
            @else
            <li class="border-y border-inherit">
                <a class="block p-4 text-center" href="{{ route('user.login') }}">{{ __("Se connecter") }}</a>
            </li>
            @endif
            <li class="border-y border-inherit">
                <a class="block p-4 text-center" href="{{ route('event.list') }}">{{ __("Événements") }}</a>
            </li>
            <li class="border-y border-inherit">
                <a class="block p-4 text-center" href="{{ route('about') }}">{{ __("À propos") }}</a>
            </li>
            <li class="border-y border-inherit">
                <a class="block p-4 text-center" href="{{ route('contact') }}"> {{ __("Contactez-nous") }}</a>
            </li>
            <li class="border-y border-inherit">
                <a class="block p-4 text-center" href="{{ route('post.index') }}">{{ __("Blog") }}</a>
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