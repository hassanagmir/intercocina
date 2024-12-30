@extends('layouts.dash')

@section('content')
<section class="antialiased min-h-screen">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0 py-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-900">{{ $order->code }}</h2>
            </div>
            <div class="md:flex">
                <div class="w-full md:w-2/3 p-6">
                    @forelse($order->items as $item)
                        @php
                            $dimension = '';
                            if ($item->dimension) {
                                if($item->dimension->width && $item->dimension->height ){
                                  $dimension =  $item->dimension->dimension;
                                }elseif($item->dimension->width || $item->dimension->height) {
                                  $dimension = $item->dimension->weight;
                                }
                            }
                        @endphp
                        <div wire:key='{{ $item->product->id }}' class="mb-4 p-4 border border-gray-200 rounded-lg">
                            <div class="md:flex items-center">
                                <div class="md:w-1/4 mb-4 md:mb-0 md:mr-4">
                                    <a href="{{ route('product.show', $item->product->slug) }}">
                                        <img class="w-24 h-24 object-cover rounded" 
                                            src="{{ url(config('app.storage'), $item->product?->images->first()?->image) }}" 
                                            alt="{{ $item->product->name }}"
                                        >
                                    </a>
                                </div>
                                <div class="md:w-3/4">
                                    <a href="{{ route('product.show', $item->product->slug) }}" class="text-lg font-semibold text-gray-900 hover:text-blue-600">
                                        {{ $item->product->name }} 
                                        {{ $dimension }} {{ $item?->product?->unit }}
                                        @if($item->color)
                                            ({{ $item->color->name }})
                                        @endif
                                        [x{{ $item->quantity }}]
                                    </a>
                                    <div class="mt-2 text-sm text-gray-600 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.778 8.395H21.25m-18.5 7.21h17.472M6.282 21.13L9.495 2.87m5.01 18.26l3.212-18.26"/>
                                        </svg>
                                        {{ $order->code }}
                                    </div>
                                    <div class="mt-2 text-base font-bold text-gray-900">
                                        {{ $item->total }} MAD
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="flex justify-center py-8">
                            <img class="w-32 h-32" src="/assets/imgs/empty-cart.png" alt="{{ __("Empty order") }}">
                        </div>
                    @endforelse
                </div>

                <div class="w-full md:w-1/3 p-6 bg-gray-50 border-t md:border-t-0 md:border-l border-gray-200">
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                            <span class="text-gray-600">{{ __("Date") }}</span>
                            <div class="flex items-center">
                                <span class="mr-2">{{ $order->created_at->format('d/m/Y - H:i') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                        <path d="M3 5.231L6.15 3M21 5.231L17.85 3"/>
                                        <circle cx="12" cy="13" r="8"/>
                                        <path d="M12 8.5v5l3 2"/>
                                    </g>
                                </svg>
                            </div>
                        </div>

                        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                            <span class="text-gray-600">{{ __("Produits") }}</span>
                            <div class="flex items-center">
                                <span class="mr-2 text-xl font-bold">{{ $order->items->count() }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m12 21l8.131-4.208c.316-.164.474-.245.589-.366a1 1 0 0 0 .226-.373c.054-.159.054-.336.054-.692V7.533M12 21l-8.131-4.208c-.316-.164-.474-.245-.589-.366a1 1 0 0 1-.226-.373C3 15.894 3 15.716 3 15.359V7.533M12 21v-9.063m9-4.404l-9 4.404m9-4.404l-8.27-4.28c-.267-.138-.4-.208-.541-.235a1 1 0 0 0-.378 0c-.14.027-.274.097-.542.235L3 7.533m0 0l9 4.404"/>
                                </svg>
                            </div>
                        </div>

                        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                            <span class="text-gray-600">{{ __("Méthode de paiement") }}</span>
                            <div class="flex items-center">
                                <span class="mr-2 text-md font-bold">{{ $order->payment ? $order->payment->getLabel() : "__" }}</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                            <span class="text-gray-600">{{ __("Statu") }}</span>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold 
                                bg-{{ $order->status->getBg() }}-100 
                                text-{{ $order->status->getBg() }}-800 
                                border border-{{ $order->status->getBg() }}-600">
                                {{ $order->status->getLabel() }}
                            </span>
                        </div>

                        <div class="flex justify-between items-center pt-2">
                            <span class="text-xl font-bold">{{ __("Total") }}</span>
                            <span class="text-2xl font-black text-gray-900">
                                {{ $order->total_amount }} MAD
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection