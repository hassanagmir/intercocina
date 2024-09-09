@extends('layouts.dash')

@section('content')


<div class="relative overflow-x-auto shadow-sm sm:rounded-lg text-gray-500 bg-gray-50">
    <h1 class="pt-3 px-5 text-xl font-semibold">Vos commandes</h1>
    <table class="w-full text-sm text-left rtl:text-right">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700">
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

            @foreach ($orders as $order)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $order->code }}
                </th>
                <td class="px-6 py-4 font-medium">
                    {{ $order->total_amount }} MAD
                </td>
                <td class="px-6 py-4">
                    {{ $order->items->count() }}
                </td>
                <td class="px-6 py-4">
                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-green-600">
                        {{ $order->status }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    {{ $order->created_at }}
                </td>
                <td class="px-6 py-4">
                    __
                </td>
                <td class="flex items-center px-6 py-4">
                    <a href="{{ route('order.show', $order->code )}}" class="font-medium text-blue-600 hover:underline">Vior</a>
                    <a href="#" class="font-medium text-green-600 hover:underline ms-3">Imprimer</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection