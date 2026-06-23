<x-filament-panels::page>
<section class="antialiased min-h-screen">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Order Items -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ __('Articles commandés') }}
                        </h2>
                        <span class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $this->record->items->count() }} {{ __('article(s)') }}
                        </span>
                    </div>

                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse ($this->record->items as $item)
                            @php
                                $product   = $item->product;
                                $dimension = $item->dimension;

                                $imagePath = $product?->images?->first()?->image;
                                $imageUrl  = $imagePath
                                    ? asset(config('app.storage') . '/storage/' . $imagePath)
                                    : asset('assets/imgs/empty-cart.png');

                                $productUrl = 'https://intercocina.com/product/' . $product->slug;

                                $itemName = trim(
                                    ($dimension?->attribute?->name ?? '') . ' ' .
                                    str_replace('Façade', '', $product?->name ?? __('Produit indisponible'))
                                );

                                $reference = $dimension?->code ?? $product?->code ?? __('Spéciale');
                                $lineTotal = $item->total ?? (($dimension?->price ?? $product?->price ?? 0) * $item->quantity);
                            @endphp

                            <div class="flex items-start gap-4 p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition duration-150">
                                <!-- Image -->
                                <a href="{{ $productUrl }}" target="_blank" class="flex-shrink-0">
                                    <img class="h-20 w-20 object-contain rounded-lg border border-gray-100 dark:border-gray-700 bg-white"
                                         src="{{ $imageUrl }}"
                                         alt="{{ $product?->name ?? __('Produit') }}">
                                </a>

                                <!-- Details -->
                                <div class="flex-1 min-w-0">
                                    <a href="{{ $productUrl }}" target="_blank"
                                       class="font-medium text-gray-900 dark:text-white hover:text-primary-600 dark:hover:text-primary-400 leading-snug">
                                        {{ $itemName }}
                                        @if ($item->special_height)
                                            <span class="text-xs text-gray-500">({{ $item->special_height }}*{{ $item->special_width }}mm)</span>
                                            <span class="ml-1 text-xs font-semibold text-red-500">{{ __('Spécial') }}</span>
                                        @elseif ($dimension)
                                            <span class="text-xs text-gray-500">({{ $dimension->height }}*{{ $dimension->width }}mm)</span>
                                        @endif
                                    </a>

                                    @if ($item->color)
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                            🎨 {{ $item->color->name }}
                                        </p>
                                    @endif

                                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-500">
                                        REF: {{ $reference }}
                                    </p>

                                    <!-- Per-item discount badge -->
                                    @if (!empty($item->discount_percent) && $item->discount_percent > 0)
                                        <span class="inline-flex items-center mt-2 px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300">
                                            -{{ number_format($item->discount_percent, 0) }}% remise appliquée
                                        </span>
                                    @endif
                                </div>

                                <!-- Price block -->
                                <div class="text-right flex-shrink-0">
                                    @if (!empty($item->discount_percent) && $item->discount_percent > 0)
                                        <p class="text-xs text-gray-400 line-through">
                                            {{ number_format($item->unit_price * $item->quantity, 2, ',', ' ') }} MAD
                                        </p>
                                    @endif
                                    <p class="text-base font-bold text-gray-900 dark:text-white">
                                        {{ number_format($lineTotal, 2, ',', ' ') }} MAD
                                    </p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">
                                        {{ $item->quantity }} × {{ number_format($item->discounted_price ?? $item->unit_price, 2, ',', ' ') }} MAD
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="flex flex-col items-center justify-center py-16 text-center">
                                <img class="w-20 h-20 mb-4 opacity-50" src="/assets/imgs/empty-cart.png" alt="{{ __('Empty') }}">
                                <p class="text-gray-400 dark:text-gray-500">{{ __('Aucun article dans cette commande') }}</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="lg:col-span-1 space-y-6">

                <!-- Customer Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-base font-semibold text-gray-900 dark:text-white">{{ __('Client') }}</h2>
                    </div>
                    <div class="p-6 space-y-2">
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ ucwords($this->record?->user?->name ?? $this->record?->user?->full_name ?? '') }}
                        </p>
                        @if ($this->record?->user?->code)
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Code') }}: <strong>{{ $this->record->user->code }}</strong></p>
                        @endif
                        @if ($this->record?->user?->email)
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $this->record->user->email }}</p>
                        @endif
                    </div>
                </div>

                <!-- Order Summary Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-base font-semibold text-gray-900 dark:text-white">{{ __('Récapitulatif') }}</h2>
                    </div>
                    <div class="p-6 space-y-3 text-sm">

                        <!-- Date -->
                        <div class="flex justify-between text-gray-500 dark:text-gray-400">
                            <span>{{ __('Date') }}</span>
                            <span class="font-medium text-gray-900 dark:text-white">
                                {{ $this->record->created_at->format('d/m/Y - H:i') }}
                            </span>
                        </div>

                        <!-- Status -->
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 dark:text-gray-400">{{ __('État') }}</span>
                            <x-filament::badge color="{{ $this->record->status?->getColor() }}" size="lg">
                                {{ $this->record->status?->getLabel() }}
                            </x-filament::badge>
                        </div>

                        <!-- Payment -->
                        <div class="flex justify-between text-gray-500 dark:text-gray-400">
                            <span>{{ __('Paiement') }}</span>
                            <span class="font-medium text-gray-900 dark:text-white">
                                {{ $this->record->payment?->getLabel() }}
                            </span>
                        </div>

                        <!-- Shipping -->
                        <div class="flex justify-between text-gray-500 dark:text-gray-400">
                            <span>{{ __('Expédition') }}</span>
                            <span class="font-medium text-gray-900 dark:text-white">
                                {{ $this->record?->shipping?->name }}
                            </span>
                        </div>

                        <div class="border-t border-gray-100 dark:border-gray-700 pt-3 mt-1 space-y-3">

                            <!-- Raw total -->
                            @if ($this->record->raw_total)
                                <div class="flex justify-between text-gray-500 dark:text-gray-400">
                                    <span>{{ __('Sous-total') }}</span>
                                    <span class="font-medium text-gray-900 dark:text-white">
                                        {{ number_format($this->record->raw_total, 2, ',', ' ') }} MAD
                                    </span>
                                </div>
                            @endif

                            <!-- Discount -->
                            @if ($this->record->discount_amount > 0)
                                <div class="flex justify-between text-green-600 dark:text-green-400">
                                    <span>{{ __('Remise') }}</span>
                                    <span class="font-semibold">
                                        -{{ number_format($this->record->discount_amount, 2, ',', ' ') }} MAD
                                    </span>
                                </div>
                            @endif

                            <!-- Total HT -->
                            @if ($this->record->total_ht)
                                <div class="flex justify-between text-gray-500 dark:text-gray-400">
                                    <span>{{ __('Total HT') }}</span>
                                    <span class="font-medium text-gray-900 dark:text-white">
                                        {{ number_format($this->record->total_ht, 2, ',', ' ') }} MAD
                                    </span>
                                </div>
                            @endif

                            <!-- TVA -->
                            @if ($this->record->tva_amount > 0)
                                <div class="flex justify-between text-gray-500 dark:text-gray-400">
                                    <span>{{ __('TVA') }} ({{ number_format(($this->record->tva_rate ?? 0.02) * 100, 0) }}%)</span>
                                    <span class="font-medium text-gray-900 dark:text-white">
                                        {{ number_format($this->record->tva_amount, 2, ',', ' ') }} MAD
                                    </span>
                                </div>
                            @endif

                        </div>

                        <!-- Total TTC -->
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-4 mt-2">
                            <div class="flex justify-between items-center">
                                <span class="text-base font-bold text-gray-900 dark:text-white">{{ __('Total TTC') }}</span>
                                <span class="text-xl font-bold text-primary-600 dark:text-primary-400">
                                    {{ number_format($this->record->total_amount, 2, ',', ' ') }} MAD
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-base font-semibold text-gray-900 dark:text-white">{{ __('Adresse de livraison') }}</h2>
                    </div>
                    <div class="p-6 space-y-3 text-sm">
                        <div class="flex justify-between text-gray-500 dark:text-gray-400">
                            <span>{{ __('Client') }}</span>
                            <span class="font-medium text-gray-900 dark:text-white">
                                {{ ucwords($this->record?->address?->first_name ?? '') }}
                                {{ ucwords($this->record?->address?->last_name ?? '') }}
                            </span>
                        </div>

                        <div class="flex justify-between text-gray-500 dark:text-gray-400">
                            <span>{{ __('Téléphone') }}</span>
                            <span class="font-medium text-gray-900 dark:text-white">
                                {{ $this->record->address?->phone }}
                            </span>
                        </div>

                        <div class="flex justify-between text-gray-500 dark:text-gray-400">
                            <span>{{ __('Ville') }}</span>
                            <span class="font-medium text-gray-900 dark:text-white">
                                {{ $this->record->address?->city?->name }}
                            </span>
                        </div>

                        <div class="pt-3 mt-1 border-t border-gray-100 dark:border-gray-700">
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                {{ $this->record->address?->address_name }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
</x-filament-panels::page>