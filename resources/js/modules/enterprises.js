import gsap from "gsap";

export const enterprises = (ad, lenis) => {
  const wrap = document.querySelector(".enterprises");

  if (!wrap) return;

  const items = wrap.querySelectorAll(".enterprise-item");

  const closeOthers = (id, item) => {
    items.forEach((item, idx) => {
      if (id !== idx) {
        const content = item.querySelector(".enterprise-item__content");
        gsap.to(content, {
          height: 0,
          ease: "back",
        });
      }
    });
  };

  console.log(lenis);

  items.forEach((item, idx) => {
    const head = item.querySelector(".enterprise-item__tab");
    const content = item.querySelector(".enterprise-item__content");

    gsap.set(content, {
      height: 0,
    });
    head.addEventListener("click", (e) => {
      closeOthers(idx, item, e.target.getBoundingClientRect().top);

      console.log(e);
      content.classList.add("active");
      gsap.to(content, {
        height: "auto",
        duration: 0.2,
        ease: "power2.inOut",
        onComplete: (e) => {
          console.log(e);
          lenis.scrollTo(item);
        },
      });
    });
  });
};
