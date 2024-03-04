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

  const newsSlider = new Swiper('.news-slider-slider', {
    speed: 400,
    breakpoints: {
      '320': {
        slidesPerView: 1,
        spaceBetween: 20

      },
      '768': {
        slidesPerView: 2,
        spaceBetween: 20

      },
      '1200': {
        slidesPerView: "auto",
        spaceBetween: 0

      },
    }
  })

  const projectPageComfortSlider = new Swiper('.project-page-comfort-slider', {
    speed: 400,
    breakpoints: {
      '320': {
        slidesPerView: 1,
        spaceBetween: 20
      },
      '768': {
        slidesPerView: 2,
        spaceBetween: 20

      },
      '1200': {
        slidesPerView: "auto",
        spaceBetween: 0

      },
    }
  })

  const projectPageProcessSlider = new Swiper('.project-page-process-swiper', {
    speed: 400,
    breakpoints: {
      '320': {
        slidesPerView: 1,
        spaceBetween: 20
      },
      '768': {
        slidesPerView: 2,
        spaceBetween: 20

      },
      '1200': {
        slidesPerView: "auto",
        spaceBetween: 0

      },
    }

  })
};
