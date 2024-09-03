@extends('layouts.base')


@section('content')
<style>
    .nav-for-slider .swiper-slide {
        height: auto;
        width: auto;
        cursor: pointer;
       
    }
    .swiper-wrapper{
        height: auto;
    }
    .nav-for-slider .swiper-slide img{
        border:2px solid transparent;
        border-radius: 10px;
       
    }
    .nav-for-slider .swiper-slide-thumb-active img{
       
        border-color: rgb(239 68 68 / 500);
    }
</style> 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



<section class="py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @livewire('product', ['product' => $product], key($product->id))
    </div>
</section>
<script>
var swiper_thumbs = new Swiper(".nav-for-slider", {
  loop: true,
  spaceBetween: 30,
  slidesPerView: 5,
});
var swiper = new Swiper(".main-slide-carousel", {
  slidesPerView: 1,
  thumbs: {
    swiper: swiper_thumbs,
  },
});
</script>
                                        
@endsection