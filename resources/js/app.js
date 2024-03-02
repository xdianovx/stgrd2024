import "./bootstrap";
import MouseFollower from "mouse-follower";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import barba from "@barba/core";
import Lenis from "@studio-freight/lenis";
import { navigation } from "./modules/navigation";
import gsap from "gsap";
import { sliders } from "./modules/sliders";
import { burger } from "./modules/burger";
import { hero_title } from "./modules/animations/hero_title";
import { footer } from "./modules/footer";

MouseFollower.registerGSAP(gsap);

new MouseFollower({
    speed: 0.3,
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
let scrollX = 0;
let scrollY = 0;
barba.init({
    schema: {
        wrapper: "wrapper",
    },
    transitions: [
        {
            name: "opacity-transition",
            leave(data) {
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
                        ScrollTrigger.refresh();
                    },
                });
            },
        },
    ],
});

navigation(lenis, barba);
sliders();
burger();
hero_title(gsap);
// footer(ScrollTrigger);
