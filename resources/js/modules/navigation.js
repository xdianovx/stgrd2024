import gsap from "gsap";

export const navigation = (lenis, barba) => {
    const burger = document.querySelector(".burger");
    const navigation = document.querySelector(".navigation");
    const closeNavigationBtn = document.querySelector(".navigation__close");
    const link = document.querySelectorAll('.navigation__link')

    const tl = gsap.timeline({
        paused: true,
        defaults: {
            ease: "power2.inOut",
            duration: .3
        },
    });

    barba.hooks.beforeLeave(() => {
        tl.reverse();
        lenis.start();
    });

    tl.to(navigation, {
        top: 0,
    }).from('.navigation__link', {
        x: -100,
        opacity: 0,
        stagger: .1
    }, ).from('.navigation__right_links a', {
        y: -20,
        opacity: 0,
        stagger: .1
    }).from('.navigation__cities', {
        opacity: 0
    }, '-=.6').from('.navigation__bottom', {
        opacity: 0,
        yPercent: 100
    }, "-=.9").from('.navigation__logo', {
        opacity: 0
    }, '-=.9');

    burger.addEventListener("click", function () {
        lenis.scrollTo(0)
        lenis.stop();
        tl.play();
    });

    closeNavigationBtn.addEventListener("click", function () {
        lenis.start();
        tl.reverse();
    });
};
