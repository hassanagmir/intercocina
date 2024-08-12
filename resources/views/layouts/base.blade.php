
<!DOCTYPE html>
<html lang="en">

    <head>
                <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="wbnTBvoJpjsEMBAJDmErq38OTT5AYdw1CNSEUSGm">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">

        <title>
            Digiton
        </title>

        <link rel="canonical" href="https://new.digiton.ma" />
        <link rel="icon" href="/storage/01J4RH7E3A9GR10B5BQ7E19YFG.ico" type="image/x-icon"/>

        
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://new.digiton.ma">
        <meta property="og:title" content="Digiton">
        <meta property="og:description" content="">
        <meta property="og:image" content="/storage/01J4Q39GG4T0FDDH2JVFGFYWRD.png">

        
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://new.digiton.ma">
        <meta property="twitter:title" content="Digiton">
        <meta property="twitter:description" content="">
        <meta property="twitter:image" content="/storage/01J4Q39GG4T0FDDH2JVFGFYWRD.png">

        <!-- Custom Google font-->



        
        <link rel="preload" as="style" href="https://new.digiton.ma/build/assets/app-Cl0QQosK.css" /><link rel="modulepreload" href="https://new.digiton.ma/build/assets/app-CGFozmnA.js" /><link rel="stylesheet" href="https://new.digiton.ma/build/assets/app-Cl0QQosK.css" data-navigate-track="reload" /><script type="module" src="https://new.digiton.ma/build/assets/app-CGFozmnA.js" data-navigate-track="reload"></script>        <!-- Livewire Styles --><style >[wire\:loading][wire\:loading], [wire\:loading\.delay][wire\:loading\.delay], [wire\:loading\.inline-block][wire\:loading\.inline-block], [wire\:loading\.inline][wire\:loading\.inline], [wire\:loading\.block][wire\:loading\.block], [wire\:loading\.flex][wire\:loading\.flex], [wire\:loading\.table][wire\:loading\.table], [wire\:loading\.grid][wire\:loading\.grid], [wire\:loading\.inline-flex][wire\:loading\.inline-flex] {display: none;}[wire\:loading\.delay\.none][wire\:loading\.delay\.none], [wire\:loading\.delay\.shortest][wire\:loading\.delay\.shortest], [wire\:loading\.delay\.shorter][wire\:loading\.delay\.shorter], [wire\:loading\.delay\.short][wire\:loading\.delay\.short], [wire\:loading\.delay\.default][wire\:loading\.delay\.default], [wire\:loading\.delay\.long][wire\:loading\.delay\.long], [wire\:loading\.delay\.longer][wire\:loading\.delay\.longer], [wire\:loading\.delay\.longest][wire\:loading\.delay\.longest] {display: none;}[wire\:offline][wire\:offline] {display: none;}[wire\:dirty]:not(textarea):not(input):not(select) {display: none;}:root {--livewire-progress-bar-color: #2299dd;}[x-cloak] {display: none !important;}</style>

            </head>

    <body class="bg-slate-50 " x-data="{ openMenu: false }" :class="openMenu ? 'overflow-hidden' : 'overflow-visible'" x-cloak>
        
        <div class="mx-auto max-w-7xl">
    <div x-data="{ showNavbar: true, lastScrollY: window.scrollY }"
        @scroll.window="
            showNavbar = window.scrollY <= lastScrollY || window.scrollY < 50;
            lastScrollY = window.scrollY;
        "
        :class="{
            '-translate-y-full': !showNavbar,
            'translate-y-0': showNavbar
        }"
        class="fixed top-0 left-0 bg-slate-50 boreder-b-2 border-b-gray-200 z-50 w-full shadow-sm transition-transform duration-200">
        <nav class="flex items-center justify-between px-4 max-w-7xl mx-auto">

            <div class="py-4 ">
                <a href="/">
                    <img class="md:w-[200px] w-[150px] " src="https://new.digiton.ma/assets/images/Logo-Digiton-H.svg"
                        alt="Digiton's logo">
                </a>
            </div>

            <div class="hidden xl:flex">
                <ul class="flex items-center gap-10 ">
                    <li>
                        <a class="hover:text-accent-green text-gray-600" href="https://new.digiton.ma/notre-processus">
    Notre Approche
