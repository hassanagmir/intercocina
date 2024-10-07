<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Fort d'une expérience de plus d'une décennie, Intercocia, leader en tant que fabricant de meubles de cuisine de lux.">
    <title>{{ (isset($title) ? $title . ' - ' : '') . config('app.name', 'Laravel') }}</title>
    <link rel="canonical" href="{{ request()->fullUrl() }}" />
    <meta name="keywords" content="mobile de cuisine, Caisson , Facade, Placards, Parquets, Tiroirs, Armoire, Caissons Bas, Caissons Haut, Caissons column">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:title" content="{{ isset($title) ? $title : config('app.name', 'Laravel') }}">


    <meta property="og:description" content="Fort d'une expérience de plus d'une décennie, Intercocia, leader en tant que fabricant de meubles de cuisine de lux.">
    <meta property="og:image" content="{{ asset('assets/imgs/intercocina-logo.png') }}">
    <link rel="icon" type="image/x-icon" href="\assets\imgs\favicon.png">
    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ request()->fullUrl() }}">
    <meta property="twitter:title" content="{{ isset($title) ? $title : config('app.name', 'Laravel') }}">
    <meta property="twitter:description" content="">
    <meta property="twitter:image" content="{{ asset('assets/imgs/intercocina-logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        .grid {
            display: grid !important;
        }

        .lazy-image {
            opacity: 0;
            transition: opacity 0.3s;
        }

        .lazy-image.loaded {
            opacity: 1;
        }
    </style>
</head>

<body class="bg-red-50">
    <x-navigation />
    <main class="mt-16">
        @yield('content')
    </main>
    <x-footer />
    @livewireScriptConfig
    <div x-data="modal">
        <div 
            x-cloak 
            x-show="showModal" 
            x-transition.opacity.duration.200ms 
            x-trap.inert.noscroll="showModal" 
            @keydown.esc.window="closeModal()" 
            @click.self="closeModal()" 
            class="fixed inset-0 z-30 flex items-center justify-center bg-black/20 p-4 backdrop-blur-md lg:p-8 mt-16" 
            role="dialog" 
            aria-modal="true" 
            aria-labelledby="videoModalTitle"
        >
            <!-- Modal Dialog -->
            <div 
                x-show="showModal" 
                x-transition:enter="transition ease-out duration-300 delay-200" 
                x-transition:enter-start="opacity-0 translate-y-8" 
                x-transition:enter-end="opacity-100 translate-y-0" 
                class="max-w-2xl w-full relative"
            >
                <!-- Close Button -->
                <button 
                    type="button" 
                    x-show="showModal" 
                    @click="closeModal()" 
                    x-transition:enter="transition ease-out duration-200 delay-500" 
                    x-transition:enter-start="opacity-0 scale-0" 
                    x-transition:enter-end="opacity-100 scale-100" 
                    class="absolute -top-12 right-0 flex items-center justify-center rounded-full bg-neutral-50 p-1.5 text-neutral-900 hover:opacity-75 active:opacity-100 dark:bg-neutral-900 dark:text-white" 
                    aria-label="close modal"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <img class="max-h-[30rem] w-full" src="/ads.jpg" alt="">
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('modal', () => ({
                showModal: false,
                init() {
                    this.checkAndShowModal();
                },
                checkAndShowModal() {
                    const adsModal = localStorage.getItem('adsModal');
                    if (!adsModal) {
                        this.showModal = true;
                    }
                },
                closeModal() {
                    this.showModal = false;
                    localStorage.setItem('adsModal', 'true');
                }
            }));
        });
    </script>
    

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

            if ("IntersectionObserver" in window) {
                let lazyImageObserver = new IntersectionObserver(function (entries, observer) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            lazyImage.classList.add("loaded");
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImages.forEach(function (lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            }
        });
    </script>


</body>

</html>