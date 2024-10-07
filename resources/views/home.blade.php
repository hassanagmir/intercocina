@extends('layouts.base')
@section('content')
<x-header headerClass="max-w-7xl mx-auto px-4 py-20 overflow-x-hidden md:overflow-visible">
    <div class="grid grid-cols-2 gap-8 md:gap-20 xl:gap-8 place-items-center">
        <div class="flex flex-col order-2 gap-3 pt-6 space-y-4 col-span-full md:px-4 xl:order-1 xl:col-span-1 md:pt-16 ">
            <h1 class="text-4xl font-bold leading-tight text-center md:text-left md:text-5xl md:leading-tight animate__animated animate__fadeInUp" x-animate="fadeInUp">
                <span class="text-gray-400 font-black">INTER</span><span class="text-red-600 font-black">COCINA</span> - Leader des cuisines modernes au Maroc
            </h1>
            <p class="text-center text-slate-500 md:text-left text-lg animate__delay-200ms animate__animated animate__fadeInUp" x-animate.delay.100="fadeInUp">
                Notre collection de meubles de cuisine est conçue pour transformer votre espace en un lieu d'inspiration gastronomique, où chaque détail compte.
            </p>
            <div class="flex justify-center md:justify-start gap-4">
                <a href="{{ route('contact') }}" class="btn btn-accent-gray animate__animated animate__fadeInUp flex items-center justify-center gap-2" x-animate.delay.200="fadeInUp" style="--animate-duration: 1s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087a3 3 0 0 0 1.398 0c.52-.125 1.001-.446 1.963-1.087l6.98-4.654M7.158 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327"/></svg>
                    <span>{{ __("Contact") }}</span>
                </a>
                @guest
                <a href="{{ route('user.login') }}" class="btn btn-primary animate__animated animate__fadeInUp" x-animate.delay.200="fadeInUp" style="--animate-duration: 1s;">
                    {{__("Se connecter")}}
                </a>
                @endguest

                @auth
                <a href="{{ route("products") }}" class="btn btn-primary animate__animated animate__fadeInUp flex items-center justify-center gap-2" x-animate.delay.200="fadeInUp" style="--animate-duration: 1s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 21a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-8 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3M3.71 5.4h15.214c1.378 0 2.373 1.27 1.995 2.548l-1.654 5.6C19.01 14.408 18.196 15 17.27 15H8.112c-.927 0-1.742-.593-1.996-1.452zm0 0L3 3"/></svg>
                    {{__("Produits")}}
                </a>
                @endauth
            </div>
        </div>

        <div class="relative order-1 col-span-full xl:order-2 xl:col-span-1 lg:pt-12">
            <div class="absolute z-0 rounded-full -top-8 -right-16  w-28 h-28 md:w-52 md:h-52 bg-accent-gray-200" x-animate.delay.500="zoomIn"></div>
            <div class="absolute rounded-full -bottom-8 -left-16 md:-bottom-16 bg-accent-red-400 w-36 h-36 md:w-64 md:h-64" x-animate.delay.500="zoomIn"></div>
            {{-- <img class="relative z-20 rounded-3xl" src="https://placehold.co/550x300" alt="" x-animate="zoomIn"> --}}
            <img class="relative z-20 rounded-3xl aspect-video animate__animated animate__zoomIn" src="https://placehold.co/550x300" width="550" height="300" alt="" x-animate="zoomIn" style="--animate-duration: 1s;">
        </div>
    </div>
</x-header>
<section class="md:py-12">
    <div class="px-4 py-16 md:max-w-5xl md:mx-auto">
        <h2 class="mb-4 text-2xl font-bold text-center md:text-4xl" x-animate.intersect="fadeInUp">
            La collection des porduits Intercocina.
        </h2>
        <p class="text-center text-slate-500 md:text-lg" x-animate.intersect.delay.100="fadeInUp">
            Que vous recherchiez le style, la fonctionnalité ou la qualité, notre gamme de produits a tout pour plaire.
            Explorez dès maintenant pour dénicher vos favoris.
        </p>
    </div>
    <div class="max-w-7xl mx-auto px-4 pb-20 overflow-x-hidden md:overflow-visible">
        <div class="w-full flex justify-center">
            @livewire('home-category')
        </div>
        <div class="flex justify-center md:max-w-6xl md:mx-auto gap-4">
            <a href="{{ route("products")}}" class="btn btn-primary" x-animate.intersect="fadeInUp">
                {{ __("Voir Plus") }}
            </a>
        </div>
    </div>