</a>
                    </li>
                    <li>
                        <a class="hover:text-accent-green text-gray-600" href="https://new.digiton.ma/case-studies">
    Case studies
</a>
                    </li>
                    <li>
                        <a class="hover:text-accent-green text-gray-600" href="https://new.digiton.ma/portfolio">
    Portfolio
</a>
                    </li>
                    <li>
                        <a class="hover:text-accent-green text-gray-600" href="https://new.digiton.ma/formation">
    Formation
</a>
                    </li>
                    <li>
                        <a class="hover:text-accent-green text-gray-600" href="https://new.digiton.ma/a-propos">
    À propos
</a>
                    </li>
                    <li>
                        <button x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-accent-blue">
                            Contact
                        </button>

                        <template x-teleport="body">
                            <div id="contact-form-modal" x-data="{ modalOpen: false }" x-show="modalOpen" @open-contact-form-modal.window="modalOpen = true"
    class="fixed inset-0 z-50" aria-labelledby="modal-title" role="dialog" :aria-modal="modalOpen">
    <div class="min-h-screen">
        <div x-cloak x-on:click="modalOpen = false" x-show="modalOpen"
            x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-10 backdrop-blur-lg" aria-hidden="true">
        </div>

        <div x-cloak x-show="modalOpen" x-trap="modalOpen"
            x-effect="modalOpen ?  document.body.style.overflow = 'hidden':  document.body.style.overflow = 'auto'"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="fixed top-0 left-0 flex items-center justify-center w-full h-full p-4 mt-4 md:p-8">

            <section @click.away="modalOpen = false"
                class="relative p-4 py-10 overflow-hidden text-left shadow-2xl bg-accent-green md:py-24 rounded-t-2xl md:rounded-2xl max-h-[100vh] mx-auto max-w-7xl md:overflow-hidden overflow-y-auto">

                <button @click="modalOpen = false"
                    class="absolute z-50 grid w-8 text-lg font-bold text-red-500 bg-white rounded-full right-4 top-4 aspect-square place-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M18 6l-12 12" />
                        <path d="M6 6l12 12" />
                    </svg>
                </button>

                <div class="relative z-10 grid gap-4 px-4 md:grid-cols-2 md:gap-16 md:px-10 md:max-w-6xl md:mx-auto">
                    <div class="py-16 space-y-6">
                        <h2 class="text-3xl font-bold text-left text-white md:text-4xl">
                            Toujours intéressés ? Besoin d'un rendez-vous ?
                        </h2>

                        <p class="text-xl text-white text-start">
                            Entrez vos informations et nous vous contacterons directement!
                        </p>
                    </div>
                    <div wire:snapshot="{&quot;data&quot;:{&quot;last_name&quot;:&quot;&quot;,&quot;first_name&quot;:&quot;&quot;,&quot;email&quot;:&quot;&quot;,&quot;phone&quot;:&quot;&quot;,&quot;message&quot;:&quot;&quot;},&quot;memo&quot;:{&quot;id&quot;:&quot;gi1SKa4yX4GLCRVwAu5H&quot;,&quot;name&quot;:&quot;cta-contact-form&quot;,&quot;path&quot;:&quot;\/&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;en&quot;},&quot;checksum&quot;:&quot;0ba52294facbd32d6614934bc4d6eafbfcb3d73b38334e75a4cdda7272ec54a0&quot;}" wire:effects="[]" wire:id="gi1SKa4yX4GLCRVwAu5H">
    <form wire:submit="save" class="space-y-4">

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="space-y-2">
    <label for="last_name" for="last_name" class="sr-only">
    Last_name
</label>

    <input type="text" id="last_name" name="last_name"
           placeholder="Nom"
           class="w-full rounded-lg border-gray-200 p-4 text-sm" wire:model="last_name" label-class="sr-only"/>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
</div>
            <div class="space-y-2">
    <label for="first_name" for="first_name" class="sr-only">
    First_name
</label>

    <input type="text" id="first_name" name="first_name"
           placeholder="Prénom"
           class="w-full rounded-lg border-gray-200 p-4 text-sm" wire:model="first_name" label-class="sr-only"/>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
</div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="space-y-2">
    <label for="email" for="email" class="sr-only">
    Email
</label>

    <input type="email" id="email" name="email"
           placeholder="Adresse e-mail"
           class="w-full rounded-lg border-gray-200 p-4 text-sm" wire:model="email" label-class="sr-only"/>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
</div>
            <div class="space-y-2">
    <label for="phone" for="phone" class="sr-only">
    Phone
</label>

    <input type="tel" id="phone" name="phone"
           placeholder="Téléphone"
           class="w-full rounded-lg border-gray-200 p-4 text-sm" wire:model="phone" label-class="sr-only"/>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
</div>
        </div>

        <div class="space-y-2">
    <label for="message" class="sr-only" for="message">
    Message
</label>

    <textarea type="text" id="message" name="message"
              placeholder="Message"
              class="w-full rounded-lg border-gray-200 p-3 text-sm" wire:model="message" rows="8" label-class="sr-only" placeholder="Message"></textarea>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
</div>

        <button class="block inline-block w-full rounded-lg border border-white bg-transparent text-white hover:bg-white px-5 py-3 font-medium hover:text-accent-green sm:w-auto mt-4" type="submit">
    Envoyer
</button>
    </form>
</div>                </div>

                <div
                    class="absolute z-0 rounded-full bg-accent-blue w-28 h-28 md:w-80 md:h-80 md:-top-36 md:-right-28 -top-12 -right-6">
                </div>
                <div class="bg-[#58d185] hidden md:block w-80 h-80 rounded-full absolute z-0 md:-bottom-36 md:-left-28">
                </div>
            </section>

        </div>

    </div>
</div>
                        </template>
                    </li>
                </ul>
            </div>
            <div class="flex xl:hidden">
                <button x-on:click="openMenu = !openMenu" aria-label="navMenu" :aria-expanded="openMenu"
                    aria-controls="mobNav">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="#58d185" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 6l16 0" />
                        <path d="M4 12l16 0" />
                        <path d="M4 18l16 0" />
                    </svg>
                </button>

            </div>
        </nav>
    </div>
</div>
<hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">


<nav id="mobNav" class="fixed top-0 bottom-0 left-0 right-0 z-30 p-2 backdrop-blur-sm md:p-6 xl:hidden"
    :class="openMenu ? 'visible' : 'invisible'">
    <ul class="absolute top-0 bottom-0 right-0 w-10/12 py-8 text-lg transition-all bg-white drop-shadow-2xl "
        :class="openMenu ? 'translate-x-0' : 'translate-x-full'">
        <li class="py-10">
            <div class="flex justify-center ">
                <a href="/"><img class="h-[80px] md:h-[150px]"
                        src="https://new.digiton.ma/assets/images/Logo-Digiton-V.svg" alt=""></a>
            </div>
        </li>
        <li class="border-B border-inherit">
            <a class="block p-4 text-center" href="https://new.digiton.ma/notre-processus">Notre Approche</a>
        </li>
        <li class="border-y border-inherit">
            <a class="block p-4 text-center" href="https://new.digiton.ma/case-studies">Case studies</a>
        </li>
        <li class="border-y border-inherit">
            <a class="block p-4 text-center" href="https://new.digiton.ma/portfolio">Portfolio</a>
        </li>
        <li class="border-y border-inherit">
            <a class="block p-4 text-center" href="https://new.digiton.ma/formation">Formation</a>
        </li>
        <li class="border-y border-inherit">
            <a class="block p-4 text-center" href="https://new.digiton.ma/a-propos">À propos</a>
        </li>
    </ul>
    
    <button class="p-2 rounded-full bg-accent-green/30 md:p-4 " x-on:click="openMenu = !openMenu"
        aria-label="close-navMenu" :aria-expanded="openMenu" aria-controls="mobNav">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffff"
            fill="none">
            <path d=" M19.0005 4.99988L5.00045 18.9999M5.00045 4.99988L19.0005 18.9999" stroke="currentColor"
                stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</nav>

                <main class="mt-16">
            <link rel="preload" as="style" href="https://new.digiton.ma/build/assets/keen-slider-ZkZFmJaO.css" /><link rel="modulepreload" href="https://new.digiton.ma/build/assets/keen-slider-0KWdvQwv.js" /><link rel="stylesheet" href="https://new.digiton.ma/build/assets/keen-slider-ZkZFmJaO.css" data-navigate-track="reload" /><script type="module" src="https://new.digiton.ma/build/assets/keen-slider-0KWdvQwv.js" data-navigate-track="reload"></script>
    <header class=" max-w-7xl mx-auto px-4 py-20 overflow-x-hidden md:overflow-visible">
    <div class="grid grid-cols-2 gap-8 md:gap-20 xl:gap-8 place-items-center">
            <div
                class="flex flex-col order-2 gap-3 pt-6 space-y-4 col-span-full md:px-4 xl:order-1 xl:col-span-1 md:pt-16 ">
                <h1 class="text-4xl font-bold leading-tight text-center md:text-left md:text-5xl md:leading-tight"
                    x-animate="fadeInUp">
                    Digit-ON : Expert en Création de Sites Web et Marketing Digital
                </h1>
                <p class="text-center text-slate-500 md:text-left animate__delay-200ms" x-animate.delay.100="fadeInUp">
                    Élevez votre présence en ligne avec Digit-ON, votre partenaire pour des sites web captivants, une
                    gestion optimisée des réseaux sociaux, et des stratégies de marketing digital sur mesure.
                </p>
                <div class="flex justify-center md:justify-start gap-4">
                    <button x-on:click="$dispatch('open-contact-form-modal')" class="btn btn-accent-blue" x-animate.delay.200="fadeInUp">
                        Contact
                    </button>
                    <a href="https://new.digiton.ma/portfolio" class="btn btn-primary" x-animate.delay.200="fadeInUp">
                        Voir portfolio
                    </a>
                </div>
            </div>

            <div class="relative order-1 col-span-full xl:order-2 xl:col-span-1 lg:pt-12">
                <div class="absolute z-0 rounded-full -top-8 -right-16 bg-accent-blue-400 w-28 h-28 md:w-52 md:h-52"
                    x-animate.delay.500="zoomIn"></div>

                <div class="absolute rounded-full -bottom-8 -left-16 md:-bottom-16 bg-accent-green-350 w-36 h-36 md:w-64 md:h-64"
                    x-animate.delay.500="zoomIn"></div>

                <img class="relative z-20 rounded-3xl" src="https://placehold.co/550x300" alt=""
                    x-animate="zoomIn">
            </div>
        </div>
</header>


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
                                            Une équipe très professionnelle, réactive et à l&#039;écoute de ses clients. C&#039;est toujours un réel plaisir de travailler avec Digit-on. Je recommande les yeux fermés ! 
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
<footer class="px-4 pb-10 mt-24 overflow-hidden md:max-w-7xl md:mx-auto">
    <section>
        <div class="grid grid-cols-2">
            <div class="space-y-4 xl:col-span-1 col-span-full" x-animate.intersect="fadeInRight">
                <img class="w-[200px]" loading="lazy" src="https://new.digiton.ma/assets/images/Logo-Digiton-2L.svg" alt="">
                <p class="text-slate-500 md:max-w-[400px]">
                    Digit-ON, agence de marketing digital, offre des sites internet performants,
                    des vidéos de qualité, et une gestion optimale des réseaux sociaux.
                    Nous nous engageons à augmenter votre visibilité et à atteindre vos objectifs de croissance.
                </p>
            </div>
            <div
                class="flex flex-col items-stretch gap-10 my-10 md:flex-row md:justify-center md:py-24 md:my-0 xl:col-span-1 col-span-full">
                <div class="flex items-center gap-3 px-6 py-3 duration-500 shadow-lg bg-accent-green-350 rounded-3xl hover:scale-105"
                    x-animate.intersect="fadeInLeft">
                    <img class="w-[40px]" loading="lazy" src="https://new.digiton.ma/assets/images/mail.png" alt="">
                    <div>
                        <p class="text-lg font-bold text-white ">Envoyez-nous un email</p>
                        <p class="text-white">hello@digiton.com</p>
                    </div>

                </div>
                <div class="flex items-center gap-3 px-6 py-3 duration-500 bg-white shadow-lg rounded-3xl hover:scale-105"
                    x-animate.intersect="fadeInLeft">
                    <img class="w-[40px]" loading="lazy" src="https://new.digiton.ma/assets/images/phone.png" alt="">
                    <div>
                        <p class="text-lg font-bold ">Appelez-nous</p>
                        <p>+212 0000000</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <hr class="h-px my-10 bg-gray-200 border-0">

    <section class="flex flex-col gap-16 mb-8 lg:flex-row lg:justify-between">
        <div class="flex justify-around order-2 gap-10 xl:order-1">
            <div class="flex flex-col">
                <h4 class="py-6 text-lg text-accent-green">Pages</h4>
                <div class="flex gap-10">
                    <ul class="space-y-5">
                        <li class="text-slate-500 hover:text-accent-green">
                            <a href="/">Accueil</a>
                        </li>
                        <li class="text-slate-500 hover:text-accent-green">
                            <a href="/notre-processus">Notre Approche</a>
                        </li>
                        <li class="text-slate-500 hover:text-accent-green">
                            <a href="/case-studies">Case studies</a>
                        </li>
                        <li class="text-slate-500 hover:text-accent-green">
                            <a href="/portfolio">Portfolio</a>
                        </li>
                        <li class="text-slate-500 hover:text-accent-green">
                            <a href="/a-propos">À propos</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col">
                <h4 class="py-6 text-lg text-accent-green">Ressources</h4>

                <ul class="space-y-5">
                    <li class="text-slate-500 hover:text-accent-green"><a href="/formation">Formation</a>
                    </li>
                    <li class="text-slate-500 hover:text-accent-green">Podcast</li>
                    <li class="text-slate-500 hover:text-accent-green">Privacy policy</li>
                </ul>

            </div>

        </div>

        <div wire:snapshot="{&quot;data&quot;:{&quot;email&quot;:&quot;&quot;,&quot;emailSent&quot;:false},&quot;memo&quot;:{&quot;id&quot;:&quot;kKEOmOQ5b5WFFtONVTU8&quot;,&quot;name&quot;:&quot;newsletterform&quot;,&quot;path&quot;:&quot;\/&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;en&quot;},&quot;checksum&quot;:&quot;b938cf710e9a4661db4035480c6283b38128fcce0860e81748010d93b05134c0&quot;}" wire:effects="[]" wire:id="kKEOmOQ5b5WFFtONVTU8"
    class="w-full max-w-lg bg-accent-green px-8 py-16 xl:ml-36 rounded-3xl relative overflow-hidden order-1 xl:order-2 md:flex md:justify-center">
    <div class="w-40 aspect-square rounded-full bg-accent-blue absolute z-0 -bottom-10 -left-10" x-animate.intersect="zoomIn"></div>
    <div class="w-40 aspect-square rounded-full bg-[#58d185] w-36 md:w-80 absolute z-0 -top-16 -right-16 md:-top-28 md:-right-28" x-animate.intersect="zoomIn"></div>

    <div class="w-full relative z-20 space-y-6"
         x-data="{ emailSent: window.Livewire.find('kKEOmOQ5b5WFFtONVTU8').entangle('emailSent').live }"
         x-init="$watch('emailSent', () => { setTimeout(() => emailSent = false, 6000)})">
        <div class="space-y-2">
            <h4 class="text-white text-4xl font-bold uppercase tracking-wide">
                Newsletter
            </h4>
            <p class="text-white text-lg">
                Stay up to date! Subscribe to our newsletter.
            </p>
        </div>
        <div class="flex flex-col gap-4">

            <div class="space-y-2">
    <label for="newsletter_email" for="newsletter_email" class="sr-only">
    Newsletter_email
