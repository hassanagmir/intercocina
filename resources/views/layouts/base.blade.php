
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @stack('head::start')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">

        <title>
            {{ (isset($title) ? $title . ' | ' : '') . config('app.name', 'Laravel') }}
        </title>

        <link rel="canonical" href="{{ url()->current() }}" />
        <link rel="icon" href="" type="image/x-icon"/>

        {{-- Open Graph / Facebook --}}
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ isset($title) ?? config('app.name', 'Laravel') }}">
        <meta property="og:description" content="">
        <meta property="og:image" content="">

        {{-- Twitter --}}
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="{{isset($title) ?? config('app.name', 'Laravel') }}">
        <meta property="twitter:description" content="">
        <meta property="twitter:image" content="">

        @stack('head::before-scripts')

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        @stack('head::end')
    </head>

    <body class="bg-slate-50 " x-data="{ openMenu: false }" :class="openMenu ? 'overflow-hidden' : 'overflow-visible'" x-cloak>
        @stack('body::start')

        <x-navigation />

        @stack('body::before-main')
        <main class="mt-16">
            @yield('content')
        </main>
        @stack('body::after-main')

        <x-footer />

        @livewireScriptConfig
        @stack('scripts')
    </body>

</html>
