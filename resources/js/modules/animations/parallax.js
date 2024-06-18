export const parallax = (gsap) => {
  const parr = document.querySelectorAll(".parallax");

  if (parr) {
    console.log(123);

    parr.forEach(function (item) {
      gsap.to(item.querySelector("img"), {
        yPercent: 10,
        ease: "none",
        scrollTrigger: {
          trigger: item,
          start: "top bottom",
          end: "bottom top",
          scrub: true,
        },
      });
    });
  }

  const showreelParallax = document.querySelector(".parallax-showreel");

  if (showreelParallax) {
    gsap.to(showreelParallax.querySelector("video"), {
      yPercent: 10,
      ease: "none",
      scrollTrigger: {
        trigger: showreelParallax,
        start: "top bottom",
        end: "bottom top",
        scrub: true,
      },
    });
  }
};
