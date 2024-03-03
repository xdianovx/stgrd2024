import "./bootstrap";
import MouseFollower from "mouse-follower";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import barba from "@barba/core";
import Lenis from "@studio-freight/lenis";
import { navigation } from "./modules/navigation";
import gsap from "gsap";
import { sliders } from "./modules/sliders";
import { burger } from "./modules/burger";
import { marquee } from "./modules/marquee";
import { hero_title } from "./modules/animations/hero_title";
import { footer } from "./modules/footer";
import { showreel } from "./modules/showreel";
import { sticky_btn } from "./modules/sticky_btn";
import {features} from "./modules/features.js";
import {mission} from "./modules/mission.js";
import {rotate_text} from "./modules/animations/rotate_text.js";

MouseFollower.registerGSAP(gsap);

new MouseFollower({
    speed: 0.3,
    skewing: 0,
    skewingText: 0,
});
const lenis = new Lenis({
    duration: 1.5,
});



gsap.registerPlugin(ScrollTrigger);

function raf(time) {
    lenis.raf(time);
    ScrollTrigger.update();
    requestAnimationFrame(raf);
}

requestAnimationFrame(raf);


// footer(ScrollTrigger);

function init() {
    const squareBtns = document.querySelectorAll(".square_btn");

    if (squareBtns) {
        squareBtns.forEach((element) => {
            ScrollTrigger.create({
                trigger: element,
                // markers: true,
                start: "top 50%",
                pin: true,
                scrub: 2,
                ease: "power3",
            });
        });
    }

    navigation(lenis, barba);
    sliders();
    burger();
    hero_title(gsap);
    marquee(gsap);
    showreel(gsap, lenis);
    sticky_btn(gsap);
    mission();
    rotate_text(gsap)
    features(gsap, lenis, ScrollTrigger)
}

init();

barba.init({
    schema: {
        wrapper: "wrapper",
    },
    transitions: [
        {
            name: "opacity-transition",
            leave(data) {
                lenis.scrollTo(0)

                gsap.to(data.current.container, {
                    opacity: 0,
                    onComplete: () => {
                        ScrollTrigger.refresh();
                    },
                });
                window.scrollTo(scrollX, scrollY);
            },
            enter(data) {
                gsap.from(data.next.container, {
                    opacity: 0,
                    onComplete: () => {
                        ScrollTrigger.refresh(true);
                        init();

                    },
                });
            },
        },
    ],
});
