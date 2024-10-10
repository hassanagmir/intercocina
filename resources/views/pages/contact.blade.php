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

<div class="bg-white -mt-6 py-6 text-red-600">
    <h2 class="my-6 text-center sm:text-4xl text-3xl font-semibold">Vous pouvez nous trouver ici</h2>
    <p class="text-center sm:text-xl text-sm flex justify-center gap-2 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 sm:w-6" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M12.56 20.82a.96.96 0 0 1-1.12 0C6.611 17.378 1.486 10.298 6.667 5.182A7.6 7.6 0 0 1 12 3c2 0 3.919.785 5.333 2.181c5.181 5.116.056 12.196-4.773 15.64"/><path d="M12 12a2 2 0 1 0 0-4a2 2 0 0 0 0 4"/></g></svg>
        <span class="font-semibold">4° tranche Z.I Selouane Nador 62700 P/Nador Maroc</span>
    </p>
    <p class="text-center sm:text-xl text-sm flex justify-center gap-3 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 sm:w-6" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 5V3m-9 2V3M3.25 8h17.5M3 10.044c0-2.115 0-3.173.436-3.981a3.9 3.9 0 0 1 1.748-1.651C6.04 4 7.16 4 9.4 4h5.2c2.24 0 3.36 0 4.216.412c.753.362 1.364.94 1.748 1.65c.436.81.436 1.868.436 3.983v4.912c0 2.115 0 3.173-.436 3.981a3.9 3.9 0 0 1-1.748 1.651C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.412a3.9 3.9 0 0 1-1.748-1.65C3 18.128 3 17.07 3 14.955z"/></svg>
        <span class="font-semibold">Du Lundi au Vendredi</span>
    </p>
    <p class="text-center sm:text-xl text-sm flex justify-center gap-3 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 sm:w-6" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M3 5.231L6.15 3M21 5.231L17.85 3"/><circle cx="12" cy="13" r="8"/><path d="M12 8.5v5l3 2"/></g></svg>
        <span class="font-semibold">De 9h à 16h30</span>
    </p>

    <div class="flex flex-col items-stretch gap-10 my-10 md:flex-row md:justify-center md:py-24 md:my-0 xl:col-span-1 col-span-full">
        <div class="flex items-center gap-3 px-6 py-3 duration-500 shadow-lg bg-accent-red-500 rounded-3xl hover:scale-105" x-animate.intersect="fadeInLeft">
            <img class="w-[40px]" loading="lazy" width="40px" height="40px" src="/assets/icons/mail.png" alt="Envoyez-nous un email" title="Envoyez-nous un email">
            <div>
                <p class="text-lg font-bold text-white ">Envoyez-nous un email</p>
                <p class="text-white">contact@intercocina.com</p>
            </div>
        </div>
        <div class="flex text-black items-center gap-3 px-6 py-3 duration-500 bg-white shadow-lg rounded-3xl hover:scale-105" x-animate.intersect="fadeInLeft">
            <img class="w-[40px]" width="40px" height="40px" loading="lazy" src="/assets/icons/phone.png" title="Appelez-nous" alt="Appelez-nous">
            <div>
                <p class="text-lg font-bold ">Appelez-nous</p>
                <p>+212 61 54 79 00</p>
                <p>+212 36 35 88 88</p>
            </div>
        </div>
    </div>
    <div class="z-20 px-4 md:max-w-7xl md:mx-auto rounded-xl">
        <iframe class="mt-6 rounded-xl z-20 border border-3" width="100%" height="450" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13065.885552532582!2d-2.9477224!3d35.044952!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd77af82d33d19e7%3A0xd1fb4c3901718120!2sINTERCOCINA%20SARL!5e0!3m2!1sen!2sma!4v1727266250885!5m2!1sen!2sma"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
@endsection