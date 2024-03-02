import gsap from "gsap";

export const navigation = (lenis, barba) => {
    const burger = document.querySelector(".burger");
    const navigation = document.querySelector(".navigation");
    const closeNavigationBtn = document.querySelector(".navigation__close");

    const tl = gsap.timeline({
        paused: true,
        defaults: {
            ease: "power2.inOut",
        },
    });

    barba.hooks.beforeLeave(() => {
        tl.reverse();
        lenis.start();
    });

    tl.to(navigation, {
        top: 0,
    });

    burger.addEventListener("click", function () {
        lenis.stop();
        tl.play();
    });

    closeNavigationBtn.addEventListener("click", function () {
        lenis.start();
        tl.reverse();
    });
};
