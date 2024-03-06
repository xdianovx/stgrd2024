
export const squareBtns = (ScrollTrigger) => {
  const squareBtns = document.querySelectorAll(".square_btn");

  if (squareBtns) {
    squareBtns.forEach((element) => {
      ScrollTrigger.create({
        trigger: element,
        start: "top 50%",
        pin: true,
        scrub: 2,
        ease: "power3",
      });
    });
  }
}
