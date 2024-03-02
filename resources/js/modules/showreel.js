export const showreel = (gsap, lenis) => {
    const short = document.querySelector(".showreel-short");

    if (!short) return;
    const modal = document.querySelector(".showreelmodal");
    let tl = gsap.timeline({
        paused: true,
        defaults: {
            ease: "power2",
            duration: 0.3,
        },
    });

    gsap.set(modal, {
        opacity: 0,
        left: "-100vw",
    });

    tl.to(modal, {
        left: 0,
    }).to(modal, {
        opacity: 1,
    });

    short.addEventListener("click", function () {
        lenis.stop();
        tl.play();
    });

    modal.addEventListener("click", function () {
        lenis.start();
        tl.reverse();
    });
};
