const reviews_section = document.querySelector('.reviews-section');
import Swiper from 'swiper';
import {Navigation, Pagination} from 'swiper/modules';

if (reviews_section) {
    let reviewsSwiper = reviews_section.querySelectorAll('.reviews-section__swiper_wrapper'),
        reviewsControl = reviews_section.querySelector('.reviews-section__control-elements_controls'),
        reviewsSlides = reviews_section.querySelectorAll('.reviews-section__swiper_slide');

    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.reviews-section__swiper', {
            modules: [Navigation, Pagination],
            navigation: {
                clickable: true,
                nextEl: ".swiper-button-next-reviews",
                prevEl: ".swiper-button-prev-reviews",
            },
        });
    })
}

