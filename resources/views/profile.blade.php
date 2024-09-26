@extends('layouts.dash')
@section('content')
<div class="container mx-auto pb-5">
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
                        <span>{{ __("État") }}</span>
                        <span class="ml-auto">
                            @if (auth()->user()->status == "active" )
                            <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Actif</span>
                            @else
                            <span class="bg-red-500 py-1 px-2 rounded text-white text-sm">Inactif</span>
                            @endif
                            
                        </span>
                    </li>
                    <li class="flex items-center py-3">
                        <span>{{ __("Date d'inscription") }} &#xa0; </span>
                        <span class="ml-auto"> {{ auth()->user()->created_at->format('M d, Y')}}</span>
                    </li>
                </ul>
            </div>
            <!-- End of profile card -->
            <div class="my-4"></div>
        </div>
        <!-- Right Side -->
        <div class="w-full md:w-9/12 h-64">
            <!-- Profile tab -->
            <!-- About Section -->
            <div class="bg-white p-3 rounded-lg shadow-sm">
                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                    <span clas="text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500" width="25" height="25" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><circle cx="12" cy="7.5" r="3"/><path d="M19.5 20.5c-.475-9.333-14.525-9.333-15 0"/></g></svg>
                    </span>
                    <h2 class="py-3 text-md font-semibold text-gray-500">À propos</h2>
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
                            <div class="px-4 py-2">{{ auth()->user()->gender ? auth()->user()->gender : "__" }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">{{ __("Téléphone") }}</div>
                            <div class="px-4 py-2">{{ auth()->user()->phone ? auth()->user()->phone : "__" }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Address</div>
                            <div class="px-4 py-2">{{ auth()->user()->address ? auth()->user()->address : "__" }}</div>
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
            <div class="bg-white shadow-sm rounded-lg mb-3">
                <div class="relative overflow-x-auto shadow-sm sm:rounded-lg text-gray-500 bg-gray-50">
                    <div class="flex items-center space-x-2 px-3 font-semibold text-gray-900 leading-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500" width="25" height="25" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="m11 10.242l1.034 1.181c.095.109.266.1.35-.016l2.1-2.907M16.5 21a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-8 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3"/><path d="M3.71 5.4h15.214c1.378 0 2.373 1.27 1.995 2.548l-1.654 5.6C19.01 14.408 18.196 15 17.27 15H8.112c-.927 0-1.742-.593-1.996-1.452zm0 0L3 3"/></g></svg>
                        <h2 class="py-3 text-mdS font-semibold text-gray-500">Dernières commandes</h2>
                    </div>
                   
                    <table class="w-full text-sm text-left rtl:text-right">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Référence
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Montant total
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Produits
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    État
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Crée le
                                </th>
    
                                <th scope="col" class="px-6 py-3">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                
                            @forelse ($orders as $order)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="text-nowrap px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                   {{ $order->code }}
                                </th>
                                <td class="px-6 py-4 font-medium text-nowrap">
                                    {{ $order->total_amount }} MAD
                                </td>
                                <td class="px-6 py-4 text-nowrap">
                                    {{ $order->items->count() }}
                                </td>
                                <td class="px-6 py-4 ">
                                    <span class="bg-{{ $order->status->getBg() }}-100 text-nowrap text-{{ $order->status->getBg() }}-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded border border-{{ $order->status->getBg() }}-600">
                                        {{ $order->status->getLabel() }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-nowrap">
                                    {{ $order->created_at }}
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="{{ route('order.show', $order->code )}}" class="font-medium text-blue-600 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="m8.818 15.182l6.364-6.364m-4.95 0h4.95v4.95"/><path d="M3 9.4c0-2.24 0-3.36.436-4.216a4 4 0 0 1 1.748-1.748C6.04 3 7.16 3 9.4 3h5.2c2.24 0 3.36 0 4.216.436a4 4 0 0 1 1.748 1.748C21 6.04 21 7.16 21 9.4v5.2c0 2.24 0 3.36-.436 4.216a4 4 0 0 1-1.748 1.748C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.436a4 4 0 0 1-1.748-1.748C3 17.96 3 16.84 3 14.6z"/></g></svg>
                                    </a>
                                </td>
                            </tr>

                            @empty
                            <tr colspan="5" class="font-semibold my text-black text-center text-md">
                                <td colspan="5" class="py-8">{{ __("Aucune commande") }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @if ($orders->count() > 6)
                    <div class="py-5 flex justify-center">
                        <a href="{{ route('order.list') }}" class="py-2 px-5 rounded-xl bg-red-400 hover:bg-red-500 text-white font-semibold">{{ __("Voir tout")}}</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="my-4"></div>


        </div>
    </div>
</div>
@endsection