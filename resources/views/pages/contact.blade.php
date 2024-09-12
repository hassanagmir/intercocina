@extends('layouts.base')


@section('content')
<section id="contact" class="px-4 py-32 md:mx-auto relative overflow-hidden bg-accent-red">
    <div class="relative z-10 grid gap-16 px-4 md:grid-cols-2 md:max-w-7xl md:mx-auto ">
        <div class="space-y-6">
            <h1 class="text-4xl font-bold text-left text-white md:text-4xl animate__animated animate__fadeInRight">Contactez-nous</h1>
            <h2 class="text-xl font-bold text-left text-white md:text-2xl animate__animated animate__fadeInRight" x-animate.intersect="fadeInRight" style="--animate-duration: 1s;">
                Intercocina - Là où les saveurs rencontrent l'innovation
            </h2>
            <div class="space-y-2">
                <p class="text-white text-start md:text-lg animate__animated animate__fadeInRight" x-animate.intersect="fadeInRight" style="--animate-duration: 1s;">
                    Contactez-nous pour tous vos besoins et questions culinaires. Nous sommes là pour vous servir !
                </p>
                <p class="text-white text-start md:text-lg animate__animated animate__fadeInRight" x-animate.intersect="fadeInRight" style="--animate-duration: 1s;">
                    Vous pouvez également saisir votre email pour exprimer votre intérêt! Nous vous contacterons dès
                    que la prochaine session sera disponible.
                </p>

            </div>
        </div>
        <div x-animate.intersect="fadeInLeft" class="animate__animated animate__fadeInLeft" style="--animate-duration: 1s;">
            @livewire('contact-form')
        </div>
    </div>

    <div class="absolute z-0 rounded-full bg-accent-blue w-28 h-28 md:w-80 md:h-80 md:-top-36 md:-right-28 -top-12 -right-6 animate__animated animate__zoomIn" x-animate="zoomIn" style="--animate-duration: 1s;">
    </div>
    <div class="bg-gray-300 hidden md:block w-80 h-80 rounded-full absolute z-0 md:-bottom-36 md:-left-28 animate__animated animate__zoomIn" x-animate="zoomIn" style="--animate-duration: 1s;">
    </div>
</section>
@endsection