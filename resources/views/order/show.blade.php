@extends('layouts.dash')

@section('content')
<section class="antialiased">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <h2 class="text-xl font-semibold text-gray-900">{{ $order->code }}</h2>
      <div class="mt-3 md:gap-6 lg:flex lg:items-start">
        <div class="mx-auto w-full flex-none lg:max-w-1xl xl:max-w-3xl">
            <div class="space-y-6">
                <!-- Card -->
                @forelse($order->items as $item)
                <div wire:key='{{ $item->product->id }}' class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                        <a href="#" class="shrink-0 md:order-1">
                            <img class="h-20 w-20 dark:hidden" src="{{ Storage::url($item->product?->images->first()?->image) }}" alt="{{ $item->product->name }}">
                        </a>
                        <label for="counter-input" class="sr-only">Choose quantity:</label>
                        <div class="flex items-center justify-between md:order-3 md:justify-end">
                            <div class="text-end md:order-4 md:w-32">
                                <p class="text-base font-bold text-gray-900">{{ $item->total }} MAD</p>
                            </div>
                        </div>
            
                        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                            <a href="{{ route('product.show', $item->product->slug) }}" class="text-base font-bold text-gray-900 hover:underline">
                                {{ $item->product->name }} - 
                                {{ $item->dimension ? $item->dimension->dimension . " mm" : '' }} 
                                {{ $item->color ? "(" .$item->color->name . ")" : ''}}
                            </a>
                            <div class="flex items-center gap-4">

                                <div class="inline-flex items-center text-sm font-medium text-gray-600">
                                    <div role="status">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="me-3" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.5 8H12m0 0h2.5M12 8v8m2.5 0H12m0 0H9.5m-6.793-5.705a2.41 2.41 0 0 0 0 3.41l7.588 7.588a2.41 2.41 0 0 0 3.41 0l7.588-7.588a2.41 2.41 0 0 0 0-3.41l-7.588-7.588a2.41 2.41 0 0 0-3.41 0z"/></svg>
                                    </div>
                                    {{ $order->code }}
                                </div>
                            </div>
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
    
        <div class="mx-auto mt-6 max-w-6xl flex-1 space-y-6 lg:mt-0 lg:w-full">
          <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6">
    
            <div class="space-y-4">
              <div class="space-y-2">
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500">{{ _("Date")}}</dt>
                  <dd class="text-base font-bold text-gray-900">{{ $order->created_at }}</dd>
                </dl>
    
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500">{{ _("Produits")}}</dt>
                  <dd class="text-base font-bold text-gray-900">
                    <span class="bg-blue-100 text-blue-800 border font-semibold border-blue-700 text-md px-2.5 py-0.5 rounded">
                        {{ $order->items->count() }}
                    </span>
                  </dd>
                </dl>
    
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500">{{ __("Statu") }}</dt>
                  <dd class="text-base font-bold text-gray-900">
                    <span class="bg-{{ $order->status->getBg() }}-100 text-nowrap text-{{ $order->status->getBg() }}-800 text-md font-semibold px-2.5 py-0.5 rounded border border-{{ $order->status->getBg() }}-600">
                      {{ $order->status->getLabel() }}
                  </span>
                    
                    </dd>
                </dl>
              </div>
    
              <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                <dt class="text-base font-bold text-gray-900">{{ __("Total") }}</dt>
                <dd class="text-xl font-black text-gray-900">{{ $order->total_amount }} MAD</dd>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection