<button {{ $attributes->merge(['class' => 'flex items-center justify-center gap-2 text-accent-red bg-white px-6 py-3 rounded-xl font-semibold hover:bg-accent-red hover:bg-transparent border hover:border-white hover:text-white']) }}>

    <svg wire:loading @if($attributes->get('wire:target')) wire:target="{{ $attributes->get('wire:target') }}" @endif
         xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path wire:loading.class="animate-rotate" d="M3 12a9 9 0 0 0 9 9a9 9 0 0 0 9 -9a9 9 0 0 0 -9 -9"/>
        <path wire:loading.class="animate-rotate-reverse" d="M17 12a5 5 0 1 0 -5 5"/>
    </svg>

    @if($showConfirmation)
        <svg wire:loading.class="hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/>
            <path d="M9 12l2 2l4 -4"/>
        </svg>
    @endif

    {{ $label ?? __("Submit") }}
</button>
