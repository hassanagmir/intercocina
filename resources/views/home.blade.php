@extends('layouts.base')



@section('content')
@vite('resources/js/keen-slider.js')

<x-header headerClass="max-w-7xl mx-auto px-4 py-20 overflow-x-hidden md:overflow-visible">

    <div class="grid grid-cols-2 gap-8 md:gap-20 xl:gap-8 place-items-center">
        <div
            class="flex flex-col order-2 gap-3 pt-6 space-y-4 col-span-full md:px-4 xl:order-1 xl:col-span-1 md:pt-16 ">
            <h1 class="text-4xl font-bold leading-tight text-center md:text-left md:text-5xl md:leading-tight"
                x-animate="fadeInUp">
                <span class="text-gray-400 font-black">INTER</span><span class="text-red-600 font-black">COCINA</span> - Leader des cuisines modernes au Maroc
            </h1>
            <p class="text-center text-slate-500 md:text-left animate__delay-200ms" x-animate.delay.100="fadeInUp">
                Nous sommes profondément honorés de vous présenter notre société, qui se distingue en tant que leader incontesté dans le domaine de la fabrication sur mesure d’éléments de cuisine
            </p>
            <div class="flex justify-center md:justify-start gap-4">
                <button x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-accent-blue" x-animate.delay.200="fadeInUp">
                    Contact
                </button>
                <a href="" class="btn btn-primary" x-animate.delay.200="fadeInUp">
                    {{ __('Voir portfolio') }}
                </a>
            </div>
        </div>

        <div class="relative order-1 col-span-full xl:order-2 xl:col-span-1 lg:pt-12">


            <div class="absolute z-0 rounded-full -top-8 -right-16  w-28 h-28 md:w-52 md:h-52 bg-accent-green-950"
                x-animate.delay.500="zoomIn"></div>


            <div class="absolute rounded-full -bottom-8 -left-16 md:-bottom-16 bg-accent-blue-400 w-36 h-36 md:w-64 md:h-64"
                x-animate.delay.500="zoomIn"></div>

            

             

            <img class="relative z-20 rounded-3xl" src="https://placehold.co/550x300" alt=""
                x-animate="zoomIn">
        </div>
    </div>
</x-header>


    <section class="py-16">
        <div class="px-4 py-16 md:max-w-5xl md:mx-auto">
            <h2 class="mb-4 text-2xl font-bold text-center md:text-4xl" x-animate.intersect="fadeInUp">
                Les sites web monotones ne captivent pas vos visiteurs.
            </h2>
            <p class="text-center text-slate-500 md:text-lg" x-animate.intersect.delay.100="fadeInUp">
                Les visiteurs sont comme nous tous, ils réagissent aux expériences émotionnelles.
                Nous concevons des sites web qui éveillent des émotions. Des expériences
                mémorables qui resteront gravées dans leur esprit.
            </p>
        </div>

        <div class="flex flex-col items-stretch justify-between gap-20 px-4 md:max-w-6xl md:mx-auto md:flex-row ">
                            <div class="fadeInLeft" x-animate.intersect="zoomInUp">
    <div class="overflow-hidden rounded-xl">
        <img loading="lazy" class="object-cover w-full transform transition-transform duration-300 hover:scale-110"
             src="https://new.digiton.ma/storage/125/01J4KM4BJN5GH2BE0YN50QPPXX.png" alt="">
    </div>
    <a href="https://new.digiton.ma/portfolio/1" target="_blank">
        <h3 class="pt-4 text-xl font-medium">
            Mobdie | Plateforme E-learning 
        </h3>
        <p class="text-slate-500 text-md">
            Création d&#039;un site internet permettant aux enfants et adolescents de bénéficier de cours en ligne su...
        </p>
    </a>
</div>
                            <div class="fadeInLeft" x-animate.intersect="zoomInUp">
    <div class="overflow-hidden rounded-xl">
        <img loading="lazy" class="object-cover w-full transform transition-transform duration-300 hover:scale-110"
             src="https://new.digiton.ma/storage/128/01J4KPTNJCKHA1DGCQPJ5WB3G5.png" alt="">
    </div>
    <a href="https://new.digiton.ma/portfolio/2" target="_blank">
        <h3 class="pt-4 text-xl font-medium">
            Newnice | Site vitrine 
        </h3>
        <p class="text-slate-500 text-md">
            Entreprise spécialisée dans la menuiserie métallique
        </p>
    </a>
</div>
                    </div>
        <div class="flex justify-center pt-20 md:max-w-6xl md:mx-auto gap-4">
            <button x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-accent-blue" x-animate.intersect="fadeInUp">
                Contact
            </button>
            <a href="https://new.digiton.ma/portfolio" class="btn btn-primary" x-animate.intersect="fadeInUp">
                Voir nos réalisations
            </a>
        </div>
    </section>

    <section class="py-20 my-4 overflow-x-hidden bg-accent-blue-50">
        <div class="px-3">
            <h2 class="mb-4 text-2xl font-bold text-center md:text-4xl" x-animate.intersect="fadeInUp">
                Ce que l'on vous offre !
            </h2>
            <p class="text-center text-slate-500 md:text-lg" x-animate.intersect.delay.100="fadeInUp">
                Nous vous proposons 3 types de services
            </p>
        </div>
        <div class="flex flex-col items-stretch gap-10 px-4 py-12 md:py-20 md:max-w-6xl md:mx-auto md:flex-row">
                            <div class="px-4 py-6 border bg-white rounded-3xl flex-1 flex flex-col gap-5" x-animate.intersect.delay.200="fadeInUp">
    <div class="flex justify-center">
        <img loading="lazy" width="48" height="48" class="w-36 aspect-square rounded-full" src="https://new.digiton.ma/storage/113/01J44Y51B8XBDAAG4GK9FTDMHR.svg" alt="">
    </div>
    <h3 class="text-center text-xl md:text-2xl font-semibold">
        Création vidéos
    </h3>
    <p class="text-slate-500 text-center text-md">
        Nous produisons des vidéos professionnelles et percutantes pour promouvoir
                votre marque et attirer l&#039;attention de votre audience.
    </p>
</div>
                            <div class="px-4 py-6 border bg-white rounded-3xl flex-1 flex flex-col gap-5" x-animate.intersect.delay.200="fadeInUp">
    <div class="flex justify-center">
        <img loading="lazy" width="48" height="48" class="w-36 aspect-square rounded-full" src="https://new.digiton.ma/storage/112/01J44Y4J9501J3F207FSSJEX4X.svg" alt="">
    </div>
    <h3 class="text-center text-xl md:text-2xl font-semibold">
        Réseaux sociaux
    </h3>
    <p class="text-slate-500 text-center text-md">
        Nous gérons et optimisons vos réseaux sociaux pour
                augmenter votre visibilité, attirer des followers, et créer une communauté engagée.
    </p>
</div>
                            <div class="px-4 py-6 border bg-white rounded-3xl flex-1 flex flex-col gap-5" x-animate.intersect.delay.200="fadeInUp">
    <div class="flex justify-center">
        <img loading="lazy" width="48" height="48" class="w-36 aspect-square rounded-full" src="https://new.digiton.ma/storage/111/01J44Y3JDQ3P418YB8XN2KZJHZ.svg" alt="">
    </div>
    <h3 class="text-center text-xl md:text-2xl font-semibold">
        Site Web
    </h3>
    <p class="text-slate-500 text-center text-md">
        Nous concevons des sites web attractifs et performants,
                    optimisés pour le référencement, afin de maximiser votre présence en ligne et convertir vos
                    visiteurs en clients.
    </p>
</div>
                    </div>
        <div class="flex justify-center md:max-w-6xl md:mx-auto gap-4">
            <button class="btn btn-primary" x-on:click="$dispatch('open-contact-form-modal')"
                x-animate.intersect="fadeInUp">
                Je prends rendez-vous
            </button>
        </div>
    </section>

    <section class="py-16 overflow-x-hidden">
        <div class="px-4 max-w-6xl mx-auto" x-animate.intersect.threshold.75="zoomIn">
    <div class="bg-accent-green rounded-3xl grid grid-rows-2 lg:grid-rows-1 lg:grid-cols-2  xl:gap-10 px-6 md:px-10 py-12 md:py-20">
        <div class="space-y-6 order-2 md:order-1">
            <h2 class="text-3xl text-left md:text-4xl font-bold text-white" x-animate.intersect.threshold.75="fadeInRight">
                Intéressés par le marketing digital?
            </h2>
            <div>
                <p class="text-white text-start" x-animate.intersect.threshold.75="fadeInRight">
                    Inscrivez vous dès maintenant pour bénéficier de notre
                    formation en ligne 100% gratuite !
                </p>
                <div class="py-10 flex md:justify-start justify-center">
                    <a href="https://new.digiton.ma/formation" class="btn btn-accent-white-filled" x-animate.intersect.threshold.75="fadeInRight">
                        Je m'inscris
                    </a>
                </div>
            </div>
        </div>

        <div class="px-0 w-full h-full order-1 md:order-2">
            <div class="relative flex items-center w-full h-full">
                <div class="relative left-0 top-0 w-full h-full px-4 z-10">
                    <img loading="lazy" width="200" class="w-full rounded-2xl" src="https://placehold.co/400x250" alt="">
                </div>

                <div class="bg-accent-blue-500 w-28 h-28 md:w-52 md:h-52 rounded-full absolute -top-10 -right-3 md:-top-24 md:-right-8 lg:-top-12  lg:-right-8 z-0"
                    x-animate.intersect.threshold.75="zoomIn">
                </div>
                <div class="bg-accent-green-350 w-36 h-36 md:w-56 md:h-56 rounded-full absolute bottom-16 -left-4 md:-bottom-16 md:-left-8 lg:-bottom-16 lg:-left-16 z-0"
                    x-animate.intersect.threshold.75="zoomIn">
                </div>
            </div>
        </div>
    </div>
</div>
    </section>

    <section class="py-1 py-16 overflow-x-hidden bg-accent-blue-50 ">
        <div class="max-w-3xl px-4 mx-auto">
            <h2 class="mb-4 text-2xl font-bold text-center md:text-4xl" x-animate.intersect="fadeInUp">
                Ce que vous y gagnez !
            </h2>
        </div>
        <div class="relative px-4 md:max-w-5xl md:mx-auto ">
            <div class="absolute z-0 rounded-full bg-accent-blue-400 w-28 h-28 md:w-36 md:h-36 -top-10 -right-0 md:-top-20 md:-right-16"
                x-animate.intersect="zoomIn">
            </div>
            <div class="absolute z-0 w-40 h-40 rounded-full bg-accent-green-350 md:w-52 md:h-52 md:-bottom-24 -bottom-16 -left-20 "
                x-animate.intersect="zoomIn">
            </div>

            <div x-animate.intersect="zoomIn"
                class="relative z-20 grid items-center gap-8 px-4 py-6 mt-10 mb-20 bg-white rounded-3xl md:px-16 md:py-20 sm:grid-cols-2 md:flex-row sm:gap-16 md:gap-20 ">

                <div class="flex items-center gap-4">
                    <div>
                        <svg width="40px" height="40px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#4cb472" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </div>
                    <p class="text-lg font-semibold md:text-xl">Sites web optimisés</p>
                </div>

                <div class="flex items-center gap-4">
                    <div>
                        <svg width="40px" height="40px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#4cb472" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </div>
                    <p class="text-lg font-semibold md:text-xl">Conversions augmentées</p>
                </div>

                <div class="flex items-center gap-4">
                    <div>
                        <svg width="40px" height="40px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#4cb472" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </div>
                    <p class="text-lg font-semibold md:text-xl">SEO amélioré</p>
                </div>

                <div class="flex items-center gap-4">
                    <div>
                        <svg width="40px" height="40px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#4cb472" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </div>
                    <p class="text-lg font-semibold md:text-xl">Renforcement de l'image de marque</p>
                </div>

                <div class="flex items-center gap-4">
                    <div>
                        <svg width="40px" height="40px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#4cb472" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </div>
                    <p class="text-lg font-semibold md:text-xl">Présence boostée sur les réseaux sociaux</p>
                </div>

                <div class="flex items-center gap-4">
                    <div>
                        <svg width="40px" height="40px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#4cb472" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </div>
                    <p class="text-lg font-semibold md:text-xl">Expérience utilisateur améliorée</p>
                </div>

                <div class="flex items-center gap-4">
                    <div>
                        <svg width="40px" height="40px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#4cb472" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </div>
                    <p class="text-lg font-semibold md:text-xl">Engagement renforcé</p>
                </div>

                <div class="flex items-center gap-4">
                    <div>
                        <svg width="40px" height="40px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#4cb472" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </div>
                    <p class="text-lg font-semibold md:text-xl">Charte graphique unique et attrayante</p>
                </div>

            </div>

        </div>
        <div class="flex justify-center mt-20 gap-4 md:-mt-5" x-animate.intersect="fadeInUp">
            <button x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-accent-blue" x-animate.intersect="fadeInUp">
                Contact
            </button>
            <a href="https://new.digiton.ma/portfolio" class="btn btn-primary" x-animate.intersect="fadeInUp">
                Voir portfolio
            </a>
        </div>
    </section>

    <section class="py-16 overflow-hidden">
        <div class="px-4 pb-10 md:max-w-5xl md:mx-auto">
            <h2 class="mb-4 text-2xl font-bold text-center md:text-4xl" x-animate.intersect="fadeInUp">
                Et si votre site e-commerce pouvait être créatif, innovant et même amusant ?
            </h2>
            <p class="text-center text-slate-500 md:text-lg" x-animate.intersect.delay.100="fadeInUp">
                Lorsque vous créez un site e-commerce avec nous, vous investissez dans la notoriété de votre marque,
                boostez vos ventes et observez un retour sur investissement clair et durable.
            </p>
        </div>

        <div
            class="flex flex-col items-stretch justify-between gap-8 px-4 md:max-w-6xl md:mx-auto md:flex-row md:gap-20">
                            <div class="fadeInLeft" x-animate.intersect="zoomInUp">
    <div class="overflow-hidden rounded-xl">
        <img loading="lazy" width="100%" class="object-cover w-full transform transition-transform duration-300 hover:scale-110"
             src="https://new.digiton.ma/storage/99/01J3G3GK3JGA6Z47WJQEZH5QSW.jpg" alt="">
    </div>
    <a href="https://new.digiton.ma/case-studies/1" target="_blank">
        <h3 class="pt-4 text-xl font-medium">
            Comment booster sa notoriété dans le domaine de l&#039;éducation ?
        </h3>
        <p class="text-slate-500 text-md">
            La Centrale d’Éducation : Lancement d’une nouvelle école à Fès.
        </p>
    </a>
</div>
                            <div class="fadeInLeft" x-animate.intersect="zoomInUp">
    <div class="overflow-hidden rounded-xl">
        <img loading="lazy" width="100%" class="object-cover w-full transform transition-transform duration-300 hover:scale-110"
             src="https://new.digiton.ma/storage/102/01J3G53HBYCC2BV19XBAAP48Q1.jpg" alt="">
    </div>
    <a href="https://new.digiton.ma/case-studies/2" target="_blank">
        <h3 class="pt-4 text-xl font-medium">
            IFMBTP - Institut de Formation BTP à Fès | Marketing Digital et Notoriété
        </h3>
        <p class="text-slate-500 text-md">
            Renforcer l&#039;engagement sur Instagram et améliorer la présence sur Google en termes de référencement...
        </p>
    </a>
</div>
                    </div>
        <div class="flex justify-center pt-10 md:max-w-6xl md:mx-auto gap-4" x-animate.intersect="fadeInUp">
            <button x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-accent-blue" x-animate.intersect="fadeInUp">
                Contact
            </button>
            <a href="https://new.digiton.ma/case-studies" class="btn btn-primary" x-animate.intersect="fadeInUp">
                Voir études de cas
            </a>
        </div>
    </section>

    <section class="overflow-hidden bg-gray-50 md:max-w-7xl md:mx-auto">
        <div class="px-4 py-16 sm:px-6 lg:me-0 lg:pe-0 lg:ps-8">
            <div class="items-end justify-between max-w-7xl sm:flex sm:pe-6 lg:pe-8"
                x-animate.intersect="fadeInRight">
                <div class="space-y-4">
                    <h2 class="mb-4 text-2xl font-bold md:text-4xl" x-animate.intersect="fadeInUp">
                        Témoignages
                    </h2>
                    <p class="text-slate-500 md:text-lg" x-animate.intersect.delay.100="fadeInUp">
                        Ce que nos clients pensent de nous
                    </p>
                </div>
                <div class="flex gap-4 mt-8 lg:mt-0">
                    <button aria-label="Previous slide" data-target="testimonials"
                        class="p-3 transition border rounded-full keen-slider-previous border-accent-blue-500 text-accent-blue-500 hover:bg-accent-blue-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-5 rtl:rotate-180">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    <button aria-label="Next slide" data-target="testimonials"
                        class="p-3 transition border rounded-full keen-slider-next border-accent-blue-500 text-accent-blue-500 hover:bg-accent-blue-500 hover:text-white">
                        <svg class="size-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mt-8 -mx-6 lg:col-span-2 lg:mx-0">
                <div class="keen-slider" id="testimonials">
    <div class="keen-slider__slide">
                            <blockquote
                                class="flex flex-col justify-between h-full p-6 bg-white border rounded-lg shadow-sm sm:p-8 lg:p-12">
                                <div>
                                    <div class="flex gap-0.5">
                                        <template x-for="star in [1,2,3,4,5]" :key="star">
                                            <svg class="w-5 h-5"
                                                :class="{ 'text-yellow-400': star < 5 }"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </template>
                                    </div>

                                    <div class="mt-4">
                                        <h3 class="text-2xl font-bold text-accent-blue-500 sm:text-3xl">
                                            Mouad Lawhoiwir</h3>

                                        <p class="mt-4 leading-relaxed text-gray-700">
                                            Une équipe très professionnelle, réactive et à l&#039;écoute de ses clients. C&#039;est toujours un réel plaisir de travailler avec INTERCOCINA. Je recommande les yeux fermés ! 
                                        </p>
                                    </div>
                                </div>

                                <footer class="mt-4 text-sm font-medium text-gray-700 sm:mt-6">
                                    &mdash; Fondateur d&#039;une agence de communication
                                </footer>
                            </blockquote>
                        </div>
                                            <div class="keen-slider__slide">
                            <blockquote
                                class="flex flex-col justify-between h-full p-6 bg-white border rounded-lg shadow-sm sm:p-8 lg:p-12">
                                <div>
                                    <div class="flex gap-0.5">
                                        <template x-for="star in [1,2,3,4,5]" :key="star">
                                            <svg class="w-5 h-5"
                                                :class="{ 'text-yellow-400': star < 5 }"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </template>
                                    </div>

                                    <div class="mt-4">
                                        <h3 class="text-2xl font-bold text-accent-blue-500 sm:text-3xl">
                                             Khalil Benchekroun</h3>

                                        <p class="mt-4 leading-relaxed text-gray-700">
                                            La meilleure agence marketing, je recommande !
                                        </p>
                                    </div>
                                </div>

                                <footer class="mt-4 text-sm font-medium text-gray-700 sm:mt-6">
                                    &mdash; Directeur marketing 
                                </footer>
                            </blockquote>
                        </div>
                                            <div class="keen-slider__slide">
                            <blockquote
                                class="flex flex-col justify-between h-full p-6 bg-white border rounded-lg shadow-sm sm:p-8 lg:p-12">
                                <div>
                                    <div class="flex gap-0.5">
                                        <template x-for="star in [1,2,3,4,5]" :key="star">
                                            <svg class="w-5 h-5"
                                                :class="{ 'text-yellow-400': star < 5 }"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </template>
                                    </div>

                                    <div class="mt-4">
                                        <h3 class="text-2xl font-bold text-accent-blue-500 sm:text-3xl">
                                            Omar Binfo</h3>

                                        <p class="mt-4 leading-relaxed text-gray-700">
                                            Expérience, qualité, prix
Franchement super agence 🙏🏽🙏🏽
                                        </p>
                                    </div>
                                </div>

                                <footer class="mt-4 text-sm font-medium text-gray-700 sm:mt-6">
                                    &mdash; Vendeur d&#039;équipements vidéos
                                </footer>
                            </blockquote>
                        </div>
                                            <div class="keen-slider__slide">
                            <blockquote
                                class="flex flex-col justify-between h-full p-6 bg-white border rounded-lg shadow-sm sm:p-8 lg:p-12">
                                <div>
                                    <div class="flex gap-0.5">
                                        <template x-for="star in [1,2,3,4,5]" :key="star">
                                            <svg class="w-5 h-5"
                                                :class="{ 'text-yellow-400': star < 5 }"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </template>
                                    </div>

                                    <div class="mt-4">
                                        <h3 class="text-2xl font-bold text-accent-blue-500 sm:text-3xl">
                                            Sardis </h3>

                                        <p class="mt-4 leading-relaxed text-gray-700">
                                            Sérieux et professionnalisme
                                        </p>
                                    </div>
                                </div>

                                <footer class="mt-4 text-sm font-medium text-gray-700 sm:mt-6">
                                    &mdash; Commerçant de robinetterie et douches
                                </footer>
                            </blockquote>
                        </div>
                                            <div class="keen-slider__slide">
                            <blockquote
                                class="flex flex-col justify-between h-full p-6 bg-white border rounded-lg shadow-sm sm:p-8 lg:p-12">
                                <div>
                                    <div class="flex gap-0.5">
                                        <template x-for="star in [1,2,3,4,5]" :key="star">
                                            <svg class="w-5 h-5"
                                                :class="{ 'text-yellow-400': star < 1 }"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </template>
                                    </div>

                                    <div class="mt-4">
                                        <h3 class="text-2xl font-bold text-accent-blue-500 sm:text-3xl">
                                            Donnell Fisher</h3>

                                        <p class="mt-4 leading-relaxed text-gray-700">
                                            Enim voluptas illum ea aut voluptas fugit debitis. Suscipit alias explicabo dolor magni eius ipsa aut. Error nesciunt impedit maiores quos. Porro facilis eos voluptatem nisi.
                                        </p>
                                    </div>
                                </div>

                                <footer class="mt-4 text-sm font-medium text-gray-700 sm:mt-6">
                                    &mdash; Brickmason
                                </footer>
                            </blockquote>
                        </div>
</div>

            </div>
        </div>
    </section>

    <section class="py-16 overflow-hidden bg-accent-blue-50">
        <div class="grid gap-8 px-4 lg:grid-cols-2 md:gap-20 md:max-w-7xl md:mx-auto">
            <div class="space-y-6 md:py-24">
                <h2 class="mb-4 text-2xl font-bold md:text-4xl" x-animate.intersect="fadeInUp">
                    Quelques Chiffres…
                </h2>
                <p class="text-slate-500 md:text-lg" x-animate.intersect.delay.100="fadeInUp">
                    Explorez notre parcours ponctué de réussites et de chiffres impressionnants, prouvant notre
                    engagement envers l'excellence digitale.
                </p>
                <div class="flex justify-center md:justify-start">
                    <button x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-accent-blue" x-animate.intersect="fadeInUp">
                        Contact
                    </button>
                </div>
            </div>

            <div class="grid">
                <div class="grid col-start-1 row-start-1 place-items-center">
                    <div x-animate.intersect="zoomIn" class="w-48 rounded-full aspect-square bg-accent-green-300">
                    </div>
                </div>
                <div class="grid col-start-1 row-start-1 gap-6 md:grid-cols-2">
                    <div class="space-y-6">
                        <div x-animate.intersect="fadeInUp"
                            class="px-6 py-8 space-y-4 bg-white border shadow-xl rounded-3xl">
                            <h3 class="text-4xl font-semibold md:text-7xl">
                                97
                                <span class="block mt-2 text-lg font-semibold md:text-xl">Projets accompagnés</span>
                            </h3>
                        </div>
                        <div x-animate.intersect="fadeInUp"
                            class="px-6 py-8 space-y-4 bg-white border shadow-xl rounded-3xl">
                            <h3 class="text-4xl font-semibold md:text-7xl">
                                <span class="text-accent-blue-500">+</span>50
                                <span class="block mt-2 text-lg font-semibold md:text-xl">Pages réseaux sociaux</span>
                            </h3>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="hidden md:block min-h-8"></div>
                        <div x-animate.intersect="fadeInUp"
                            class="px-6 py-8 space-y-4 bg-white border shadow-xl rounded-3xl">
                            <h3 class="text-4xl font-semibold md:text-7xl">
                                <span class="text-accent-blue-500">+</span>100
                                <span class="block mt-2 text-lg font-semibold md:text-xl">Site web développés</span>
                            </h3>
                        </div>

                        <div x-animate.intersect="fadeInUp"
                            class="px-6 py-8 space-y-4 bg-white border shadow-xl rounded-3xl ">
                            <h3 class="text-4xl font-semibold md:text-7xl">
                                <span class="text-accent-blue-500">+</span>95
                                <span class="text-accent-blue-500">%</span>
                                <span class="block mt-2 text-lg font-semibold md:text-xl">Clients satisfaits…</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        </main>
        
        <hr class="bg-gray-200 border-0">




@endsection
