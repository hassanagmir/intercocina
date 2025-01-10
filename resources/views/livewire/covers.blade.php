<div class="swiper header-swiper">
    <div class="swiper-wrapper">
        @forelse ($covers as $cover)
        <div class="swiper-slide">
            @if ($cover->url)
                <a href="{{ $cover->url }}">
                    <img src="{{ url(config('app.storage'), $cover->image) }}" class="rounded-3xl border-2" width="550" height="300" alt="{{ $cover->title}}">
                </a>
            @else
                <img src="{{ url(config('app.storage'), $cover->image) }}" class="rounded-3xl border-2" width="550" height="300" alt="{{ $cover->title}}"> 
            @endif
        </div>
        @empty
        <div class="swiper-slide">
            <img src="https://placehold.co/550x300" class="rounded-3xl" width="550" height="300" alt="">
        </div>
        @endforelse
    </div>
    {{-- <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> --}}
    {{-- <div class="swiper-pagination"></div> --}}
</div>