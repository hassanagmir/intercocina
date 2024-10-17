<x-filament-panels::page>
<section class="antialiased">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="md:gap-6 lg:flex lg:items-start xl:gap-8">
            <div class="mx-auto w-full flex-none lg:max-w-1xl xl:max-w-3xl">
              <div class="space-y-6">
                @forelse($this->record->items as $item)
                    <x-filament::section>
                      <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                        <!-- Product image -->
                        <a href="{{ route('product.show', $item->product->slug) }}" class="shrink-0 md:order-1">
                            <img class="h-20 w-20" src="{{ Storage::url($item->product->images?->first()->image) }}" alt="{{ $item->product->name }}">
                        </a>
                        <!-- Quantity control -->
                        <div class="flex items-center justify-between md:order-3 md:justify-end">
                            <div class="text-end md:order-4 md:w-32">
                                @if ($item->dimension)
                                <p class="text-base font-bold text-gray-900 dark:text-white text-nowrap">{{ $item->quantity }} &#xa0; - &#xa0; {{ $item->dimension->price * $item->quantity }} MAD</p>
                                @else
                                <p class="text-base font-bold text-gray-900 dark:text-white text-nowrap">{{ $item->quantity }} &#xa0; - &#xa0; {{ $item->dimension->price * $item->quantity }} MAD</p>
                                @endif                                    
                            </div>
                        </div>
                        <!-- Product details -->
                        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                            <a href="{{ route('product.show', $item->product->slug) }}"
                                class="text-base font-bold text-gray-900 dark:text-white hover:underline">
                                {{ $item->product->name }}
                                @if ($item->dimension)
                                    <span>{{ $item->dimension->height . " x " . $item->dimension->width . " mm" }}</span>
                                @endif
                                <br>
                                @if ($item->color)
                                  <span class="text-sm">({{ $item?->color->name }})</span>
                                @endif
                            </a>
                            <div class="flex items-center gap-4">
                               
                            </div>
                        </div>
                    </div>
                    </x-filament::section>
                @empty
                    <!-- Cart empty -->
                    <div class="flex justify-center py-4">
                        <img class="w-20" src="/assets/imgs/empty-cart.png" width="80px" height="auto" alt="Cart empty" title="Cart empty" loading="lazy">
                    </div>
                @endforelse
            </div>
            </div>
          
            <div class="mx-auto mt-6 max-w-5xl flex-1 space-y-6 lg:mt-0 lg:w-full">
              <x-filament::section>
                <p class="text-xl font-semibold text-gray-900 dark:text-white">{{ $this->record?->user?->full_name }}</p>
          
                <div class="space-y-4">
                  <div class="space-y-6">
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-base font-normal text-gray-500">{{ __("Prix d'origine")}}</dt>
                      <dd class="text-base font-bold text-gray-900 dark:text-white">{{ $this->record->total_amount  }} MAD</dd>
                    </dl>
          
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-base font-normal text-gray-500">{{ __("Date")}}</dt>
                      <dd class="text-base font-bold text-gray-900 dark:text-white">{{ $this->record->created_at->format('M d Y - H:i')}}</dd>
                    </dl>
          
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-base font-normal text-gray-500">{{ __("Etat") }}</dt>
                      <dd class="text-base font-bold text-gray-900 dark:text-white">
                            <x-filament::badge color="{{ $this->record->status->getColor() }}" size="xl">
                                {{ $this->record->status->getLabel()}}
                            </x-filament::badge>
                        </dd>
                    </dl>
                  </div>
          
                  <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2">
                    <dt class="text-base font-bold text-gray-900 dark:text-white">{{ __("Total") }}</dt>
                    <dd class="text-xl font-black text-gray-900 dark:text-white">{{ $this->record->total_amount }} MAD</dd>
                  </dl>
                </div>
              </x-filament::section>
              <x-filament::section>
                <p class="text-xl font-semibold text-gray-900 dark:text-white">{{ __("Adresse") }}</p>
        
                <div class="space-y-4 mt-3">
                  <div class="space-y-6">
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-base font-normal text-gray-500">{{ __("Client")}}</dt>
                        <dd class="text-base font-bold text-gray-900 dark:text-white">{{ $this->record?->address?->first_name }} {{ $this->record?->address?->last_name }}</dd>
                      </dl>

                      <dl class="flex items-center justify-between gap-4">
                        <dt class="text-base font-normal text-gray-500">{{ __("Téléphone")}}</dt>
                        <dd class="text-base font-bold text-gray-900 dark:text-white">{{ $this->record->address?->phone }}</dd>
                      </dl>
            
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-base font-normal text-gray-500">{{ __("Ville")}}</dt>
                      <dd class="text-base font-bold text-gray-900 dark:text-white">{{ $this->record->address?->city->name }}</dd>
                    </dl>
          
                  
                    <dl class="flex items-center justify-between gap-4">
                      {{ $this->record->address?->address_name }}
                    </dl>
                  </div>
                </div>
              </x-filament::section>

            </div>
          </div>
    </div>
    </section>
</x-filament-panels::page>