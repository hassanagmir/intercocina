@extends('layouts.base')
@section('content')

<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-20 rounded-xl" style="background-image: url('https://www.centimetre.com/medias/public/header/placard/ill-header-PLACARD_categorie.jpg?f2ff7e6')">
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Left Column - Image and Rating -->
        <div class="relative">
        </div>

        <!-- Right Column - Product Details -->
        <div class="space-y-8 bg-gray-50 p-4 rounded-sm">
            <h1 class="text-3xl font-bold text-gray-800">Placard sur-mesure</h1>

            <!-- Specifications -->
            <div class="space-y-6">
                <!-- Sur-mesure Section -->
                <div class="flex items-start space-x-4">
                    <div class="w-8 h-8">
                        <div class="w-8 h-8 text-cyan-400">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dimensions"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 5h11" /><path d="M12 7l2 -2l-2 -2" /><path d="M5 3l-2 2l2 2" /><path d="M19 10v11" /><path d="M17 19l2 2l2 -2" /><path d="M21 12l-2 -2l-2 2" /><path d="M3 10m0 2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v7a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2z" /></svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-cyan-400">SUR-MESURE</h3>
                        <p class="text-gray-600">
                            Hauteurs<br>
                            Largeur<br>
                            Profondeurs<br>
                            Epaisseurs: 16, 18, 22 mm
                        </p>
                    </div>
                </div>

                <!-- Design Section -->
                <div class="flex items-start space-x-4">
                    <div class="w-8 h-8">
                        <div class="w-8 h-8 text-cyan-400">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-paint"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /><path d="M19 6h1a2 2 0 0 1 2 2a5 5 0 0 1 -5 5l-5 0v2" /><path d="M10 15m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /></svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-cyan-400">DESIGN PERSONNALISABLE</h3>
                        <p class="text-gray-600">+30 coloris</p>
                        <p class="text-gray-600">+20 Type de poignées</p>
                    </div>
                </div>

                <!-- Delivery Section -->
                <div class="flex items-start space-x-4">
                    <div class="w-8 h-8">
                        <div class="w-8 h-8 text-cyan-400">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-inbox"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M4 13h3l3 3h4l3 -3h3" /></svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-cyan-400">TIROIRS</h3>
                        <p class="text-gray-600">Avec frien</p>
                        <p class="text-gray-600">Sont frien (Sheet)</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="grid grid-cols-2 gap-4">
                <button class="w-full py-3 px-6 btn btn-accent-gray animate__animated animate__fadeInUp flex items-center justify-center gap-2 transition-colors">
                    Guide des mesures
                </button>
                <button class="w-full py-3 px-6 btn btn-primary animate__animated animate__fadeInUp flex items-center justify-center gap-2">
                    Je crée mon projet
                </button>
            </div>
        </div>
    </div>
</div>

<section class="py-6">
    <div class="mx-auto container px-4 sm:px-6 lg:px-8 bg-white border shadow-sm rounded-xl">
        <div class="mt-6">
          
        </div>
        <div class="w-full grid md:grid-cols-2 gap-4">
            <div>
                <img src="/assets/placards/ABT GARD 02.jpg" class="rounded-xl" alt="">
            </div>
            <div>
                <h2 class="text-2xl font-bold">Placard colissants</h2>
                {{-- <p class="text-xl mt-3">Personnalisez votre placard sur-mesure selon vos envies</p> --}}
                <div class="col-ow-12 col-sm-6 col-xs-12 hidden-xs mt-3">
                    <p class="text-lg leading-8">
                        Personnalisez votre placard sur-mesure selon vos envies, nous vous proposons des portes coulissantes qui s’adaptent parfaitement à votre intérieur, qu’il soit moderne ou classique.
                    </p>
                    <ul class="space-y-3 mt-4">
                        <li class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                            <span class="text-lg font-semibold text-gray-800">Épaisseur de votre choix (16, 18, 22) m</span>
                        </li>
                        <li class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                            <span class="text-lg font-semibold text-gray-800">Préparation rapide</span>
                        </li>

                        <li class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                            <span class="text-lg font-semibold text-gray-800">Plus de +50 couleur disponible</span>
                        </li>
                        <li class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                            <span class="text-lg font-semibold text-gray-800">100 fabrique sur mesure</span>
                        </li>
                        <li class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                            <span class="text-lg font-semibold text-gray-800">Plus de +20 poignées disponible</span>
                        </li>
                        
                    </ul>
                    <div class="mt-6 sm:flex flex-initial space-y-4 sm:space-y-0 items-center flex-col min-[400px]:flex-row gap-3 mb-3 min-[400px]:mb-8">
                        <button  class="group border-2 border-red-400 py-3 px-5 rounded-full bg-red-50 text-red-600 font-semibold text-lg w-full flex items-center justify-center gap-2 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-red-300 hover:bg-red-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><rect width="18.5" height="15.5" x="2.75" y="4.25" rx="3"/><path d="m2.75 8l8.415 3.866a2 2 0 0 0 1.67 0L21.25 8"/></g></svg>
                            {{ __("Contactez-nous") }}
                        </button>

                        <a href="" class="group border-2 border-[#25d366] py-3 px-5 rounded-full bg-green-50 text-[#25d366] font-semibold text-lg w-full flex items-center justify-center gap-2 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-green-300 hover:bg-green-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" class="text-[#25d366]" height="34" viewBox="0 0 71 72" fill="none">
                                <path d="M12.5068 56.8405L15.7915 44.6381C13.1425 39.8847 12.3009 34.3378 13.4211 29.0154C14.5413 23.693 17.5482 18.952 21.89 15.6624C26.2319 12.3729 31.6173 10.7554 37.0583 11.1068C42.4992 11.4582 47.6306 13.755 51.5108 17.5756C55.3911 21.3962 57.7599 26.4844 58.1826 31.9065C58.6053 37.3286 57.0535 42.7208 53.812 47.0938C50.5705 51.4668 45.8568 54.5271 40.5357 55.7133C35.2146 56.8994 29.6432 56.1318 24.8438 53.5513L12.5068 56.8405ZM25.4386 48.985L26.2016 49.4365C29.6779 51.4918 33.7382 52.3423 37.7498 51.8555C41.7613 51.3687 45.4987 49.5719 48.3796 46.7452C51.2605 43.9185 53.123 40.2206 53.6769 36.2279C54.2308 32.2351 53.445 28.1717 51.4419 24.6709C49.4388 21.1701 46.331 18.4285 42.6027 16.8734C38.8745 15.3184 34.7352 15.0372 30.8299 16.0736C26.9247 17.11 23.4729 19.4059 21.0124 22.6035C18.5519 25.801 17.2209 29.7206 17.2269 33.7514C17.2237 37.0937 18.1503 40.3712 19.9038 43.2192L20.3823 44.0061L18.546 50.8167L25.4386 48.985Z" fill="#25d366" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M43.9566 36.8847C43.5093 36.5249 42.9856 36.2716 42.4254 36.1442C41.8651 36.0168 41.2831 36.0186 40.7236 36.1495C39.8831 36.4977 39.3399 37.8134 38.7968 38.4713C38.6823 38.629 38.514 38.7396 38.3235 38.7823C38.133 38.8251 37.9335 38.797 37.7623 38.7034C34.6849 37.5012 32.1055 35.2965 30.4429 32.4475C30.3011 32.2697 30.2339 32.044 30.2557 31.8178C30.2774 31.5916 30.3862 31.3827 30.5593 31.235C31.165 30.6368 31.6098 29.8959 31.8524 29.0809C31.9063 28.1818 31.6998 27.2863 31.2576 26.5011C30.9157 25.4002 30.265 24.42 29.3825 23.6762C28.9273 23.472 28.4225 23.4036 27.9292 23.4791C27.4359 23.5546 26.975 23.7709 26.6021 24.1019C25.9548 24.6589 25.4411 25.3537 25.0987 26.135C24.7562 26.9163 24.5939 27.7643 24.6236 28.6165C24.6256 29.0951 24.6864 29.5716 24.8046 30.0354C25.1049 31.1497 25.5667 32.2144 26.1754 33.1956C26.6145 33.9473 27.0937 34.6749 27.6108 35.3755C29.2914 37.6767 31.4038 39.6305 33.831 41.1284C35.049 41.8897 36.3507 42.5086 37.7105 42.973C39.1231 43.6117 40.6827 43.8568 42.2237 43.6824C43.1018 43.5499 43.9337 43.2041 44.6462 42.6755C45.3588 42.1469 45.9302 41.4518 46.3102 40.6512C46.5334 40.1675 46.6012 39.6269 46.5042 39.1033C46.2714 38.0327 44.836 37.4007 43.9566 36.8847Z" fill="#25d366" />
                            </svg>
                            <span>Whatsapp</span>
                        </a>
                    </div>
                    
                </div>
            </div>

            <div class="mt-10">
                <div>
                    <h2 class="text-2xl font-bold">Placards Abattants</h2>
                    <div class="col-ow-12 col-sm-6 col-xs-12 hidden-xs mt-3">
                        <p class="text-lg leading-8">
                            Placards à portes battantes sont personnalisables selon vos envies. Avec des charnières de qualité supérieure et une multitude de styles et de couleurs.
                        </p>
                        <ul class="space-y-3 mt-4">
                            <li class="flex gap-3 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                                <span class="text-lg font-semibold text-gray-800">Épaisseur de votre choix (16, 18, 22) m</span>
                            </li>
                            <li class="flex gap-3 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                                <span class="text-lg font-semibold text-gray-800">Préparation rapide</span>
                            </li>
    
                            <li class="flex gap-3 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                                <span class="text-lg font-semibold text-gray-800">Plus de +50 couleur disponible</span>
                            </li>
                            <li class="flex gap-3 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                                <span class="text-lg font-semibold text-gray-800">100 fabrique sur mesure</span>
                            </li>
                            <li class="flex gap-3 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                                <span class="text-lg font-semibold text-gray-800">Plus de +20 poignées disponible</span>
                            </li>
                            
                        </ul>
                        <div class="mt-6 sm:flex flex-initial space-y-4 sm:space-y-0 items-center flex-col min-[400px]:flex-row gap-3 mb-3 min-[400px]:mb-8">
                            <button  class="group border-2 border-red-400 py-3 px-5 rounded-full bg-red-50 text-red-600 font-semibold text-lg w-full flex items-center justify-center gap-2 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-red-300 hover:bg-red-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><rect width="18.5" height="15.5" x="2.75" y="4.25" rx="3"/><path d="m2.75 8l8.415 3.866a2 2 0 0 0 1.67 0L21.25 8"/></g></svg>
                                {{ __("Contactez-nous") }}
                            </button>
    
                            <a href="" class="group border-2 border-[#25d366] py-3 px-5 rounded-full bg-green-50 text-[#25d366] font-semibold text-lg w-full flex items-center justify-center gap-2 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-green-300 hover:bg-green-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" class="text-[#25d366]" height="34" viewBox="0 0 71 72" fill="none">
                                    <path d="M12.5068 56.8405L15.7915 44.6381C13.1425 39.8847 12.3009 34.3378 13.4211 29.0154C14.5413 23.693 17.5482 18.952 21.89 15.6624C26.2319 12.3729 31.6173 10.7554 37.0583 11.1068C42.4992 11.4582 47.6306 13.755 51.5108 17.5756C55.3911 21.3962 57.7599 26.4844 58.1826 31.9065C58.6053 37.3286 57.0535 42.7208 53.812 47.0938C50.5705 51.4668 45.8568 54.5271 40.5357 55.7133C35.2146 56.8994 29.6432 56.1318 24.8438 53.5513L12.5068 56.8405ZM25.4386 48.985L26.2016 49.4365C29.6779 51.4918 33.7382 52.3423 37.7498 51.8555C41.7613 51.3687 45.4987 49.5719 48.3796 46.7452C51.2605 43.9185 53.123 40.2206 53.6769 36.2279C54.2308 32.2351 53.445 28.1717 51.4419 24.6709C49.4388 21.1701 46.331 18.4285 42.6027 16.8734C38.8745 15.3184 34.7352 15.0372 30.8299 16.0736C26.9247 17.11 23.4729 19.4059 21.0124 22.6035C18.5519 25.801 17.2209 29.7206 17.2269 33.7514C17.2237 37.0937 18.1503 40.3712 19.9038 43.2192L20.3823 44.0061L18.546 50.8167L25.4386 48.985Z" fill="#25d366" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M43.9566 36.8847C43.5093 36.5249 42.9856 36.2716 42.4254 36.1442C41.8651 36.0168 41.2831 36.0186 40.7236 36.1495C39.8831 36.4977 39.3399 37.8134 38.7968 38.4713C38.6823 38.629 38.514 38.7396 38.3235 38.7823C38.133 38.8251 37.9335 38.797 37.7623 38.7034C34.6849 37.5012 32.1055 35.2965 30.4429 32.4475C30.3011 32.2697 30.2339 32.044 30.2557 31.8178C30.2774 31.5916 30.3862 31.3827 30.5593 31.235C31.165 30.6368 31.6098 29.8959 31.8524 29.0809C31.9063 28.1818 31.6998 27.2863 31.2576 26.5011C30.9157 25.4002 30.265 24.42 29.3825 23.6762C28.9273 23.472 28.4225 23.4036 27.9292 23.4791C27.4359 23.5546 26.975 23.7709 26.6021 24.1019C25.9548 24.6589 25.4411 25.3537 25.0987 26.135C24.7562 26.9163 24.5939 27.7643 24.6236 28.6165C24.6256 29.0951 24.6864 29.5716 24.8046 30.0354C25.1049 31.1497 25.5667 32.2144 26.1754 33.1956C26.6145 33.9473 27.0937 34.6749 27.6108 35.3755C29.2914 37.6767 31.4038 39.6305 33.831 41.1284C35.049 41.8897 36.3507 42.5086 37.7105 42.973C39.1231 43.6117 40.6827 43.8568 42.2237 43.6824C43.1018 43.5499 43.9337 43.2041 44.6462 42.6755C45.3588 42.1469 45.9302 41.4518 46.3102 40.6512C46.5334 40.1675 46.6012 39.6269 46.5042 39.1033C46.2714 38.0327 44.836 37.4007 43.9566 36.8847Z" fill="#25d366" />
                                </svg>
                                <span>Whatsapp</span>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="mt-10">
                <img src="/assets/placards/ABT GARD 02.jpg" class="rounded-xl" alt="">
            </div>

            <div class="mt-10">
                <img src="/assets/placards/ABT GARD 02.jpg" class="rounded-xl" alt="">
            </div>
            <div class="mt-10">
                <h2 class="text-2xl font-bold">Placard encastré</h2>
                {{-- <p class="text-xl mt-3">Personnalisez votre placard sur-mesure selon vos envies</p> --}}
                <div class="col-ow-12 col-sm-6 col-xs-12 hidden-xs mt-3">
                    <p class="text-lg leading-8">
                        Créez un placard sur-mesure qui reflète vos envies et s’intègre parfaitement à votre espace, adapté à tous les styles d’intérieur, qu’il soit contemporain ou traditionnel.
                    </p>
                    <ul class="space-y-3 mt-4">
                        <li class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                            <span class="text-lg font-semibold text-gray-800">Épaisseur de votre choix (16, 18, 22) m</span>
                        </li>
                        <li class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                            <span class="text-lg font-semibold text-gray-800">Préparation rapide</span>
                        </li>

                        <li class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                            <span class="text-lg font-semibold text-gray-800">Plus de +50 couleur disponible</span>
                        </li>
                        <li class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                            <span class="text-lg font-semibold text-gray-800">100 fabrique sur mesure</span>
                        </li>
                        <li class="flex gap-3 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-green-700" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M7.072 4.069a2.17 2.17 0 0 1 2.804-1.162l1.315.529c.52.208 1.099.208 1.618 0l1.315-.529a2.17 2.17 0 0 1 2.804 1.162l.556 1.303c.22.515.63.925 1.144 1.144l1.303.556a2.17 2.17 0 0 1 1.162 2.804l-.529 1.315a2.17 2.17 0 0 0 0 1.618l.529 1.315a2.17 2.17 0 0 1-1.162 2.804l-1.303.556a2.17 2.17 0 0 0-1.144 1.144l-.556 1.303a2.17 2.17 0 0 1-2.804 1.162l-1.315-.529a2.17 2.17 0 0 0-1.618 0l-1.315.529a2.17 2.17 0 0 1-2.804-1.162l-.556-1.303a2.17 2.17 0 0 0-1.144-1.144l-1.303-.556a2.17 2.17 0 0 1-1.162-2.804l.529-1.315a2.17 2.17 0 0 0 0-1.618l-.529-1.315A2.17 2.17 0 0 1 4.07 7.072l1.303-.556a2.17 2.17 0 0 0 1.144-1.144z"/><path d="m15.899 9.5l-5 5l-2.797-2.793"/></g></svg>
                            <span class="text-lg font-semibold text-gray-800">Plus de +20 poignées disponible</span>
                        </li>
                        
                    </ul>
                    <div class="mt-6 sm:flex flex-initial space-y-4 sm:space-y-0 items-center flex-col min-[400px]:flex-row gap-3 mb-3 min-[400px]:mb-8">
                        <button  class="group border-2 border-red-400 py-3 px-5 rounded-full bg-red-50 text-red-600 font-semibold text-lg w-full flex items-center justify-center gap-2 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-red-300 hover:bg-red-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><rect width="18.5" height="15.5" x="2.75" y="4.25" rx="3"/><path d="m2.75 8l8.415 3.866a2 2 0 0 0 1.67 0L21.25 8"/></g></svg>
                            {{ __("Contactez-nous") }}
                        </button>

                        <a href="" class="group border-2 border-[#25d366] py-3 px-5 rounded-full bg-green-50 text-[#25d366] font-semibold text-lg w-full flex items-center justify-center gap-2 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-green-300 hover:bg-green-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" class="text-[#25d366]" height="34" viewBox="0 0 71 72" fill="none">
                                <path d="M12.5068 56.8405L15.7915 44.6381C13.1425 39.8847 12.3009 34.3378 13.4211 29.0154C14.5413 23.693 17.5482 18.952 21.89 15.6624C26.2319 12.3729 31.6173 10.7554 37.0583 11.1068C42.4992 11.4582 47.6306 13.755 51.5108 17.5756C55.3911 21.3962 57.7599 26.4844 58.1826 31.9065C58.6053 37.3286 57.0535 42.7208 53.812 47.0938C50.5705 51.4668 45.8568 54.5271 40.5357 55.7133C35.2146 56.8994 29.6432 56.1318 24.8438 53.5513L12.5068 56.8405ZM25.4386 48.985L26.2016 49.4365C29.6779 51.4918 33.7382 52.3423 37.7498 51.8555C41.7613 51.3687 45.4987 49.5719 48.3796 46.7452C51.2605 43.9185 53.123 40.2206 53.6769 36.2279C54.2308 32.2351 53.445 28.1717 51.4419 24.6709C49.4388 21.1701 46.331 18.4285 42.6027 16.8734C38.8745 15.3184 34.7352 15.0372 30.8299 16.0736C26.9247 17.11 23.4729 19.4059 21.0124 22.6035C18.5519 25.801 17.2209 29.7206 17.2269 33.7514C17.2237 37.0937 18.1503 40.3712 19.9038 43.2192L20.3823 44.0061L18.546 50.8167L25.4386 48.985Z" fill="#25d366" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M43.9566 36.8847C43.5093 36.5249 42.9856 36.2716 42.4254 36.1442C41.8651 36.0168 41.2831 36.0186 40.7236 36.1495C39.8831 36.4977 39.3399 37.8134 38.7968 38.4713C38.6823 38.629 38.514 38.7396 38.3235 38.7823C38.133 38.8251 37.9335 38.797 37.7623 38.7034C34.6849 37.5012 32.1055 35.2965 30.4429 32.4475C30.3011 32.2697 30.2339 32.044 30.2557 31.8178C30.2774 31.5916 30.3862 31.3827 30.5593 31.235C31.165 30.6368 31.6098 29.8959 31.8524 29.0809C31.9063 28.1818 31.6998 27.2863 31.2576 26.5011C30.9157 25.4002 30.265 24.42 29.3825 23.6762C28.9273 23.472 28.4225 23.4036 27.9292 23.4791C27.4359 23.5546 26.975 23.7709 26.6021 24.1019C25.9548 24.6589 25.4411 25.3537 25.0987 26.135C24.7562 26.9163 24.5939 27.7643 24.6236 28.6165C24.6256 29.0951 24.6864 29.5716 24.8046 30.0354C25.1049 31.1497 25.5667 32.2144 26.1754 33.1956C26.6145 33.9473 27.0937 34.6749 27.6108 35.3755C29.2914 37.6767 31.4038 39.6305 33.831 41.1284C35.049 41.8897 36.3507 42.5086 37.7105 42.973C39.1231 43.6117 40.6827 43.8568 42.2237 43.6824C43.1018 43.5499 43.9337 43.2041 44.6462 42.6755C45.3588 42.1469 45.9302 41.4518 46.3102 40.6512C46.5334 40.1675 46.6012 39.6269 46.5042 39.1033C46.2714 38.0327 44.836 37.4007 43.9566 36.8847Z" fill="#25d366" />
                            </svg>
                            <span>Whatsapp</span>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection