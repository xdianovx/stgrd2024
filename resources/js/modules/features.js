export const features = (gsap, lenis) => {
    const items = document.querySelectorAll(".feature-row");

    if (!items) return;

    items.forEach(function (item) {
        const plus = item.querySelector(".plus");
        const head = item.querySelector('.feature-row__top')
        const content = item.querySelector(".feature-row__content");

        let tl = gsap.timeline({
            paused: true,
            defaults: {
                ease: "power4.inOut",
                duration: 0.2,
            },
        });

        tl.to(content, {
            height: "296rem",
        });


        item.addEventListener("click", function (e) {
            lenis.scrollTo(e.pageY - head.offsetHeight)
            if (item.classList.contains("active")) {
                item.classList.remove("active");
                plus.classList.remove("active");
                tl.reverse();
            } else {
                item.classList.add("active");
                plus.classList.add("active");
                tl.play();
            }
        });
    });
};
