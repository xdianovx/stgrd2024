export const director_card = (gsap) => {
  const items = document.querySelectorAll(".director-slide");
  if (!items) return;

  items.forEach(function (item) {
    const head = item.querySelector(".director-slide__info");
    const content = item.querySelector(".director-slide__drop");

    const tl = gsap.timeline({
      paused: true,
      defaults: {
        ease: "power2.inOut",
      },
    });

    tl.to(content, {
      height: "auto",
    });
    head.addEventListener("click", function () {
      if (head.classList.contains("active")) {
        head.classList.remove("active");
        tl.reverse();
      } else {
        head.classList.add("active");
        tl.play();
      }
    });
  });
};
