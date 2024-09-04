import "./bootstrap";
import { cuteToast } from 'cute-alert'

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
function initSwiper() {
    var swiper_thumbs = new Swiper(".nav-for-slider", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4, // Adjust the number of visible thumbs
        freeMode: true,
        watchSlidesProgress: true,
        watchSlidesVisibility: true,
        slideToClickedSlide: true,
        direction: 'horizontal', // Ensures sliding to the right

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


// Alerts
document.addEventListener('livewire:init', () => {
    Livewire.on('add-to-cart', (event) => {
        cuteToast({
            "type": "success",
            "title": "Succès",
            "description": "Produit ajouté au panier",
            "timer": 4000,
            "vibrationPattern": [],
            "soundSrc": "",
            "imageSrc": "",
            "imageSize": 32
          })

    });
});




Livewire.start();
