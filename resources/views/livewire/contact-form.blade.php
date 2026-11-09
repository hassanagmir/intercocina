<form action="#" class="space-y-4">
    @if (session()->has('message'))
    <div class="bg-green-500 text-white p-2 mt-3 rounded">
        {{ session('message') }}
    </div>
    @endif
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
            <label class="sr-only" for="full_name">Nom et Prénom</label>
            <input wire:model='full_name' class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Nom et Prénom" type="text" id="full_name" full_name="name">
            <!-- Error area -->
            @error('full_name')
                <span class="text-white text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="sr-only" for="email">Adresse e-mail</label>
            <input wire:model='email' class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Adresse e-mail" type="email" id="email" name="email">
            <!-- Error area -->
            @error('email')
                <span class="text-white text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>
    
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
            <label class="sr-only" for="phone">Téléphone</label>
            <input wire:model='phone' class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Numéro de téléphone" type="tel" id="phone" name="phone">
            <!-- Error area -->
            @error('phone')
                <span class="text-white text-sm">{{ $message }}</span>
            @enderror
        </div>
    
        <div>
            <label class="sr-only" for="subject">Sujet</label>
            <input wire:model='subject' class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Sujet" type="text" id="subject" name="subject">
            <!-- Error area -->
            @error('subject')
                <span class="text-white text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>
    
    <div>
        <label class="sr-only" for="message">Message</label>
        <textarea wire:model='message' class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Message" rows="8" id="message" name="message"></textarea>
        <!-- Error area -->
        @error('message')
            <span class="text-white text-sm">{{ $message }}</span>
        @enderror
    </div>
    


    <div class="mt-4">
        <button type="button"
            class="flex items-center justify-center gap-2 text-accent-red bg-white px-6 py-3 rounded-xl font-semibold hover:bg-accent-red hover:bg-transparent border hover:border-white hover:text-white"
            wire:click="store" label="store">

            <svg wire:loading xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path wire:loading.class="animate-rotate" d="M3 12a9 9 0 0 0 9 9a9 9 0 0 0 9 -9a9 9 0 0 0 -9 -9" />
                <path wire:loading.class="animate-rotate-reverse" d="M17 12a5 5 0 1 0 -5 5" />
            </svg>

            Envoyer
        </button>
    </div>
</form>