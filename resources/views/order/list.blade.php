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
    <a href="/produits" class="mt-6 px-4 py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-green-100 transition duration-300">
        {{ __("Retour à les produits") }}
    </button>
</div>
@endif
<div class="relative overflow-x-auto shadow-sm sm:rounded-lg text-gray-500 bg-gray-50">
    <h1 class="pt-3 px-5 text-xl font-semibold">Vos commandes</h1>
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
                    Poids
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
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
                <td class="px-6 py-4 text-nowrap">
                    __
                </td>
                <td class="flex items-center px-6 py-4">
                    <a href="{{ route('order.show', $order->code )}}" class="font-medium text-blue-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="m8.818 15.182l6.364-6.364m-4.95 0h4.95v4.95"/><path d="M3 9.4c0-2.24 0-3.36.436-4.216a4 4 0 0 1 1.748-1.748C6.04 3 7.16 3 9.4 3h5.2c2.24 0 3.36 0 4.216.436a4 4 0 0 1 1.748 1.748C21 6.04 21 7.16 21 9.4v5.2c0 2.24 0 3.36-.436 4.216a4 4 0 0 1-1.748 1.748C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.436a4 4 0 0 1-1.748-1.748C3 17.96 3 16.84 3 14.6z"/></g></svg>
                    </a>
                    <a href="#" class="font-medium text-green-600 hover:underline ms-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M19 10V5a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v5m15 0H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-8a1 1 0 0 0-1-1"/><path d="M17.5 20v-3a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v3m-4-7h2"/></g></svg>
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

    <div class="flex justify-center py-4">
        {{ $orders->links() }}
    </div>
</div>

@endsection