</label>

    <input type="text" id="newsletter_email" name="newsletter_email"
           placeholder="Email"
           class="w-full rounded-lg border-gray-200 p-4 text-sm  rounded-xl" wire:model="email" label-class="sr-only"/>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
</div>

            <button class="flex items-center justify-center gap-2 text-accent-green bg-white px-6 py-3 rounded-xl font-semibold hover:bg-accent-green hover:bg-transparent border hover:border-white hover:text-white" wire:click="subscribe" label="Subscribe">

    <svg wire:loading          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path wire:loading.class="animate-rotate" d="M3 12a9 9 0 0 0 9 9a9 9 0 0 0 9 -9a9 9 0 0 0 -9 -9"/>
        <path wire:loading.class="animate-rotate-reverse" d="M17 12a5 5 0 1 0 -5 5"/>
    </svg>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

    Subscribe
</button>

            <div>
                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                <p class="text-white text-sm">
                    We respect your privacy. You can unsubscribe at any time.
                </p>
            </div>
        </div>

    </div>
</div>
    </section>
    <hr class="h-px bg-gray-200 border-0">
    <div class="flex flex-col items-center gap-8 pt-8 md:justify-between lg:flex-row">
        <p class="text-center text-slate-500 md:text-left">
            Copyright © Digit-ON 2024. All rights reserved. Made with ❤️ in Fés.
        </p>
        <div>
            <ul class="flex items-center gap-4">
                <li>
                    <a href="https://ma.linkedin.com/company/digiton-ma" aria-label="Linkedin page link">
                        <svg class="duration-500 hover:scale-125" xmlns="http://www.w3.org/2000/svg" width="30px"
                            height="30px" viewBox="0 0 256 256">
                            <g fill="none">
                                <rect width="256" height="256" fill="#fff" rx="60" />
                                <rect width="256" height="256" fill="#0a66c2" rx="60" />
                                <path fill="#fff"
                                    d="M184.715 217.685h29.27a4 4 0 0 0 4-3.999l.015-61.842c0-32.323-6.965-57.168-44.738-57.168c-14.359-.534-27.9 6.868-35.207 19.228a.32.32 0 0 1-.595-.161V101.66a4 4 0 0 0-4-4h-27.777a4 4 0 0 0-4 4v112.02a4 4 0 0 0 4 4h29.268a4 4 0 0 0 4-4v-55.373c0-15.657 2.97-30.82 22.381-30.82c19.135 0 19.383 17.916 19.383 31.834v54.364a4 4 0 0 0 4 4M38 59.628c0 11.864 9.767 21.626 21.632 21.626c11.862-.001 21.623-9.769 21.623-21.631C81.253 47.761 71.491 38 59.628 38C47.762 38 38 47.763 38 59.627m6.959 158.058h29.307a4 4 0 0 0 4-4V101.66a4 4 0 0 0-4-4H44.959a4 4 0 0 0-4 4v112.025a4 4 0 0 0 4 4" />
                            </g>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/OnYourDigital?_rdc=1&_rdr" aria-label="facebook page link">
                        <svg class="duration-500 hover:scale-125" xmlns="http://www.w3.org/2000/svg" width="30px"
                            height="30px" viewBox="0 0 256 256">
                            <path fill="#1877f2"
                                d="M256 128C256 57.308 198.692 0 128 0S0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445" />
                            <path fill="#fff"
                                d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A129 129 0 0 0 128 256a129 129 0 0 0 20-1.555V165z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/digiton_agency/" aria-label="Instagram page link">
                        <svg class="duration-500 hover:scale-125" xmlns="http://www.w3.org/2000/svg" width="30px"
                            height="30px" viewBox="0 0 256 256">
                            <g fill="none">
                                <rect width="256" height="256" fill="url(#skillIconsInstagram0)" rx="60" />
                                <rect width="256" height="256" fill="url(#skillIconsInstagram1)" rx="60" />
                                <path fill="#fff"
                                    d="M128.009 28c-27.158 0-30.567.119-41.233.604c-10.646.488-17.913 2.173-24.271 4.646c-6.578 2.554-12.157 5.971-17.715 11.531c-5.563 5.559-8.98 11.138-11.542 17.713c-2.48 6.36-4.167 13.63-4.646 24.271c-.477 10.667-.602 14.077-.602 41.236s.12 30.557.604 41.223c.49 10.646 2.175 17.913 4.646 24.271c2.556 6.578 5.973 12.157 11.533 17.715c5.557 5.563 11.136 8.988 17.709 11.542c6.363 2.473 13.631 4.158 24.275 4.646c10.667.485 14.073.604 41.23.604c27.161 0 30.559-.119 41.225-.604c10.646-.488 17.921-2.173 24.284-4.646c6.575-2.554 12.146-5.979 17.702-11.542c5.563-5.558 8.979-11.137 11.542-17.712c2.458-6.361 4.146-13.63 4.646-24.272c.479-10.666.604-14.066.604-41.225s-.125-30.567-.604-41.234c-.5-10.646-2.188-17.912-4.646-24.27c-2.563-6.578-5.979-12.157-11.542-17.716c-5.562-5.562-11.125-8.979-17.708-11.53c-6.375-2.474-13.646-4.16-24.292-4.647c-10.667-.485-14.063-.604-41.23-.604zm-8.971 18.021c2.663-.004 5.634 0 8.971 0c26.701 0 29.865.096 40.409.575c9.75.446 15.042 2.075 18.567 3.444c4.667 1.812 7.994 3.979 11.492 7.48c3.5 3.5 5.666 6.833 7.483 11.5c1.369 3.52 3 8.812 3.444 18.562c.479 10.542.583 13.708.583 40.396c0 26.688-.104 29.855-.583 40.396c-.446 9.75-2.075 15.042-3.444 18.563c-1.812 4.667-3.983 7.99-7.483 11.488c-3.5 3.5-6.823 5.666-11.492 7.479c-3.521 1.375-8.817 3-18.567 3.446c-10.542.479-13.708.583-40.409.583c-26.702 0-29.867-.104-40.408-.583c-9.75-.45-15.042-2.079-18.57-3.448c-4.666-1.813-8-3.979-11.5-7.479s-5.666-6.825-7.483-11.494c-1.369-3.521-3-8.813-3.444-18.563c-.479-10.542-.575-13.708-.575-40.413c0-26.704.096-29.854.575-40.396c.446-9.75 2.075-15.042 3.444-18.567c1.813-4.667 3.983-8 7.484-11.5c3.5-3.5 6.833-5.667 11.5-7.483c3.525-1.375 8.819-3 18.569-3.448c9.225-.417 12.8-.542 31.437-.563zm62.351 16.604c-6.625 0-12 5.37-12 11.996c0 6.625 5.375 12 12 12s12-5.375 12-12s-5.375-12-12-12zm-53.38 14.021c-28.36 0-51.354 22.994-51.354 51.355c0 28.361 22.994 51.344 51.354 51.344c28.361 0 51.347-22.983 51.347-51.344c0-28.36-22.988-51.355-51.349-51.355zm0 18.021c18.409 0 33.334 14.923 33.334 33.334c0 18.409-14.925 33.334-33.334 33.334c-18.41 0-33.333-14.925-33.333-33.334c0-18.411 14.923-33.334 33.333-33.334" />
                                <defs>
                                    <radialGradient id="skillIconsInstagram0" cx="0" cy="0" r="1"
                                        gradientTransform="matrix(0 -253.715 235.975 0 68 275.717)"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fd5" />
                                        <stop offset=".1" stop-color="#fd5" />
                                        <stop offset=".5" stop-color="#ff543e" />
                                        <stop offset="1" stop-color="#c837ab" />
                                    </radialGradient>
                                    <radialGradient id="skillIconsInstagram1" cx="0" cy="0" r="1"
                                        gradientTransform="matrix(22.25952 111.2061 -458.39518 91.75449 -42.881 18.441)"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#3771c8" />
                                        <stop offset=".128" stop-color="#3771c8" />
                                        <stop offset="1" stop-color="#60f" stop-opacity="0" />
                                    </radialGradient>
                                </defs>
                            </g>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/@digit-on4079" aria-label="youtube channel link">
                        <svg class="duration-500 hover:scale-125" xmlns="http://www.w3.org/2000/svg" width="30px"
                            height="30px" viewBox="0 0 256 180">
                            <path fill="#f00"
                                d="M250.346 28.075A32.18 32.18 0 0 0 227.69 5.418C207.824 0 127.87 0 127.87 0S47.912.164 28.046 5.582A32.18 32.18 0 0 0 5.39 28.24c-6.009 35.298-8.34 89.084.165 122.97a32.18 32.18 0 0 0 22.656 22.657c19.866 5.418 99.822 5.418 99.822 5.418s79.955 0 99.82-5.418a32.18 32.18 0 0 0 22.657-22.657c6.338-35.348 8.291-89.1-.164-123.134" />
                            <path fill="#fff" d="m102.421 128.06l66.328-38.418l-66.328-38.418z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>

    </div>

