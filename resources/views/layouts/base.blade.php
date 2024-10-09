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
    
        @font-face {
            font-family: 'DOCK11-Heavy';
            src: url('/fonts/DOCK11-Heavy.ttf.woff') format('woff'),
                url('/fonts/DOCK11-Heavy.ttf.svg#DOCK11-Heavy') format('svg'),
                url('/fonts/DOCK11-Heavy.ttf.eot'),
                url('/fonts/DOCK11-Heavy.eot?#iefix') format('embedded-opentype');
            font-weight: normal;
            font-style: normal;
        }
    </style>
</head>

<body class="bg-[#f2f2f2]"  style="background-image: url('/vecteur-inter.png');background-blend-mode: lighten; background-size:460px">
    <x-navigation />
    <main class="mt-28">
        @yield('content')
    </main>
    <x-footer />
    @livewireScriptConfig
    <div class="fixed bottom-7 left-7 animate__animated animate__heartBeat animate__infinite animate__slow">
        <a href="https://web.whatsapp.com/send?phone=212661547900" class="whatsapp-button" target="_blank">
          <div class="whatsapp-icon">
            <svg class="w-7 md:w-10" xmlns="http://www.w3.org/2000/svg" aria-label="WhatsApp" role="img" viewBox="0 0 512 512" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect width="512" height="512" rx="15%" fill="#25d366"></rect><path fill="#25d366" stroke="#ffffff" stroke-width="26" d="M123 393l14-65a138 138 0 1150 47z"></path><path fill="#ffffff" d="M308 273c-3-2-6-3-9 1l-12 16c-3 2-5 3-9 1-15-8-36-17-54-47-1-4 1-6 3-8l9-14c2-2 1-4 0-6l-12-29c-3-8-6-7-9-7h-8c-2 0-6 1-10 5-22 22-13 53 3 73 3 4 23 40 66 59 32 14 39 12 48 10 11-1 22-10 27-19 1-3 6-16 2-18"></path></g></svg>
          </div>
        </a>
      </div>
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