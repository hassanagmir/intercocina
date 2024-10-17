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
                <div wire:key='{{ $item->product->id }}' class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm md:p-6">
                    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                        <a href="{{ route('product.show', $item->product->slug) }}" class="shrink-0 md:order-1">
                            <img class="h-20 w-20" src="{{ Storage::url($item->product?->images->first()?->image) }}" alt="{{ $item->product->name }}">
                        </a>
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
                                [ x {{ $item->quantity }}]
                            </a>
                            <div class="flex items-center gap-4">

                                <div class="inline-flex items-center text-sm font-medium text-gray-600">
                                    <div role="status">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.778 8.395H21.25m-18.5 7.21h17.472M6.282 21.13L9.495 2.87m5.01 18.26l3.212-18.26"/></svg>

                                    </div>
                                    {{ $order->code }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="flex justify-center py-4">
                    <img class="w-20" src="/assets/imgs/empty-cart.png" width="80px" height="auto" alt="Cart empty" width="80px" height="auto">
                </div>
                @endforelse
                <!-- Card -->
            </div>
        </div>
    
        <div class="mx-auto mt-6 max-w-6xl flex-1 space-y-6 lg:mt-0 lg:w-full">
          <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6">
    
            <div class="space-y-4">
              <div class="space-y-5">
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500">{{ __("Date")}}</dt>
                  <dd class="text-base font-bold text-gray-900 flex gap-3">
                    <div>{{ $order->created_at->format("M d, Y") }} </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M3 5.231L6.15 3M21 5.231L17.85 3"/><circle cx="12" cy="13" r="8"/><path d="M12 8.5v5l3 2"/></g></svg>
                  </dd>
                </dl>
    
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500">{{ __("Produits")}}</dt>
                  <dd class="text-base font-bold text-gray-900 flex gap-3">
                    <div class="text-xl">{{ $order->items->count() }}</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m12 21l8.131-4.208c.316-.164.474-.245.589-.366a1 1 0 0 0 .226-.373c.054-.159.054-.336.054-.692V7.533M12 21l-8.131-4.208c-.316-.164-.474-.245-.589-.366a1 1 0 0 1-.226-.373C3 15.894 3 15.716 3 15.359V7.533M12 21v-9.063m9-4.404l-9 4.404m9-4.404l-8.27-4.28c-.267-.138-.4-.208-.541-.235a1 1 0 0 0-.378 0c-.14.027-.274.097-.542.235L3 7.533m0 0l9 4.404"/></svg>
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
    
              <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2">
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