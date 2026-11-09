<div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Average Rating Section -->
        @livewire('rating', ['product' => $product], key($product->id))
        <div>
            <h2 class="text-2xl font-bold mb-4">Soumettez votre avis</h2>
            <div>
                @if (session()->has('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            
                <form wire:submit.prevent="submitForm">
                    <div x-data="{ currentVal: @entangle('stars') }" class="flex items-center gap-1 mb-5">
                        @for ($i = 1; $i <= 5; $i++)
                            <label for="star{{ $i }}" class="cursor-pointer transition hover:scale-125 has-[:focus]:scale-125">
                                <span class="sr-only">{{ $i }} star{{ $i > 1 ? 's' : '' }}</span>
                                <input wire:model="stars" x-model="currentVal" id="star{{ $i }}" type="radio" class="sr-only" name="stars" value="{{ $i }}">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5" :class="currentVal >= {{ $i }} ? 'text-amber-500' : 'text-neutral-600'">
                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"></path>
                                </svg>
                            </label>
                        @endfor
                    </div>
            
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet *</label>
                            <input wire:model="full_name" type="text" id="full_name" name="full_name" placeholder="Hassane ag..." class="w-full px-3 py-2 border border-gray-300 bg-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">
                            @error('full_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail *</label>
                            <input wire:model="email" type="email" id="email" name="email" placeholder="mail@example.com" class="w-full px-3 py-2 border border-gray-300 bg-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">
                            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Donnez votre avis *</label>
                        <textarea wire:model="comment" id="comment" name="comment" rows="4" placeholder="Écrivez ici..." class="w-full px-3 py-2 border border-gray-300 bg-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500"></textarea>
                        @error('comment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="w-full bg-green-600 text-white font-normal py-2 px-4 rounded hover:bg-green-700 transition duration-300">Soumettre des avis</button>
                </form>
            </div>
        </div>
    </div>
</div>
