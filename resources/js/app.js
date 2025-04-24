// Import default bootstrap Laravel
import './bootstrap';

// Import Alpine.js
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Import SwiperJS
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

//aos
import AOS from 'aos';
import 'aos/dist/aos.css';

// Inisialisasi SwiperJS setelah DOM 
document.addEventListener('DOMContentLoaded', () => {
    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
});


//installasi aos
AOS.init({
    once: true,
    duration: 800
});