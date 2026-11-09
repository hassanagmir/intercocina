@extends('layouts.base')


@section('content')
<section id="contact" class="px-1 md:px-4 py-32 md:mx-auto relative overflow-hidden bg-accent-red">
    <div class="relative z-10 grid gap-16 px-1 md:px-4 md:grid-cols-2 md:max-w-7xl md:mx-auto ">
        <div class="space-y-6">
            <img class="w-52 bg-white rounded-xl p-5" width="208" height="auto" src="/assets/imgs/intercocina-logo.png" loading="lazy" title="Login to you intercocina account" alt="Login to you intercocina account">
            <h2 class="text-3xl font-bold text-left text-white md:text-4xl animate__animated animate__fadeInRight" x-animate.intersect="fadeInRight" style="--animate-duration: 1s;">
                Toujours intéressés par notre service?
            </h2>
            <div class="space-y-2">
                
                <p class="text-white text-start md:text-lg animate__animated animate__fadeInRight" x-animate.intersect="fadeInRight" style="--animate-duration: 1s;">
                    Restez à l'écoute pour notre annonce de la prochaine session.
                </p>
                <p class="text-white text-start md:text-lg animate__animated animate__fadeInRight" x-animate.intersect="fadeInRight" style="--animate-duration: 1s;">
                    Vous pouvez également saisir votre email pour exprimer votre intérêt! Nous vous contacterons dès
                    que la prochaine session sera disponible.
                </p>

            </div>
        </div>
        <div x-animate.intersect="fadeInLeft" class="animate__animated animate__fadeInLeft" style="--animate-duration: 1s;">
            @livewire('register-form')
        </div>
    </div>

    <div class="absolute z-0 rounded-full bg-accent-blue w-28 h-28 md:w-80 md:h-80 md:-top-36 md:-right-28 -top-12 -right-6 animate__animated animate__zoomIn" x-animate="zoomIn" style="--animate-duration: 1s;">
    </div>
    <div class="bg-gray-300 hidden md:block w-80 h-80 rounded-full absolute z-0 md:-bottom-36 md:-left-28 animate__animated animate__zoomIn" x-animate="zoomIn" style="--animate-duration: 1s;">
    </div>
</section>
@endsection