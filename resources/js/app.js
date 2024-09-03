import "./bootstrap";

import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import Animate from "alpinejs-animate";
import focus from "@alpinejs/focus";
import Swiper from 'swiper/bundle';

Alpine.plugin(focus);
Alpine.plugin(Animate);

// swiper
function initSwiper(){
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
}
initSwiper()

Livewire.hook('morph.updated', ({ el, component }) => {
    initSwiper()
})

Livewire.start();
