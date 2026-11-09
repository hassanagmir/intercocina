@extends('layouts.dash')

@section('content')


@if (session()->has('message'))
<div class="w-full mb-8 p-6 bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-sm">
    <h1 class="text-2xl font-bold text-white mb-4 flex gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10c-.006 5.52-4.48 9.994-10 10Zm-.016-2H12a8 8 0 1 0-.016 0ZM10 17l-4-4l1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8Z" />
        </svg>
        <span>Votre commande a été envoyée avec succès</span>
    </h1>
    <p class="text-white text-lg mb-4">Merci pour votre commande. Nous vous contacterons prochainement.</p>
    <p class="text-white text-lg mb-4">Si vous avez des questions, contactez-nous aux numéros suivants :</p>
    <ul class="text-white text-lg list-disc list-inside">
        <li>+212 (6) 61 54 79 00 </li>
        <li>+212 (5) 36 35 88 86 </li>
    </ul>
    <div class="mt-6">
        <a href="/produits" class="px-4 py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-green-100 transition duration-300">
            {{ __("Retour à les produits") }}
        </a>
    </div>
</div>
@endif
<div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-4 flex items-center space-x-4 border-b border-b-gray-300">
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
                            <a href="{{ route('order.show', $order->code) }}" >
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
                            {{ $order->created_at->format('d/m/Y - H:i') }}
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
    </div>

    <!-- Mobile Card View -->
    <div class="md:hidden">
        @forelse ($orders as $order)
        <div class="bg-white border-b hover:bg-gray-50 transition-colors duration-200 p-4">
            <div class="flex justify-between items-center mb-2">
                <span class="text-sm font-semibold text-gray-900">{{ $order->code }}</span>
                <span class="text-sm text-gray-700">{{ $order->created_at->format('d/m/Y - H:i')}}</span>
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
    <div class="bg-gray-50 px-6 py-4 flex justify-center border-t">
        {{ $orders->links()}}
    </div>
</div>
@endsection