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
});



// swiper Product
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
        loop: true,
        thumbs: {
            swiper: swiper_thumbs,
        },
    });
}

function initSwiperPlacard() {
    var swiper_thumbs = new Swiper(".main-placard", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4, // Adjust the number of visible thumbs
        freeMode: true,
        watchSlidesProgress: true,
        watchSlidesVisibility: true,
        slideToClickedSlide: true,
        direction: 'horizontal', // Ensures sliding to the right

    });
    var swiper = new Swiper(".main-placard-carousel", {
        slidesPerView: 1,
        loop: true,
        thumbs: {
            swiper: swiper_thumbs,
        },
    });
}


initSwiperPlacard()

initSwiper()






Livewire.hook('morph.updated', ({ el, component }) => {
    initSwiper();
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


document.addEventListener('DOMContentLoaded', function () {
    var Swipes = new Swiper('.swiper-placard', {
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
    loop: true,
    simulateTouch: false,
    centeredSlides: true,
    autoplay: {
        delay: 6500,
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




const adsSwiper = new Swiper('.swiper-ads', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});


// Lazy loding
function initObserver() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const wrapper = entry.target;
                const img = wrapper.querySelector('.lazy-image');
                const errorMsg = wrapper.querySelector('.error-message');

                if (img && !img.src && img.dataset.src) {
                    img.src = img.dataset.src;
                    
                    img.onload = () => {
                        wrapper.classList.remove('loading');
                        img.classList.add('loaded');
                    };

                    img.onerror = () => {
                        wrapper.classList.remove('loading');
                        errorMsg.style.display = 'block';
                    };

                    observer.unobserve(wrapper);
                }
            }
        });
    }, {
        // Modify these options to better handle initial viewport content
        root: null,
        rootMargin: '50px 0px 50px 0px', // Increased margins
        threshold: 0    // Reduced threshold to trigger earlier
    });

    return observer;
}

function lazyLoading() {
    const observer = initObserver();
    
    // Get all unloaded wrappers
    const wrappers = document.querySelectorAll('.image-wrapper:not(.loaded)');
    
    wrappers.forEach(wrapper => {
        // Force load images that are already in viewport on page load
        const rect = wrapper.getBoundingClientRect();
        const isInViewport = (
            rect.top >= -50 && // Added buffer
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight + 50) && // Added buffer
            rect.right <= window.innerWidth
        );

        const img = wrapper.querySelector('.lazy-image');
        
        if (isInViewport && img && !img.src && img.dataset.src) {
            // Immediately load images in viewport
            img.src = img.dataset.src;
            
            img.onload = () => {
                wrapper.classList.remove('loading');
                img.classList.add('loaded');
            };
            
            img.onerror = () => {
                wrapper.classList.remove('loading');
                wrapper.querySelector('.error-message').style.display = 'block';
            };
        } else {
            // Use Intersection Observer for images outside viewport
            observer.observe(wrapper);
        }
    });
}

// Initial load
document.addEventListener('livewire:init', () => {
    // Small delay to ensure DOM is fully ready
    setTimeout(() => {
        lazyLoading();
    }, 100);
});

// Handle Livewire updates
Livewire.hook('morph.updated', ({ el, component }) => {
    setTimeout(() => {
        lazyLoading();
    }, 100);
});

Livewire.start();