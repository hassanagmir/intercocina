<div>
    <form wire:submit.prevent="submit" class="space-y-4">
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 p-3 font-semibold rounded relative" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <div class="sm:flex gap-2 flex-initial">
            <div class="w-full">
                <label for="fullName" class="block text-md font-semibold text-white ">Nom complet</label>
                <input wire:model="fullName" type="text" id="fullName" class="mt-1 block p-3 font-semibold w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('fullName') <span class="text-white mt-2">{{ $message }}</span> @enderror
            </div>
    
            <div class="w-full">
                <label for="subject" class="block text-md font-semibold text-white ">Sujet, Numero de command</label>
                <input wire:model="subject" type="text" id="subject" class="mt-1 block p-3 font-semibold w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('subject') <span class="text-white mt-2">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label for="phone" class="block text-md font-semibold text-white ">Téléphone</label>
            <input wire:model="phone" type="tel" id="phone" class="mt-1 block p-3 font-semibold w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('phone') <span class="text-white mt-2">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="clientNumber" class="block text-md font-semibold text-white ">Numéro de client <small>(Optionnelle)</small></label>
            <input wire:model="clientNumber" type="text" id="clientNumber" class="mt-1 p-3 font-semibold block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div>
            <label for="message" class="block text-md font-semibold text-white ">Message</label>
            <textarea wire:model="message" id="message" rows="4" class="mt-1 block p-3 font-semibold w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            @error('message') <span class="text-white mt-2">{{ $message }}</span> @enderror
        </div>
        <div>
            <button type="submit" class="flex uppercase items-center justify-center gap-2 text-accent-red bg-white px-6 py-3 rounded-xl font-semibold hover:bg-accent-red hover:bg-transparent border hover:border-white hover:text-white">

                <svg wire:loading="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path wire:loading.class="animate-rotate" d="M3 12a9 9 0 0 0 9 9a9 9 0 0 0 9 -9a9 9 0 0 0 -9 -9"></path>
                    <path wire:loading.class="animate-rotate-reverse" d="M17 12a5 5 0 1 0 -5 5"></path>
                </svg>
    
                Soumettre la réclamation
            </button>
        </div>
    </form>
</div>