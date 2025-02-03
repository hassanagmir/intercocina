<x-filament-panels::page>
<section class="antialiased min-h-screen">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Order Items Section -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                    <div class="p-2">
                        <div class="space-y-4">
                            @forelse($this->record->items as $item)
                                <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-150">
                                    <!-- Product Image -->
                                    <a href="{{ route('product.show', $item->product->slug) }}" class="flex-shrink-0">
                                        <img class="h-24 w-24 object-contain rounded-lg" src="{{ url(config('app.storage'), $item->product->images?->first()->image) }}" alt="{{ $item->product->name }}">
                                    </a>
                                    <div class="flex-1 min-w-0">
                                        <a href="{{ route('product.show', $item->product->slug) }}"  class="text-md font-medium text-gray-900 dark:text-white hover:text-primary-600 dark:hover:text-primary-400">
                                            {{ $item->dimension && $item->dimension?->attribute ? $item->dimension?->attribute->name : "" }}
                                            {{ str_replace("Façade", "", $item->product->name) }} 

                                            @if ($item->special_height)
                                                {{ $item->special_height ? "(".($item->special_height . "*" . $item->special_width . "mm") . ")" : ""}} <strong class="text-red-500">{{ __("Spécial") }}</strong>
                                            @else
                                                {{ $item->dimension ? $item->dimension->width : "" }} {{ $item->dimension ? "* " . $item->dimension->height : "" }} 
                                            @endif
                                            
                                        </a>
                                        @if ($item->color)
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                              @if ($item->dimension)
                                                  <span class="text-sm text-gray-500 dark:text-gray-400">
                                                      {{-- ({{ $dimension . " mm" }})  --}}
                                                  </span>
                                              @endif
                                                {{ $item->color->name }}
                                            </p>
                                        @endif
                                        <div>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                             @if ($item->dimension) REF: {{ $item->dimension->code }} @elseif ($item->product->code) REF: {{ $item->product->code }} @else Spéciale @endif
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Price & Quantity -->
                                    <div class="text-right">
                                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                            @if ($item->dimension)
                                                {{ $item->dimension->price * $item->quantity }} MAD
                                            @else
                                                {{ ($item->product->price ? $item->product->price : $item->total) * $item->quantity }} MAD
                                            @endif
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            QTY: <span class="font-bold">{{ $item->quantity }}</span>
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="flex flex-col items-center justify-center py-12">
                                    <img class="w-24 h-24 mb-4 opacity-75" src="/assets/imgs/empty-cart.png" alt="Empty cart">
                                    <p class="text-gray-500 dark:text-gray-400">{{ __("No items in this order") }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary & Customer Details -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Order Summary -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                    <div class="p-6">
                        <!-- Customer Name -->
                        <div class="mb-6">
                            <p class="text-lg font-medium text-gray-900 dark:text-white">
                                @if ($this->record?->user?->name)
                                    {{ ucwords($this->record?->user?->name) }}
                                @else
                                    {{ ucwords($this->record?->user?->full_name) }}
                                @endif
                               
                                @if ($this->record?->user->code)
                                  <span class="text-sm text-gray-500 dark:text-gray-400">({{ $this->record?->user->code }})</span>
                                @endif
                            </p>
                        </div>

                        <!-- Order Details -->
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-500 dark:text-gray-400">{{ __("Prix ​​d'origine") }}</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ $this->record->total_amount }} MAD</span>
                            </div>
                            
                            <div class="flex justify-between">
                                <span class="text-gray-500 dark:text-gray-400">{{ __("Date") }}</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ $this->record->created_at->format('d/m/Y - H:i') }}</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-500 dark:text-gray-400">{{ __("État") }}</span>
                                <x-filament::badge color="{{ $this->record->status->getColor() }}" size="lg">
                                    {{ $this->record->status->getLabel() }}
                                </x-filament::badge>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-500 dark:text-gray-400">{{ __("Mode de paiement") }}</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ $this->record->payment->getLabel() }}</span>
                            </div>

                            <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ __("Total") }}</span>
                                    <span class="text-xl font-bold text-gray-900 dark:text-white">{{ $this->record->total_amount }} MAD</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">{{ __("Adresse de livraison") }}</h2>
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-500 dark:text-gray-400">{{ __("Client") }}</span>
                                <span class="font-medium text-gray-900 dark:text-white">
                                    {{ ucwords($this->record?->address?->first_name) }} {{ ucwords($this->record?->address?->last_name) }}
                                </span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-500 dark:text-gray-400">{{ __("Téléphone") }}</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ $this->record->address?->phone }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-500 dark:text-gray-400">{{ __("Ville") }}</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ $this->record->address?->city->name }}</span>
                            </div>

                            <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-700">
                                <p class="text-gray-700 dark:text-gray-300">{{ $this->record->address?->address_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</x-filament-panels::page>