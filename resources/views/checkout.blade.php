@extends('layouts.base')

@section('content')
<section class="py-8 antialiased md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">{{ __("Votre panier") }}</h2>
        <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
            <div class="mx-auto w-full flex-none lg:max-w-1xl xl:max-w-3xl">
                <div class="space-y-3">
                {{-- @dd(\Cart::getContent()) --}}
                @forelse(\Cart::getContent() as $product)
                    <div class="rounded-lg border border-gray-200 bg-white p-2 shadow-sm md:p-2">
                        @php
                            $product_id = intval($product['attributes']['product_id']);
                            $category_id = \App\Models\Product::find($product_id)->type->category->id ?? null;
                            $discount = 0;
                            if (auth()->check()) {
                                foreach (auth()->user()?->discounts as $discountItem) {
                                    if ($discountItem->category->id == $category_id) {
                                        $discount = $discountItem->percentage;
                                        break;
                                    }
                                }
                            }
                            
                        @endphp
                        <div class="md:flex md:items-center md:gap-6 md:space-y-0 md:justify-between">
                            <div>
                                <a href="{{ route('product.show', $product['attributes']['slug']) }}"
                                    class="text-base font-bold text-gray-900 hover:underline">
                                    {{ str_replace("Façade", $product['attributes']['attribute'], $product['name']) }}
                                    @if (!$product['attributes']['dimension'] && $product['attributes']['width'])
                                    {{ $product['attributes']['width'] }}{{ $product['attributes']['unit']}}
                                    @endif
                                    @if (!$product['attributes']['dimension'] && $product['attributes']['height'])
                                        {{ $product['attributes']['height'] }}{{ $product['attributes']['unit']}}
                                    @endif
                                    {{ $product['attributes']['dimension'] ? "- " . $product['attributes']['dimension'] . $product['attributes']['unit'] : '' }}
                                    {{ $product['attributes']['color'] ? "(" . $product['attributes']['color_name'] . ")" : '' }}
                                </a>
                            </div>
                            <div class="flex items-center justify-between md:order-3 md:justify-end">
                                <div class="text-end md:order-4">
                                    <p class="text-base font-bold text-gray-900 text-nowrap">
                                        {{ $product['quantity'] }} &#xa0; x &#xa0; {{{ round($product['price'], 2) }}} MAD
                                        @if ($discount)
                                        | -{{ $discount }}%
                                        @endif
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex justify-center py-4">
                        <img class="w-20" src="/assets/imgs/empty-cart.png" width="80px" height="auto" alt="Cart empty" title="Cart empty" loading="lazy">
                    </div>
                @endforelse
                </div>
            </div>
            <div class="mx-auto mt-6 max-w-5xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                @if (session()->has('message'))
                <div class="w-full mb-8 p-6 bg-gradient-to-br from-red-300 to-red-600 rounded-xl shadow-sm">
                    <h1 class="text-2xl font-bold text-white mb-4 flex gap-3">
                        <span>{{ $message }}</span>
                    </h1>
                </div>
                @endif
                @livewire('checkout-form')
            </div>
        </div>
    </div>
</section>
@endsection