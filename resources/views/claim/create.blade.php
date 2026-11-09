@extends('layouts.base')


@section('content')
<section class="px-4 py-32 md:mx-auto relative overflow-hidden bg-accent-red">
    <div class="relative z-10 grid gap-16 px-4 md:grid-cols-2 md:max-w-7xl md:mx-auto ">
        <div class="space-y-6">
            <h1 class="text-4xl font-bold text-left text-white md:text-4xl">Procédure de réclamation</h1>
            <div class="space-y-2">
                <p class="text-white text-start md:text-lg" x-animate.intersect="fadeInRight" style="--animate-duration: 1s;">
                    Chez Intercocina, nous nous efforçons de fournir la meilleure expérience possible à nos clients. Cependant, nous comprenons que des problèmes peuvent parfois survenir. Si vous avez une réclamation ou une préoccupation concernant nos produits ou services.
                </p>
                <h2 class="mb-4 text-2xl font-semibold text-white">Préparez les informations suivantes :</h2>
                <ul class="list-disc pl-5 space-y-2 text-white">
                    <li>Votre nom complet et vos coordonnées</li>
                    <li>Le numéro de commande ou de facture (le cas échéant)</li>
                    <li>Une description détaillée du problème</li>
                    <li>Votre numéro de téléphone</li>
                </ul>
            </div>
        </div>
        <div>
            @livewire('claim-form')
        </div>
    </div>

    <div class="absolute z-0 rounded-full bg-accent-blue w-28 h-28 md:w-80 md:h-80 md:-top-36 md:-right-28 -top-12 -right-6 animate__animated animate__zoomIn" x-animate="zoomIn" style="--animate-duration: 1s;">
    </div>
    <div class="bg-gray-300 hidden md:block w-80 h-80 rounded-full absolute z-0 md:-bottom-36 md:-left-28 animate__animated animate__zoomIn" x-animate="zoomIn" style="--animate-duration: 1s;">
    </div>
</section>
@endsection