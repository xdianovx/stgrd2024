import Swiper from "swiper";
export const sliders = () => {
    const offersSlider = new Swiper(".swiper-offers-slider", {
        slidesPerView: "auto",
        speed: 400,
    });

    const directorsSlider = new Swiper(".directors-slider", {
        slidesPerView: "auto",
        speed: 400,
    });
};