</footer>

        <script data-navigate-once="true">window.livewireScriptConfig = {"csrf":"wbnTBvoJpjsEMBAJDmErq38OTT5AYdw1CNSEUSGm","uri":"\/livewire\/update","progressBar":"","nonce":""};</script>
            <script>
        document.addEventListener('DOMContentLoaded', function () {
            const keenSlider_testimonials = new KeenSlider(
                '#testimonials',
                {
                    loop: true,
                    slides: {
                        origin: 'center',
                        perView: 1.25,
                        spacing: 16,
                    },
                    breakpoints: {
                        '(min-width: 1024px)': {
                            slides: {
                                origin: 'auto',
                                perView: 2.5,
                                spacing: 32,
                            },
                        },
                    },
                },
                []
            );

            const keenSliderPrevious_testimonials = document.querySelector('.keen-slider-previous[data-target="testimonials"]');
            const keenSliderNext_testimonials = document.querySelector('.keen-slider-next[data-target="testimonials"]');

            if (keenSliderPrevious_testimonials && keenSliderNext_testimonials) {
                keenSliderPrevious_testimonials.addEventListener('click', () => keenSlider_testimonials.prev());
                keenSliderNext_testimonials.addEventListener('click', () => keenSlider_testimonials.next());
            } else {
                console.warn('Keen Slider navigation buttons not found');
            }
        });
    </script>
    </body>

</html>
