const rewards_section = document.querySelector('.rewards-section');
import Swiper from 'swiper';
import {Navigation, Pagination} from 'swiper/modules';

if (rewards_section) {
    let RewardsSwiper = rewards_section.querySelectorAll('.rewards-section__swiper_wrapper'),
        control = rewards_section.querySelector('.rewards-section_controls'),
        slides = rewards_section.querySelectorAll('.rewards-section__swiper_slide'),
        CountOfItem;
    RewardsSwiper.forEach(function (RewardsSwiperItem) {
        CountOfItem = RewardsSwiperItem.childElementCount;
    });

    if (CountOfItem >= 5) {
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.rewards-section__swiper', {
                modules: [Navigation, Pagination],
                // autoHeight: true,
                navigation: {
                    clickable: true,
                    nextEl: ".swiper-button-next-rewards",
                    prevEl: ".swiper-button-prev-rewards",
                },
                // initialSlide: 1,
                breakpoints: {
                    0: {
                        spaceBetween: 16,
                        slidesPerView: 4,
                        slidesPerGroup: 4,
                    },
                    1025: {
                        spaceBetween: 93,
                        slidesPerView: 5,
                        slidesPerGroup: 5,
                    },
                }
            });
        })
    } else {
        control.style.display = "none";
        slides.forEach(function (slide) {
            slide.style.flexShrink = "1";
        })
    }
}
