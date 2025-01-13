<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-language" content="fr">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ (isset($title) ? $title . ' - ' : '') . config('app.name', 'Intercocina') }}</title>
    <meta name="description" content="{{ isset($description) ? Str::limit($description, 160, '') : "Intercocina est une entreprise spécialisée dans la fabrication de meubles de cuisine, meubles TV, placards et armoires, meubles de salle de bain, ainsi que de parquets, au Maroc." }}">
    <meta name="keywords" content="{{ isset($tags) ? $tags : 'Mobile de cuisine, Caisson  , Facade, Placards, Parquets, Tiroirs, Armoire, Caissons Bas, Caissons Haut, Caissons column' }}">
    <meta itemprop="image" content="{{ isset($image) ? url(config('app.storage'), $image) : asset('assets/imgs/intercocina-logo.png') }}"> 
    <link rel="icon" type="image/x-icon" href="{{ asset('assets\imgs\favicon.png') }}">
    <link rel="canonical" href="{{ request()->fullUrl() }}" />
    <meta name="google-site-verification" content="qvGj4QxXzolE9UDquiCtVKxUzQqkKt92LtItABRoQBw" />
    {{-- Open Graph / Facebook --}}
    
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:title" content="{{ isset($title) ? $title : config('app.name', 'Intercocina') }}">
    <meta property="og:description" content="{{ isset($description) ? Str::limit($description, 160, '') : "Intercocina est une entreprise spécialisée dans la fabrication de meubles de cuisine, meubles TV, placards et armoires, meubles de salle de bain, ainsi que de parquets, au Maroc." }}">
    <meta property="og:image" content="{{ isset($image) ? url(config('app.storage'), $image) : asset('assets/imgs/intercocina-logo.png') }}">
    <meta property="og:type" content="{{ isset($type) ? $type: "website" }}">
    {{-- Twitter --}}
   
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="{{ isset($title) ? $title : config('app.name', 'INTERCOCINA') }}">
    <meta property="twitter:description" content="{{ isset($description) ? Str::limit($description, 160, '') : "Intercocina est une entreprise spécialisée dans la fabrication de meubles de cuisine, meubles TV, placards et armoires, meubles de salle de bain, ainsi que de parquets, au Maroc." }}">
    <meta property="twitter:image" content="{{ isset($image) ? url(config('app.storage'), $image) : asset('assets/imgs/intercocina-logo.png') }}">
    <meta property="twitter:url" content="{{ request()->fullUrl() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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


        /* Image wrapper styles */
        .image-wrapper {
            min-height: 100%;
            position: relative;
        }

        /* Loading spinner */
        .loading::after {
            content: '';
            position: absolute;
            background-image: url('https://inter.facepy.com/assets/imgs/placeholder-image.webp');
            background-size: cover; /* Ensure the image covers the element */
            background-position: center; /* Center the image */
            width: 100%; /* Adjust width as needed */
            height: 100%; /* Adjust height as needed */
            display: block; /* Ensure it displays as a block */
        }


        /* @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        } */

        /* Image styles */
        .lazy-image {
            height: auto;
            opacity: 0;
            transition: opacity 0.5s ease;
            display: block;
        }

        .lazy-image.loaded {
            opacity: 1;
        }

        /* Error message styles */
        .error-message {
            color: #e74c3c;
            text-align: center;
            padding: 20px;
            display: none;
        }
    </style>
</head>
    <body class="bg-[#f2f2f2]" style="background-image: url('{{ asset("imgs/vecteur-inter.png")}}');background-blend-mode: lighten; background-size:460px">
        <x-navigation />
        <main class="mt-28">
            @yield('content')
        </main>
        <x-footer />
        @livewireScriptConfig
        <x-whatsapp-button />

        <script>
            function lazyLoading() {
                // Wait for DOM to be ready
                document.addEventListener('DOMContentLoaded', () => {
                    // Create intersection observer
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const wrapper = entry.target;
                                const img = wrapper.querySelector('.lazy-image');
                                const errorMsg = wrapper.querySelector('.error-message');

                                if (img && !img.src && img.dataset.src) {
                                    // Load the image
                                    img.src = img.dataset.src;

                                    // Handle successful load
                                    img.onload = () => {
                                        wrapper.classList.remove('loading');
                                        img.classList.add('loaded');
                                    };

                                    // Handle load error
                                    img.onerror = () => {
                                        wrapper.classList.remove('loading');
                                        errorMsg.style.display = 'block';
                                    };

                                    // Stop observing after loading starts
                                    observer.unobserve(wrapper);
                                }
                            }
                        });
                    }, {
                        root: null,
                        rootMargin: '50px',
                        threshold: 0.1
                    });

                    // Start observing all image wrappers
                    document.querySelectorAll('.image-wrapper').forEach(wrapper => {
                        observer.observe(wrapper);
                    });
                });
            }

            lazyLoading();
            document.addEventListener('livewire:load', () => {
                lazyLoading();
            });

            document.addEventListener('livewire:update', () => {
                lazyLoading();
            });

        </script>
    </body>
</html>