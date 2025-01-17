@extends('layouts.dash')
@section('content')
<div class="container mx-auto pb-5">
    <div class="md:flex no-wrap md:-mx-2 ">
        <!-- Left Side -->
        <div class="hidden lg:block w-full md:w-3/12 md:mx-2">
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
                            @if (auth()->user()->status->value == 1)
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
        <div class="w-full lg:w-9/12 h-64">
            <!-- Profile tab -->
            <!-- About Section -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <!-- Profile Header -->
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-5 flex items-center space-x-4 border-b">
                    <div class="w-16 h-16 bg-blue-200 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">
                            @if (auth()->user()->first_name && auth()->user()->last_name)
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            @else
                                {{ auth()->user()->name }}
                            @endif
                            
                        </h2>
                        <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            
                <!-- Profile Details Grid -->
                <div class="p-6">
                    <div class="grid md:grid-cols-2 gap-4 text-sm">
                        <!-- Organisation -->
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 24 24"><g fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.75 5a1.5 1.5 0 0 0-1.5-1.5H9.288a1 1 0 0 0-1 1v1H4.75a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h10zm0 3.5h4.5a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-4.5zm0 4h2.5m-2.5 4h2.5"/><circle cx="6.75" cy="9.5" r="1" fill="currentColor"/><circle cx="6.75" cy="13" r="1" fill="currentColor"/><circle cx="6.75" cy="16.5" r="1" fill="currentColor"/><circle cx="10.75" cy="9.5" r="1" fill="currentColor"/><circle cx="10.75" cy="13" r="1" fill="currentColor"/><circle cx="10.75" cy="16.5" r="1" fill="currentColor"/></g></svg>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-600">{{ __('Organisation') }}</div>
                                <div class="text-gray-800">{{ auth()->user()->name ?? '__' }}</div>
                            </div>
                        </div>
            
                        <!-- First Name -->
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M21 12a9 9 0 1 1-18 0a9 9 0 0 1 18 0"/><path d="M14.5 9.25a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0M17 19.5c-.317-6.187-9.683-6.187-10 0"/></g></svg>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-600">{{ __('Nom et prénom') }}</div>
                                <div class="text-gray-800">{{ auth()->user()->full_name ?? '__' }}</div>
                            </div>
                        </div>
                        <!-- Phone -->
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" width="32" height="32" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.5" d="M8.14 15.733c2.158 2.158 4.278 3.28 5.89 3.864c1.768.64 3.606-.117 4.935-1.446l.459-.458a1.5 1.5 0 0 0 0-2.122l-1.149-1.149a1.5 1.5 0 0 0-2.121 0l-.387.387a2 2 0 0 1-2.828 0l-3.713-3.712a2 2 0 0 1 0-2.829l.387-.387a1.5 1.5 0 0 0 0-2.12l-1.15-1.15a1.5 1.5 0 0 0-2.12 0l-.572.572c-1.262 1.262-2.013 2.99-1.438 4.68c.538 1.58 1.622 3.685 3.806 5.87Z"/></svg>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-600">{{ __('Téléphone') }}</div>
                                <div class="text-gray-800">{{ auth()->user()->phone ?? '__' }}</div>
                            </div>
                        </div>
            
                        <!-- Address -->
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M12.56 20.82a.96.96 0 0 1-1.12 0C6.611 17.378 1.486 10.298 6.667 5.182A7.6 7.6 0 0 1 12 3c2 0 3.919.785 5.333 2.181c5.181 5.116.056 12.196-4.773 15.64"/><path d="M12 12a2 2 0 1 0 0-4a2 2 0 0 0 0 4"/></g></svg>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-600">{{ __('Address') }}</div>
                                <div class="text-gray-800">{{ auth()->user()->address ?? '__' }}</div>
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="flex items-center space-x-3">
                           
                            <svg xmlns="http://www.w3.org/2000/svg"  class="h-6 w-6 text-pink-500" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.232 9.747a6 6 0 1 0-8.465 8.506a6 6 0 0 0 8.465-8.506m0 0L20 4m0 0h-4m4 0v4"/></svg>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-600">{{ __('Genre') }}</div>
                                <div class="text-gray-800">{{ auth()->user()->gender ?? '__' }}</div>
                            </div>
                        </div>
                    </div>
            
                    <!-- Email Section -->
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><rect width="18.5" height="15.5" x="2.75" y="4.25" rx="3"/><path d="m2.75 8l8.415 3.866a2 2 0 0 0 1.67 0L21.25 8"/></g></svg>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-600">{{ __('E-mail') }}</div>
                                <a href="mailto:{{ auth()->user()->email }}" class="text-blue-600 hover:underline">
                                    {{ auth()->user()->email }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of about section -->

            <div class="my-4"></div>
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-200">
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-4 flex items-center space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-600 w-8 h-8" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                            <path d="m11 10.242l1.034 1.181c.095.109.266.1.35-.016l2.1-2.907M16.5 21a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-8 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3"/>
                            <path d="M3.71 5.4h15.214c1.378 0 2.373 1.27 1.995 2.548l-1.654 5.6C19.01 14.408 18.196 15 17.27 15H8.112c-.927 0-1.742-.593-1.996-1.452zm0 0L3 3"/>
                        </g>
                    </svg>
                    <h2 class="text-lg font-bold text-gray-800">Dernières Commandes</h2>
                </div>
               
                <!-- Desktop Table -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-100 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Référence</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Montant Total</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Produits</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Créé le</th>
                                <th class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($orders as $order)
                            
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('order.show', $order->code) }}">
                                            <span class="text-sm font-medium text-gray-900">{{ $order->code }}</span>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm text-gray-700 font-semibold">{{ $order->total_amount }} MAD</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $order->items->count() }} articles
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center text-nowrap px-2.5 py-0.5 rounded-full text-xs font-semibold 
                                            @switch($order->status->getLabel())
                                                @case('En attente')
                                                    bg-yellow-100 text-yellow-800
                                                @case('Terminé')
                                                    bg-green-100 text-green-800
                                                @case('Annulé')
                                                    bg-red-100 text-red-800
                                                @default
                                                    bg-gray-100 text-gray-800
                                            @endswitch
                                        ">
                                            {{ $order->status->getLabel() }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $order->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('order.show', $order->code) }}" class="text-blue-600 hover:text-blue-900 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="text-gray-500 text-lg font-semibold">
                                        Aucune commande trouvée
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @if ($orders->count() > 6)
                    <div class="bg-gray-50 px-6 py-4 flex justify-center border-t">
                        <a href="{{ route('order.list') }}" class="px-6 py-2 rounded-full bg-blue-500 text-white font-semibold hover:bg-blue-600 transition-colors">
                            {{ __("Voir toutes les commandes") }}
                        </a>
                    </div>
                    @endif
                    
                </div>
            
                <!-- Mobile Card View -->
                <div class="md:hidden">
                    @forelse ($orders as $order)
                    <div class="bg-white border-b hover:bg-gray-50 transition-colors duration-200 p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-semibold text-gray-900">{{ $order->code }}</span>
                            <span class="text-sm text-gray-700">{{ $order->created_at->format('d M Y') }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-base font-bold text-gray-800">{{ $order->total_amount }} MAD</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $order->items->count() }} articles
                            </span>
                        </div>
                        
                        <div class="flex justify-between items-center text-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 text-nowrap rounded-full text-xs font-semibold 
                                @switch($order->status->getLabel())
                                    @case('En attente')
                                        bg-yellow-100 text-yellow-800
                                    @case('Terminé')
                                        bg-green-100 text-green-800
                                    @case('Annulé')
                                        bg-red-100 text-red-800
                                    @default
                                        bg-gray-100 text-gray-800
                                @endswitch
                            ">
                                {{ $order->status->getLabel() }}
                            </span>
                            <a href="{{ route('order.show', $order->code) }}" class="text-blue-600 hover:text-blue-900 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="p-6 text-center">
                        <div class="text-gray-500 text-lg font-semibold">
                            Aucune commande trouvée
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection