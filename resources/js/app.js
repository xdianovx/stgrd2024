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
// import {footer} from "./modules/footer";
import MicroModal from "micromodal";
import { showreel } from "./modules/showreel";
import { sticky_btn } from "./modules/sticky_btn";
import { features } from "./modules/features.js";
import { mission } from "./modules/mission.js";
import { rotate_text } from "./modules/animations/rotate_text.js";
import { vacancy } from "./modules/vacancy.js";
import { project_page } from "./modules/project_page.js";
import { lines } from "./modules/animations/lines.js";
import { parallax } from "./modules/animations/parallax.js";
import { selectors } from "./modules/selectors.js";
import { squareBtns } from "./modules/animations/square-btns.js";
import { filters } from "./modules/filters.js";
import { maps } from "./modules/maps.js";
import { contactsItem } from "./modules/contacts-item.js";
import { director_card } from "./modules/director_card.js";
import { lifesection } from "./modules/lifesection.js";
import { enterprises } from "./modules/enterprises.js";
import { footer } from "./modules/footer.js";
import { ticker } from "./modules/animations/ticker.js";
import { projectpage_marquee } from "./modules/projectpage_marquee.js";

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

  MicroModal.init({
    disableScroll: true,
    disableFocus: true,
    onShow: () => lenis.stop(),
    onClose: () => lenis.start(),
  });

  function raf(time) {
    lenis.raf(time);
    ScrollTrigger.update();
    requestAnimationFrame(raf);
  }

  requestAnimationFrame(raf);

  enterprises(gsap, lenis);
  ticker();
  selectors();
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
  lines();
  parallax(gsap);
  squareBtns(ScrollTrigger, document.querySelector(".directors__left"));
  footer();
  filters(gsap);
  maps(gsap);
  contactsItem(gsap);
  director_card(gsap);
  lifesection(gsap);
  projectpage_marquee(gsap);
  project_page(gsap);

  const selects = document.querySelectorAll(".select");

  gsap.utils.toArray("[data-speed]").forEach((el) => {
    gsap.to(el, {
      y: function () {
        return (
          (1 - parseFloat(el.getAttribute("data-speed"))) *
          (ScrollTrigger.maxScroll(window) -
            (this.scrollTrigger ? this.scrollTrigger.start : 0))
        );
      },
      ease: "none",
      scrollTrigger: {
        trigger: el,
        start: "top center",
        end: "max",
        invalidateOnRefresh: true,
        scrub: true,
      },
    });
  });

  if (selects) {
    selects.forEach((select) => {
      const head = select.querySelector(".select-title");
      const listItems = select.querySelectorAll(".select-item");
      const list = select.querySelector(".select-list");

      listItems.forEach((item) => {
        item.addEventListener("click", () => {
          const title = select.querySelector(".select-title p");
          title.innerText = item.innerText;
          select.classList.remove("active");
          tl.reverse();
        });
      });

      let tl = gsap.timeline({
        paused: true,
      });

      tl.to(list, {
        height: "auto",
        ease: "power2",
      });
      head.addEventListener("click", () => {
        if (select.classList.contains("active")) {
          select.classList.remove("active");
          tl.reverse();
        } else {
          select.classList.add("active");
          tl.play();
        }
      });
    });
  }
  // barba.init({
  //   schema: {
  //     wrapper: "wrapper",
  //   },
  //   transitions: [
  //     {
  //       name: "opacity-transition",
  //       leave(data) {
  //         lenis.scrollTo(0);

  //         gsap.to(data.current.container, {
  //           opacity: 0,
  //           onComplete: () => {
  //             ScrollTrigger.refresh();
  //               ScrollTrigger.refresh();
  //               selectors();

  //               sliders();
  //               burger();
  //               // hero_title(gsap);
  //               marquee(gsap);
  //               showreel(gsap, lenis);
  //               sticky_btn(gsap);
  //               mission();
  //               rotate_text(gsap);
  //               features(gsap, lenis, ScrollTrigger);
  //               vacancy(gsap);
  //               project_page(gsap);
  //               lines();
  //               parallax();
  //               squareBtns(ScrollTrigger);
  //               filters(gsap);
  //               maps(gsap);
  //               contactsItem(gsap);
  //           },
  //         });
  //       },
  //       enter(data) {
  //         gsap.from(data.next.container, {
  //           opacity: 0,
  //           onComplete: () => {
  //             ScrollTrigger.refresh();
  //             selectors();

  //             sliders();
  //             burger();
  //             // hero_title(gsap);
  //             marquee(gsap);
  //             showreel(gsap, lenis);
  //             sticky_btn(gsap);
  //             mission();
  //             rotate_text(gsap);
  //             features(gsap, lenis, ScrollTrigger);
  //             vacancy(gsap);
  //             project_page(gsap);
  //             lines();
  //             parallax();
  //             squareBtns(ScrollTrigger);
  //             filters(gsap);
  //             maps(gsap);
  //             contactsItem(gsap);
  //           },
  //         });
  //       },
  //     },
  //   ],
  // });
});
