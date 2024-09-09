@extends('layouts.dash')
@section('content')
<div class="container mx-auto">
    <div class="md:flex no-wrap md:-mx-2 ">
        <!-- Left Side -->
        <div class="w-full md:w-3/12 md:mx-2">
            <!-- Profile Card -->
            <div class="bg-white p-3 border-t-4 rounded-lg shadow-sm">
                <div class="image overflow-hidden">
                    <img class="h-auto w-full mx-auto" src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg" alt="">
                </div>
                <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
                <h3 class="text-gray-600 font-lg text-semibold leading-6">{{ auth()->user()->email }}</h3>

                <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 py-2 px-3 mt-3 divide-y rounded shadow-sm border-2">
                    <li class="flex items-center py-3">
                        <span>Statut</span>
                        <span class="ml-auto">
                            <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Actif</span></span>
                    </li>
                    <li class="flex items-center py-3">
                        <span>{{ __("Date d'inscription") }}</span>
                        <span class="ml-auto">{{ auth()->user()->created_at->format('M d, Y')}}</span>
                    </li>
                </ul>
            </div>
            <!-- End of profile card -->
            <div class="my-4"></div>
        </div>
        <!-- Right Side -->
        <div class="w-full md:w-9/12 mx-2 h-64">
            <!-- Profile tab -->
            <!-- About Section -->
            <div class="bg-white p-3 rounded-lg shadow-sm">
                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                    <span clas="text-green-500">
                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <span class="tracking-wide">À propos</span>
                </div>
                <div class="text-gray-700">
                    <div class="grid md:grid-cols-2 text-sm">
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">{{__("Prénom")}}</div>
                            <div class="px-4 py-2">{{ auth()->user()->first_name }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Nom</div>
                            <div class="px-4 py-2">{{ auth()->user()->last_name }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">{{ __("Genre") }}</div>
                            <div class="px-4 py-2">Mâle</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">{{ __("Téléphone") }}</div>
                            <div class="px-4 py-2">___</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Address</div>
                            <div class="px-4 py-2">__</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">E-mail.</div>
                            <div class="px-4 py-2">
                                <a class="text-red-600" href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of about section -->

            <div class="my-4"></div>

            <!-- Experience and education -->
            <div class="bg-white p-3 shadow-sm rounded-lg">
                <h2 class="text-md font-semibold">Dernières commandes</h2>
                <div class="grid grid-cols-2">
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection