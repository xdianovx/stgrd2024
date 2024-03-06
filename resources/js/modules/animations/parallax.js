import gsap from "gsap";

export const parallax = () => {

  const parr = document.querySelectorAll('.parallax')
  const showreelParallax = document.querySelector('.parallax-showreel')
  if (parr) {
    parr.forEach(function (item) {
      gsap.to(item.querySelector("img"), {
        yPercent: 10,
        ease: "none",
        scrollTrigger: {
          trigger: item,
          start: "top bottom",
          end: "bottom top",
          scrub: true,
        }
      });
    })
  }

  if (showreelParallax) {
    gsap.to(showreelParallax.querySelector("video"), {
      yPercent: 10,
      ease: "none",
      scrollTrigger: {
        trigger: showreelParallax,
        start: "top bottom",
        end: "bottom top",
        scrub: true,
      }
    });
  }
}
