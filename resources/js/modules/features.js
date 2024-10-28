export const features = (gsap, lenis) => {
  const items = document.querySelectorAll(".feature-row");
  if (!items) return;

  // const closeOthers = (id) => {
  //   items.forEach((item, idx) => {
  //     if (id !== idx) {
  //       const content = item.querySelector(".feature-row__content");
  //       gsap.to(content, {
  //         height: 0,
  //       });
  //     }
  //   });
  // };

  items.forEach((item, idx) => {
    const head = item.querySelector(".feature-row__top");

    head.addEventListener("click", (e) => {
      const content = item.querySelector(".feature-row__content");

      gsap.to(content, {
        height: "auto",
        onComplete: () => {
          console.log(1);
          // lenis
        },
      });

      // closeOthers(idx);
    });
  });
};
