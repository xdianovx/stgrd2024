import "./bootstrap";
import MouseFollower from "mouse-follower";
import {ScrollTrigger} from "gsap/ScrollTrigger";
import barba from "@barba/core";
import Lenis from "@studio-freight/lenis";
import {navigation} from "./modules/navigation";
import gsap from "gsap";
import {sliders} from "./modules/sliders";
import {burger} from "./modules/burger";
import {marquee} from "./modules/marquee";
import {hero_title} from "./modules/animations/hero_title";
// import {footer} from "./modules/footer";

import {showreel} from "./modules/showreel";
import {sticky_btn} from "./modules/sticky_btn";
import {features} from "./modules/features.js";
import {mission} from "./modules/mission.js";
import {rotate_text} from "./modules/animations/rotate_text.js";
import {vacancy} from "./modules/vacancy.js";
import {project_page} from "./modules/project_page.js";
import {lines} from "./modules/animations/lines.js";
import {parallax} from "./modules/animations/parallax.js";
import {selectors} from "./modules/selectors.js";
import {squareBtns} from "./modules/animations/square-btns.js";
import {filters} from "./modules/filters.js";

document.addEventListener("DOMContentLoaded", (event) => {
  MouseFollower.registerGSAP(gsap);
  gsap.registerPlugin(ScrollTrigger);

  new MouseFollower({
    speed: 0.3,
    skewing: 0,
    skewingText: 0,
  });
  const lenis = new Lenis({
    duration: 1.5,
  });

  function raf(time) {
    lenis.raf(time);
    ScrollTrigger.update();
    requestAnimationFrame(raf);
  }

  requestAnimationFrame(raf);

  navigation(lenis, barba);
  sliders();
  burger();
  hero_title(gsap);
  marquee(gsap);
  showreel(gsap, lenis);
  sticky_btn(gsap);
  mission();
  rotate_text(gsap);
  features(gsap, lenis, ScrollTrigger);
  vacancy(gsap);
  project_page(gsap);
  lines()
  parallax()
  selectors()
  squareBtns(ScrollTrigger)
  // footer(ScrollTrigger);
  filters(gsap)


  barba.init({
    schema: {
      wrapper: "wrapper",
    },
    transitions: [
      {
        name: "opacity-transition",
        leave(data) {
          lenis.scrollTo(0);

          gsap.to(data.current.container, {
            opacity: 0,
            onComplete: () => {
              ScrollTrigger.refresh();
            },
          });
        },
        enter(data) {
          gsap.from(data.next.container, {
            opacity: 0,
            onComplete: () => {
              ScrollTrigger.refresh();

              sliders();
              burger();
              // hero_title(gsap);
              marquee(gsap);
              showreel(gsap, lenis);
              sticky_btn(gsap);
              mission();
              rotate_text(gsap);
              features(gsap, lenis, ScrollTrigger);
              vacancy(gsap);
              project_page(gsap);
              lines()
              parallax()
              squareBtns(ScrollTrigger)
              selectors()
              filters(gsap)
            },
          });
        },
      },
    ],
  });
});
