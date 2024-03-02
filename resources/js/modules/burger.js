import gsap from "gsap";

export const burger = () => {
    const burger = document.querySelector(".burger");
    const top = document.querySelector(".burger .top");
    const bot = document.querySelector(".burger .bottom");

    // if (window.innerWindth >= 1440) {
    let tl = gsap.timeline({
        paused: true,
        defaults: {
            ease: "power2.inOut",
            duration: 0.15,
        },
    });

    tl.to(bot, {
        width: "100%",
    })
        .to(bot, {
            bottom: "27rem",
        })
        .to(top, {
            rotate: "90deg",
        })
        .to(
            bot,
            {
                rotate: "90deg",
            },
            "<"
        )
        .to(top, {
            left: "4rem",
        })
        .to(
            bot,
            {
                right: "4rem",
            },
            "<"
        );

    burger.addEventListener("mouseenter", function () {
        tl.play();
    });

    burger.addEventListener("mouseleave", function () {
        tl.reverse();
    });
    // }
};
