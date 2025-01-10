<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ (isset($title) ? $title . ' - ' : '') . config('app.name', 'Intercocina') }}</title>
    <meta name="description" content="{{ isset($description) ? Str::limit($description, 160, '') : "Intercocina est une entreprise spécialisée dans la fabrication de meubles de cuisine, meubles TV, placards et armoires, meubles de salle de bain, ainsi que de parquets, au Maroc." }}">
    <meta name="keywords" content="{{ isset($tags) ? $tags : 'Mobile de cuisine, Caisson  , Facade, Placards, Parquets, Tiroirs, Armoire, Caissons Bas, Caissons Haut, Caissons column' }}">
    <meta itemprop="image" content="{{ isset($image) ? $image : asset('assets/imgs/intercocina-logo.png') }}"> 
    <link rel="icon" type="image/x-icon" href="{{ asset('assets\imgs\favicon.png') }}">
    <link rel="canonical" href="{{ request()->fullUrl() }}" />
    <meta name="google-site-verification" content="qvGj4QxXzolE9UDquiCtVKxUzQqkKt92LtItABRoQBw" />
    {{-- Open Graph / Facebook --}}
    
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:title" content="{{ isset($title) ? $title : config('app.name', 'Intercocina') }}">
    <meta property="og:description" content="{{ isset($description) ? Str::limit($description, 160, '') : "Intercocina est une entreprise spécialisée dans la fabrication de meubles de cuisine, meubles TV, placards et armoires, meubles de salle de bain, ainsi que de parquets, au Maroc." }}">
    <meta property="og:image" content="{{ isset($image) ? $image : asset('assets/imgs/intercocina-logo.png') }}">
    <meta property="og:type" content="{{ isset($type) ? $type: "website" }}">
    {{-- Twitter --}}
   
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="{{ isset($title) ? $title : config('app.name', 'Laravel') }}">
    <meta property="twitter:description" content="{{ isset($description) ? Str::limit($description, 160, '') : "Intercocina est une entreprise spécialisée dans la fabrication de meubles de cuisine, meubles TV, placards et armoires, meubles de salle de bain, ainsi que de parquets, au Maroc." }}">
    <meta property="twitter:image" content="{{ isset($image) ? $image : asset('assets/imgs/intercocina-logo.png') }}">
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
    </body>
</html>