<div x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
    <!-- Trigger for Modal -->
    <button class="p-2 rounded bg-blue-400 m-3" type="button" @click="showModal = true">Open Modal</button>
    
    <!-- Modal -->
    <div
        class="fixed inset-0 z-30 flex items-center justify-center overflow-auto backdrop-blur-sm"
        x-show="showModal"
    >
        <!-- Modal inner -->
        <div 
            class="max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg animate__animated animate__zoomIn"
            @click.away="showModal = false"
        >
            <!-- Title / Close-->
            <div {{ $attributes->class(['flex items-center justify-between'])->merge([]) }}>
                <h5 class="mr-3 text-black max-w-none">Title</h5>
                <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- content -->
            <div>{{ $slot }}</div>
        </div>
    </div>
</div>