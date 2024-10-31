export const squareBtns = (ScrollTrigger) => {
  const missionBtns = document.querySelectorAll(".pin-btn-mission");

  missionBtns.forEach((item) => {
    ScrollTrigger.create({
      trigger: item,
      start: "top 72%",
      pin: true,
      scrub: 2,
      ease: "power3",
    });
  });

  ScrollTrigger.create({
    trigger: document.querySelector(".pin-btn-team"),
    start: "top 26%",
    pin: true,
    scrub: 2,
    ease: "power3",
  });
};
