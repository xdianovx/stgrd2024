import { ScrollTrigger } from "gsap/all";
export const lifesection = (gsap) => {
  const mainSection = document.querySelector(".life__wrap");

  if (!mainSection) return;

  if (window.innerWidth >= 1200) {
    ScrollTrigger.create({
      trigger: mainSection,
      start: "top top",
      end: "bottom bottom",
      endTrigger: ".life__wrap-cards-stop",
      pin: mainSection,
      scrub: 2,
      pinSpacing: false,
    });
  }
};
