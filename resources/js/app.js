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


// Faqs
document.addEventListener("alpine:init", () => {
    Alpine.store("accordion", {
        tab: 0
    });

    Alpine.data("accordion", (idx) => ({
        init() {
            this.idx = idx;
        },
        idx: -1,
        handleClick() {
            this.$store.accordion.tab =
                this.$store.accordion.tab === this.idx ? 0 : this.idx;
        },
        handleRotate() {
            return this.$store.accordion.tab === this.idx ? "-rotate-180" : "";
        },
        handleToggle() {
            return this.$store.accordion.tab === this.idx
                ? `max-height: ${this.$refs.tab.scrollHeight}px`
                : "";
        }
    }));

    // Ads Modal
    Alpine.data('modal', () => ({
        showModal: false,
        init() {
            this.checkAndShowModal();
        },
        checkAndShowModal() {
            const adsModal = localStorage.getItem('adsModal');
            if (!adsModal) {
                this.showModal = true;
            }
        },
        closeModal() {
            this.showModal = false;
            localStorage.setItem('adsModal', 'true');
        }
    }));
});



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


document.addEventListener('DOMContentLoaded', function () {
    var Swipes = new Swiper('.swiper-container', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-review-next',
            prevEl: '.swiper-review-prev',
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });
});


// Reload page
Livewire.on('reloadPage', () => {
    location.reload();
});



// Events Swiper

const swiper = new Swiper('.swiper-evnet', {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 30
        }
    }
});


var swiperHead = new Swiper(".header-swiper", {
    spaceBetween: 30,
    loop:true,
    centeredSlides: true,
    autoplay: {
      delay: 4500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });



import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';

const lightbox = new PhotoSwipeLightbox({
    gallery: '#gallery',
    children: 'a',
    showHideAnimationType: 'fade',
    pswpModule: () => import('photoswipe')
});
lightbox.init();





