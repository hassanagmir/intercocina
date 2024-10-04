<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Fort d'une expérience de plus d'une décennie, Intercocia, leader en tant que fabricant de meubles de cuisine de lux.">
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