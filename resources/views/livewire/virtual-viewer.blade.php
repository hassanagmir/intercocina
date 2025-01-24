<div>
    <div class="relative">
        <span class="absolute top-1/2 right-1/2 bg-black p-2 rounded-lg opacity-90" wire:loading><img src="https://letsdesign.esignserver2.com/images/ajax-loader.gif" alt=""></span>
        <img src="{{ url(config('app.storage'), $image) }}" alt="">
    </div>
    <div class="flex flex-col space-y-16 overflow-hidden">
        <div class="overflow-x-scroll no-scrollbar">
            <div class="splide">
                <div class="splide__track mb-10">
                    <div class="splide__list flex gap-6 mt-4">
                        @foreach ($colors as $color)
                            <div wire:click="changeColor('{{ $color->id }}')" class="p-3 py-3 bg-white rounded-lg text-center shadow-sm transform duration-500 hover:-translate-y-2 cursor-pointer w-40 snap-center splide__slide shrink-0">
                                <img src="{{ url(config('app.storage'), $color->image) }}" alt="{{ $color->name }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>