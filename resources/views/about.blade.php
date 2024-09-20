@extends('layouts.base')


@section('content')
<section class="px-4 py-20 md:max-w-6xl md:mx-auto">
    <div class="relative z-10 mx-auto px-6 md:max-w-2xl lg:max-w-5xl lg:px-12">
        <div class="mx-auto text-center lg:w-4/5">
            <div class="">
                <h1 class="text-5xl font-black text-red-500 dark:text-white sm:text-6xl">
                    <span class="hidden sm:inline-block">L'excellence des cuisines</span> 
                    <br class="hidden sm:inline-block">De luxe au Maroc<br>
                    <div class="mx-auto block w-max">
                        <div class="relative block pb-2">
                            <span class="absolute inset-0 z-[1] block bg-gradient-to-b from-red-500 via-red-500 to-transparent bg-clip-text text-transparent dark:from-white dark:via-white">INTERCOCINA</span>
                            <span class="absolute inset-0 block bg-gradient-to-l from-[#e46161] to-[#ffffff] bg-clip-text text-transparent">INTERCOCINA</span>
                            <span class="block">INTERCOCINA</span>
                        </div>
                        <div class="-mt-4 grow overflow-hidden">
                            <svg class="w-60 sm:w-80" height="22" viewBox="0 0 283 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.24715 19.3744C72.4051 10.3594 228.122 -4.71194 281.724 7.12332" stroke="url(#paint0_linear_18_19)" stroke-width="4"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_18_19" x1="282" y1="5.49999" x2="40" y2="13" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#8f8d8d"></stop>
                                        <stop offset="1" stop-color="#e46161"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </h1>
                <p class="relative z-[11] my-8 text-lg text-gray-700 dark:text-gray-100">{{ __("Haute qualité")}} - {{ __("Livraison rapide")}} - {{__("Accessible")}}</p>
                <div class="flex items-center justify-center gap-6">
                    <a href="/contact" class="relative flex h-9 items-center justify-center px-4 before:absolute before:inset-0 before:rounded-full before:bg-red-500 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max">
                        <span class="leading-none relative text-base tracking-wider text-white">{{ __("Contact" )}}</span>
                    </a>
                    <a href="/produits" class="group flex items-center gap-1 tracking-wide text-gray-500">
                        <span class="duration-300 group-hover:tracking-wider group-hover:underline group-hover:underline-offset-2">{{ __("Nos produits") }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 translate-y-px duration-300 group-hover:translate-x-1">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <section class="mt-4">
        <div class="container mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                <div class="max-w-lg">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Leader des cuisines modernes</h2>
                    <p class="mt-4 text-gray-600 text-lg">Nous sommes profondément honorés de vous présenter notre société, qui se distingue en tant que leader incontesté dans le domaine de la fabrication sur mesure d’éléments de cuisine. Notre expertise se fonde sur l’exploitation de technologies de pointe, permettant ainsi la conception de cuisines d’exception</p>
                    <div class="mt-8">
                        <a href="#" class="text-blue-500 hover:text-blue-600 font-medium">
                            En savoir plus sur nous
                            <span class="ml-2">&#8594;</span>
                        </a>
                    </div>
                </div>
                <div class="sm:mt-12 mt-0 order-first sm:order-last">
                    <img src="/assets/imgs/intercocina-logo.png" alt="Intercocina About Us Image" width="auto" height="auto" class="object-cover rounded-lg shadow-sm border bg-gray-100">
                </div>
            </div>
        </div>
    </section>

    <section class="mt-4">
        <div class="container mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                <div class="mt-12 md:mt-0 sm:order-first">
                    <img src="https://intercocina.com/wp-content/uploads/2022/06/DSC008501-1-scaled.jpg" alt="Intercocina About Us Image" class="object-cover rounded-lg shadow-sm border bg-gray-100">
                </div>
                <div class="max-w-lg">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Fabrication de meubles de cuisine</h2>
                    <p class="mt-4 text-gray-600 text-lg">Depuis plus de 10 ans, INTERCOCINA excelle dans la fabrication de meubles de cuisine au Maroc, depuis son atelier à Nador. Notre équipe de menuisiers hautement qualifiés, hommes et femmes, met en œuvre son savoir-faire artisanal pour créer des meubles de cuisine d’une qualité exceptionnelle. En choisissant méticuleusement des matériaux de qualité, nous nous engageons à vous proposer des meubles résistants qui traversent le temps avec distinction.</p>
                    <div class="mt-8">
                        <a href="#" class="text-blue-500 hover:text-blue-600 font-medium">
                            En savoir plus sur nous
                            <span class="ml-2">&#8594;</span>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <section class="mt-4">
        <div class="container mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                <div class="max-w-lg">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Produit de qualité</h2>
                    <p class="mt-4 text-gray-600 text-lg">La sélection minutieuse des matériaux dans la confection de nos meubles et la rigueur de notre processus de création sont au cœur de notre engagement envers la qualité et la durabilité de nos produits. Depuis 2017, chacun de nos meubles est accompagné d’une certification et d’un certificat de catégorisation, offrant ainsi à nos clients l’assurance d’acquérir des pièces de mobilier exceptionnelles répondant aux normes de qualité les plus élevées.</p>
                    <div class="mt-8">
                        <a href="#" class="text-blue-500 hover:text-blue-600 font-medium">
                            En savoir plus sur nous
                            <span class="ml-2">&#8594;</span>
                        </a>
                    </div>
                </div>
                <div class="sm:mt-12 mt-0 order-first sm:order-last">
                    <img src="https://intercocina.com/wp-content/uploads/2022/06/DSC00998-768x512.jpg" alt="About Us Image" class="object-cover rounded-lg shadow-sm border bg-gray-100">
                </div>
            </div>
        </div>
    </section>

    <section class="mt-4">
        <div class="container mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                <div class="mt-12 md:mt-0 order-last sm:order-first">
                    <img src="https://intercocina.com/wp-content/uploads/2022/06/DSC00922-768x572.jpg" alt="About Us Image" class="object-cover rounded-lg shadow-sm border bg-gray-100">
                </div>
                <div class="max-w-lg">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Une innovation renouvelée</h2>
                    <p class="mt-4 text-gray-600 text-lg">Fort d’une expérience de plus d’une décennie, INTERCOCINA, leader en tant que fabricant de cuisines de renom, a toujours placé l’innovation au cœur de sa stratégie de développement. Notre engagement envers l’innovation vise à façonner des solutions qui transforment votre vie en rendant chaque aspect plus pratique, fonctionnel, et harmonieux, tout en répondant à vos besoins culinaires et esthétiques les plus exigeants.</p>
                    <div class="mt-8">
                        <a href="#" class="text-blue-500 hover:text-blue-600 font-medium">
                            En savoir plus sur nous
                            <span class="ml-2">&#8594;</span>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <h2 class="pt-20 pb-10 text-2xl font-bold text-center md:text-4xl" x-animate.intersect="fadeInUp">
        Nos marques
    </h2>
    <ul class="grid gap-8 py-5 md:grid-cols-3">
        @foreach ($brands as $brand)
        <li class="px-4 py-6 space-y-2 text-lg duration-300 bg-white border shadow-lg text-slate-500 rounded-2xl hover:cursor-pointer hover:scale-105 " x-animate.intersect.threshold.20="zoomInUp">
            <img class="object-cover w-full" src="{{ Storage::url($brand->logo) }}" alt="{{ $brand->name }}">
            <h3 class="text-lg font-semibold text-black md:text-xl">{{ $brand->name }}</h3>
            <p>
               {{ $brand->description }}
            </p>
        </li>
        @endforeach
    </ul>

    <div class="flex flex-col justify-center gap-10 px-4 py-24 md:flex-row">
        <a href="/contact" class="btn btn-primary"
            x-animate.intersect="fadeInRight">
            Travaillez avec nous
        </a>
    </div>

</section>
@endsection