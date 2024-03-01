import gsap from "gsap";

export const navigation = (lenis) => {
    const burger = document.querySelector(".burger");
    const navigation = document.querySelector(".navigation");

    const tl = gsap.timeline({
        paused: true,
        defaults: {
            ease: "power2.inOut",
        },
    });

    tl.to(navigation, {
        top: 0,
    });

    burger.addEventListener("click", function () {
        lenis.stop();
        tl.play();
    });

    navigation.addEventListener("click", function () {
        lenis.start();
        tl.reverse();
    });
};
