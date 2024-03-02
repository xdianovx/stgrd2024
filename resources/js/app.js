import "./bootstrap";
import MouseFollower from "mouse-follower";
import { ScrollTrigger } from "gsap/ScrollTrigger";
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

navigation(lenis);
sliders();
burger();
hero_title(gsap);
footer(ScrollTrigger);
