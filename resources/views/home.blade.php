@extends('layouts.base')
@section('content')
<x-header headerClass="max-w-7xl mx-auto px-4 py-20 overflow-x-hidden md:overflow-visible">
    <div class="grid grid-cols-2 gap-8 md:gap-20 xl:gap-8 place-items-center">
        <div class="flex flex-col order-2 gap-3 pt-6 space-y-4 col-span-full md:px-4 xl:order-1 xl:col-span-1 md:pt-16 ">
            <h1 class="text-4xl font-bold leading-tight text-center md:text-left md:text-5xl md:leading-tight" x-animate="fadeInUp">
                <span class="text-gray-400 font-black">INTER</span><span class="text-red-600 font-black">COCINA</span> - Leader des cuisines modernes au Maroc
            </h1>
            <p class="text-center text-slate-500 md:text-left animate__delay-200ms" x-animate.delay.100="fadeInUp">
                Nous sommes profondément honorés de vous présenter notre société, qui se distingue en tant que leader
                incontesté dans le domaine de la fabrication sur mesure d’éléments de cuisine.
            </p>
            <div class="flex justify-center md:justify-start gap-4">
                <button x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-accent-gray" x-animate.delay.200="fadeInUp">
                    Contact
                </button>
                <a href="" class="btn btn-primary" x-animate.delay.200="fadeInUp">
                    {{ __('Voir portfolio') }}
                </a>
            </div>
        </div>

        <div class="relative order-1 col-span-full xl:order-2 xl:col-span-1 lg:pt-12">
            <div class="absolute z-0 rounded-full -top-8 -right-16  w-28 h-28 md:w-52 md:h-52 bg-accent-gray-200" x-animate.delay.500="zoomIn"></div>
            <div class="absolute rounded-full -bottom-8 -left-16 md:-bottom-16 bg-accent-red-400 w-36 h-36 md:w-64 md:h-64" x-animate.delay.500="zoomIn"></div>
            <img class="relative z-20 rounded-3xl" src="https://placehold.co/550x300" alt="" x-animate="zoomIn">
        </div>
    </div>
</x-header>

<section class="py-16">
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
            <a href="{{ route("about")}}" class="btn btn-primary" x-animate.intersect="fadeInUp">
                Voir Plus
            </a>
        </div>
    </div>
</section>


<section class="py-20 my-4 overflow-x-hidden bg-accent-gray-50">
    <div class="px-3">
        <h2 class="mb-4 text-2xl font-bold text-center md:text-4xl" x-animate.intersect="fadeInUp">
            Ce que l'on vous offre !
        </h2>
        <p class="text-center text-slate-500 md:text-lg" x-animate.intersect.delay.100="fadeInUp">
            Nous vous proposons 3 types de services
        </p>
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
        <button class="btn btn-primary" x-on:click="$dispatch('open-contact-modal')" x-animate.intersect="fadeInUp">
            Je prends rendez-vous
        </button>
    </div>
</section>

<section class="py-16 overflow-x-hidden">
    <div class="px-4 max-w-6xl mx-auto" x-animate.intersect.threshold.75="zoomIn">
        <div
            class="bg-accent-red rounded-3xl grid grid-rows-2 lg:grid-rows-1 lg:grid-cols-2  xl:gap-10 px-6 md:px-10 py-12 md:py-20">
            <div class="space-y-6 order-2 md:order-1">
                <h2 class="text-3xl text-left md:text-4xl font-bold text-white" x-animate.intersect.threshold.75="fadeInRight">
                    Le pionnier des cuisines modernes au Maroc.
                </h2>
                <div>
                    <p class="text-white text-start" x-animate.intersect.threshold.75="fadeInRight">
                        Nous fusionnons innovation et design sophistiqué pour offrir des solutions qui allient fonctionnalité et esthétique. Notre expertise repose sur des années d’expérience et une passion inébranlable pour la qualité.
                    </p>
                    <div class="py-10 flex md:justify-start justify-center">
                        <a href="#" class="btn btn-accent-white-filled" x-animate.intersect.threshold.75="fadeInRight">
                            Je m'inscris
                        </a>
                    </div>
                </div>
            </div>

            <div class="px-0 w-full h-full order-1 md:order-2">
                <div class="relative flex items-center w-full h-full">
                    <div class="relative left-0 top-0 w-full h-full px-4 z-10">
                        <img loading="lazy" width="200" class="w-full rounded-2xl bg-[#dddddd] p-6" src="/assets/imgs/intercocina-logo.png" alt="INTERCOCINA SAL">
                    </div>

                    <div class="bg-accent-gray-300 w-28 h-28 md:w-52 md:h-52 rounded-full absolute -top-10 -right-3 md:-top-24 md:-right-8 lg:-top-12  lg:-right-8 z-0"
                        x-animate.intersect.threshold.75="zoomIn">
                    </div>
                    <div class="bg-accent-red-500 w-36 h-36 md:w-56 md:h-56 rounded-full absolute bottom-16 -left-4 md:-bottom-16 md:-left-8 lg:-bottom-16 lg:-left-16 z-0"
                        x-animate.intersect.threshold.75="zoomIn">
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                <button x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-primary"
                    x-animate.intersect="fadeInUp">
                    {{ __("Contact") }}
                </button>
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
                            <span class="text-accent-gray-500">+</span>1M
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


<section class="relative py-24 overflow-hidden bg-accent-red">
    <div class="relative z-10 grid gap-16 px-4 md:grid-cols-2 md:max-w-7xl md:mx-auto ">
        <div class="space-y-6">
            <h2 class="text-3xl font-bold text-left text-white md:text-4xl animate__animated animate__fadeInRight" x-animate.intersect="fadeInRight" style="--animate-duration: 1s;">
                Toujours intéressés par notre formation?
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
            <form action="#" class="space-y-4">

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="sr-only" for="name">Nom</label>
                        <input class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Nom" type="text" id="name">
                    </div>
                    <div>
                        <label class="sr-only" for="name">Prénom</label>
                        <input class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Prénom" type="text" id="name">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="sr-only" for="email">Adresse e-mail</label>
                        <input class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Adresse e-mail" type="email" id="email">
                    </div>

                    <div>
                        <label class="sr-only" for="phone">Téléphone</label>
                        <input class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Numéro de téléphone" type="tel" id="phone">
                    </div>
                </div>
                <div>
                    <label class="sr-only" for="message">Message</label>

                    <textarea class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Message" rows="8" id="message"></textarea>
                </div>

                <div class="mt-4">
                    <button type="submit" class="inline-block w-full px-5 py-3 font-medium text-white bg-transparent border border-white rounded-lg hover:bg-white hover:text-accent-red sm:w-auto">
                        Envoyer
                    </button>
                </div>
            </form>
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