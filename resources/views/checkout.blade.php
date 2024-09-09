@extends('layouts.base')

@section('content')
<section class="py-8 antialiased md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">{{ __("Votre panier") }}</h2>
      <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
        <div class="mx-auto w-full flex-none lg:max-w-1xl xl:max-w-3xl">
            <div class="space-y-3">
                <!-- Card -->
                @forelse( \Cart::getContent() as $product)
                <div class="rounded-lg border border-gray-200 bg-white p-2 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-2">
                    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                        <div class="flex items-center justify-between md:order-3 md:justify-end">
                            <div class="text-end md:order-4 md:w-32">
                                <p class="text-base font-bold text-gray-900 dark:text-white">{{ $product['price'] }} MAD</p>
                            </div>
                        </div>
                        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                            <a href="{{ route('product.show', $product['attributes']['slug']) }}" class="text-base font-bold text-gray-900 hover:underline dark:text-white">
                                {{ $product['name'] }} 
                                {{ $product['attributes']['dimension'] ? "- " . $product['attributes']['dimension'] . " mm" : '' }} 
                                {{ $product['attributes']['color'] ? "(" .$product['attributes']['color_name'] . ")" : ''}}
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="flex justify-center py-4">
                    <img class="w-20" src="/assets/imgs/empty-cart.png" alt="Cart empty">
                </div>
                @endforelse
                <!-- Card -->
            </div>
        </div>
        <div class="mx-auto mt-6 max-w-5xl flex-1 space-y-6 lg:mt-0 lg:w-full">
          @livewire('checkout-form')
        </div>
      </div>
    </div>
  </section>
  @endsection