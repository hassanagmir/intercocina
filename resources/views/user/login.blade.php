@extends('layouts.base')
@section('content')
<section id="contact" class="p-1 md:px-4 py-32 md:mx-auto relative overflow-hidden bg-accent-red">
    <div class="relative z-10 grid gap-16 p-1 md:px-4 md:grid-cols-2 md:max-w-7xl md:mx-auto ">
        <div class="space-y-6 hidden md:block">
            <img class="w-52 bg-white rounded-xl p-5" loading="lazy" width="208px" height="auto" src="/assets/imgs/intercocina-logo.png" alt="Login to you intercocina account" title="Login to you intercocina account">
                <h2 class="text-3xl font-bold text-left text-white md:text-4xl animate__animated animate__fadeInRight" x-animate.intersect="fadeInRight" style="--animate-duration: 1s;">
                    Toujours intéressés ? Rejoignez-nous maintenant.
                </h2>
                <div class="space-y-2">
                    <p class="text-white text-start md:text-lg animate__animated animate__fadeInRight" x-animate.intersect="fadeInRight" style="--animate-duration: 1s;">
                        Accédez à tous nos serveurs et suivez facilement toutes vos commandes via notre tableau de bord intuitif. 
                    </p>
                    <p class="text-white text-start md:text-lg animate__animated animate__fadeInRight" x-animate.intersect="fadeInRight" style="--animate-duration: 1s;">
                        Connectez-vous dès maintenant pour tout gérer au même endroit.
                    </p>
            </div>
        </div>
        <div x-animate.intersect="fadeInLeft" class="animate__animated animate__fadeInLeft" style="--animate-duration: 1s;">
            <h1 class="text-xl font-bold text-center text-white mb-4">Connectez-vous à votre compte</h1>
            @if (session('message'))
                <div class="bg-green-100 border border-green-400 mb-6 p-4 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                {{ session('message') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
            @livewire('login-form')
        </div>
    </div>
    <div class="absolute z-0 rounded-full bg-accent-blue w-28 h-28 md:w-80 md:h-80 md:-top-36 md:-right-28 -top-12 -right-6 animate__animated animate__zoomIn" x-animate="zoomIn" style="--animate-duration: 1s;">
    </div>
    <div class="bg-gray-300 hidden md:block w-80 h-80 rounded-full absolute z-0 md:-bottom-36 md:-left-28 animate__animated animate__zoomIn" x-animate="zoomIn" style="--animate-duration: 1s;">
    </div>
</section>
@endsection