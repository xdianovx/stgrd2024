export const features = (gsap, lenis, ScrollTrigger) => {
  const items = gsap.utils.toArray(".feature-row");
  if (!items) return;

  let groups = gsap.utils.toArray(".feature-row");
  let menus = gsap.utils.toArray(".feature-row__top");
  let menuToggles = groups.map(createAnimation);

  menus.forEach((menu) => {
    menu.addEventListener("click", () => toggleMenu(menu));
  });

  function toggleMenu(clickedMenu) {
    menuToggles.forEach((toggleFn) => {
      ScrollTrigger.refresh();

      toggleFn(clickedMenu);
    });
  }

  function createAnimation(element) {
    let menu = element.querySelector(".feature-row__top");
    let box = element.querySelector(".feature-row__content");

    gsap.set(box, { height: "auto" });

    let animation = gsap
      .from(box, {
        height: 0,
        duration: 0.2,
        ease: "power1.inOut",
      })
      .reverse();

    return function (clickedMenu) {
      if (clickedMenu === menu) {
        animation.reversed(!animation.reversed());
      } else {
        animation.reverse();
      }
    };
  }
};
