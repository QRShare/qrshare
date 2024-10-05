import Swiper from "swiper";

import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/autoplay";

var swiper = new Swiper(".pagesSlidderSwiper", {
    effect: "coverflow",
    fadeEffect: {
        crossFade: true,
    },
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 5000,
    },
});

swiper.init;