</section>
<section class="py-20 my-4 overflow-x-hidden bg-accent-gray-50">
    <div class="px-3 max-w-3xl m-auto">
       <div class="">
            <h2 class="mb-4 text-3xl font-bold text-center md:text-4xl" x-animate.intersect="fadeInUp">
                Des services qui font toute la différence
            </h2>
            <p class="text-center text-slate-500 md:text-lg" x-animate.intersect.delay.100="fadeInUp">
                Chez nous, l'excellence ne s'arrête pas à la qualité de nos produits. Nous avons à cœur de vous offrir une expérience client incomparable, enrichie par une gamme de services pensés pour votre confort et votre satisfaction.
            </p>
       </div>
    </div>
    <div class="flex flex-col items-stretch gap-10 px-4 py-12 md:py-20 md:max-w-6xl md:mx-auto md:flex-row">
        <div class="px-4 py-6 border bg-white rounded-3xl flex-1 flex flex-col gap-5"
            x-animate.intersect.delay.200="fadeInUp">
            <div class="flex justify-center">
                <img loading="lazy" width="40" height="40" class="w-16 aspect-square my-7" src="/assets/icons/method.png" alt="">
            </div>
            <h3 class="text-center text-xl md:text-2xl font-semibold">
                Fabrication
            </h3>
            <p class="text-slate-500 text-center text-md">
                Depuis plus de 13 ans, INTERCOCINA excelle dans la fabrication sur mesure de meubles de cuisine au Maroc.
            </p>
        </div>

        <div class="px-4 py-6 border bg-white rounded-3xl flex-1 flex flex-col gap-5"
            x-animate.intersect.delay.200="fadeInUp">
            <div class="flex justify-center">
                <img loading="lazy" width="40" height="40" class="w-16 aspect-square my-7" src="/assets/icons/volunteer-vest.png" alt="">
            </div>
            <h3 class="text-center text-xl md:text-2xl font-semibold">
                Consultations
            </h3>
            <p class="text-slate-500 text-center text-md">
                Notre équipe est à votre service pour répondre à vos questions, estimation gratuite du coût du projet.
            </p>
        </div>

        <div class="px-4 py-6 border bg-white rounded-3xl flex-1 flex flex-col gap-5"
            x-animate.intersect.delay.200="fadeInUp">
            <div class="flex justify-center">
                <img loading="lazy" width="40" height="40" class="w-16 aspect-square my-7" src="/assets/icons/shipping-fast.png" alt="">
            </div>
            <h3 class="text-center text-xl md:text-2xl font-semibold">
                Expédition
            </h3>
            <p class="text-slate-500 text-center text-md">
                L'équipe d'INTERCOCINA s'efforce de livrer à destination pour garantir que le produit arrive en parfait état.
            </p>
        </div>

    </div>
    <div class="flex justify-center md:max-w-6xl md:mx-auto gap-4">
        @if (auth()->user())
        <a href="{{ route('products') }}" class="btn btn-primary" x-animate.intersect="fadeInUp">
            Nos produits 
        </a>
        @else
            <button x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-primary">
                {{__("Se connecter")}}
            </button>
        @endif
    </div>
</section>

<section class="py-16 overflow-x-hidden">
    <div class="px-4 max-w-6xl mx-auto" x-animate.intersect.threshold.75="zoomIn">
        <div class="bg-accent-red rounded-3xl grid md:grid-rows-2 lg:grid-rows-1 lg:grid-cols-2  xl:gap-10 px-6 md:px-10 py-12 md:py-20">
            <div class="order-2 mt-10 lg:mt-0 md:order-1">
                <h2 class="text-3xl text-left md:text-4xl font-bold text-white" x-animate.intersect.threshold.75="fadeInRight">
                    Le pionnier des cuisines modernes au Maroc.
                </h2>
                <div>
                    <p class="text-white text-start" x-animate.intersect.threshold.75="fadeInRight">
                        Nous fusionnons innovation et design sophistiqué pour offrir des solutions qui allient fonctionnalité et esthétique. Notre expertise repose sur des années d’expérience et une passion inébranlable pour la qualité.
                    </p>
                    <div class="py-10 flex md:justify-start justify-center">
                        <a href="{{ route("user.login") }}" class="btn btn-accent-white-filled" x-animate.intersect.threshold.75="fadeInRight">
                            Je m'inscris
                        </a>
                    </div>
                </div>
            </div>

            <div class="px-0 w-full h-full order-1 md:order-2">
                <div class="relative flex items-center w-full h-full">
                    <div class="relative left-0 top-0 w-full h-full px-4 z-10">
                        <img loading="lazy" width="200" height="auto" class="w-full rounded-2xl bg-[#dddddd] p-6" src="/assets/imgs/intercocina-logo.png" alt="INTERCOCINA SAL" title="INTERCOCINA SAL">
                    </div>

                    <div class="bg-accent-gray-300 w-28 h-28 md:w-52 md:h-52 rounded-full absolute -top-10 -right-3 md:-top-24 md:-right-8 lg:-top-12  lg:-right-8 z-0"
                        x-animate.intersect.threshold.75="zoomIn">
                    </div>
                    <div class="bg-accent-red-500 hidden lg:block w-28 h-28 md:w-56 md:h-56 rounded-full absolute bottom-44 sm:-bottom-12 md:-bottom-16 -left-4 md:-left-8 lg:-bottom-16 lg:-left-16 z-0"
                        x-animate.intersect.threshold.75="zoomIn">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-16 overflow-hidden bg-accent-gray-50">
    @livewire('brands')
