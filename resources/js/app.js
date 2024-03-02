import "./bootstrap";
import Lenis from "@studio-freight/lenis";
import { navigation } from "./modules/navigation";
import { sliders } from "./modules/sliders";
import { burger } from "./modules/burger";
const lenis = new Lenis({
    duration: 1.5,
});

function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

navigation(lenis);
sliders();
burger();