</section>

@livewire('reviews')
<section class="py-16 overflow-hidden bg-accent-gray-50">
    <div class="grid gap-8 px-4 lg:grid-cols-2 md:gap-20 md:max-w-7xl md:mx-auto">
        <div class="space-y-6 md:py-24">
            <h2 class="mb-4 text-2xl font-bold md:text-4xl" x-animate.intersect="fadeInUp">
                {{ __("Quelques Chiffres") }}…
            </h2>
            <p class="text-slate-500 md:text-lg" x-animate.intersect.delay.100="fadeInUp">
                Explorez notre parcours jalonné de succès et de chiffres impressionnants, témoignant de notre engagement
                inébranlable envers l'excellence en fabrication.
            </p>
            <div class="flex justify-center md:justify-start">
                <a href="{{ route('products') }}" class="btn btn-primary" x-animate.intersect="fadeInUp">
                    {{ __("Nos produits") }}
                </a>
            </div>
        </div>

        <div class="grid">
            <div class="grid col-start-1 row-start-1 place-items-center">
                <div x-animate.intersect="zoomIn" class="w-48 rounded-full aspect-square bg-accent-red-300"></div>
            </div>
            <div class="grid col-start-1 row-start-1 gap-6 md:grid-cols-2">
                <div class="space-y-6">
                    <div x-animate.intersect="fadeInUp"
                        class="px-6 py-8 space-y-4 bg-white border shadow-xl rounded-3xl">
                        <h3 class="text-4xl font-semibold md:text-7xl">
                            <span class="text-accent-gray-500">+</span>400
                            <span class="block mt-2 text-lg font-semibold md:text-xl">Client fidèle</span>
                        </h3>
                    </div>
                    <div x-animate.intersect="fadeInUp"
                        class="px-6 py-8 space-y-4 bg-white border shadow-xl rounded-3xl">
                        <h3 class="text-4xl font-semibold md:text-7xl">
                            <span class="text-accent-gray-500">+</span>500
                            <span class="block mt-2 text-lg font-semibold md:text-xl">Commandes en préparation</span>
                        </h3>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="hidden md:block min-h-8"></div>
                    <div x-animate.intersect="fadeInUp"
                        class="px-6 py-8 space-y-4 bg-white border shadow-xl rounded-3xl">
                        <h3 class="text-4xl font-semibold md:text-7xl">
                            <span class="text-accent-gray-500">+</span>10M
                            <span class="block mt-2 text-lg font-semibold md:text-xl">Commandes livrées</span>
                        </h3>
                    </div>

                    <div x-animate.intersect="fadeInUp"
                        class="px-6 py-8 space-y-4 bg-white border shadow-xl rounded-3xl ">
                        <h3 class="text-4xl font-semibold md:text-7xl">
                            <span class="text-accent-gray-500">+</span>98
                            <span class="text-accent-gray-500">%</span>
                            <span class="block mt-2 text-lg font-semibold md:text-xl">Clients satisfaits…</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="contact" class="relative py-24 overflow-hidden bg-accent-red">
    <div class="relative z-10 grid gap-16 px-4 md:grid-cols-2 md:max-w-7xl md:mx-auto ">
        <div class="space-y-6">
            <h2 class="text-3xl font-bold text-left text-white md:text-4xl animate__animated animate__fadeInRight" x-animate.intersect="fadeInRight" style="--animate-duration: 1s;">
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
</main>

<hr class="bg-gray-200 border-0">
@endsection