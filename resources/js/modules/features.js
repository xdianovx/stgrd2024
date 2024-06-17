export const features = (gsap, lenis, ScrollTrigger) => {
  const items = document.querySelectorAll(".feature-row");

  if (!items) return;
  const container = document.querySelector(".features__cards");
  const image = document.querySelector(".image-container");
  const imageArray = [];

  let isOpen = false;
  let ypin;
  const showImageAnim = gsap.timeline({
    paused: true,
    defaults: {
      duration: 0.1,
      ease: "power1.inOut",
    },
  });

  showImageAnim.to(image, {
    opacity: 1,
  });

  let y = 0;

  container.addEventListener("mousemove", (e) => {
    y = e.clientY - image.clientHeight;
    console.log(isOpen);
    if (!isOpen) {
      gsap.to(image, {
        y: y,
        duration: 0.01,
        ease: "none",
      });
    } else {
      gsap.to(image, {
        y: ypin,
        duration: 0.01,
        ease: "none",
      });
    }

    //    move();
    //    lastX = this.x;
    //    lastY = this.y;
  });

  container.addEventListener("mouseenter", () => {
    showImageAnim.play();
  });

  container.addEventListener("mouseleave", () => {
    showImageAnim.reverse();
  });

  items.forEach(function (item) {
    const plus = item.querySelector(".plus");
    const img = item.getAttribute("data-image");
    imageArray.push(img);
    // const head = item.querySelector(".feature-row__top");
    const content = item.querySelector(".feature-row__content");

    let tl = gsap.timeline({
      paused: true,
      defaults: {
        ease: "power4.inOut",
        duration: 0.2,
      },
    });

    if (window.innerWidth <= 1200) {
      tl.to(content, {
        height: "180px",
      });
    } else {
      tl.to(content, {
        height: "296rem",
      });
    }

    item.addEventListener("click", function (e) {
      ypin = e.clientY - image.clientHeight;
      isOpen = true;
      // lenis.scrollTo(e.pageY - head.offsetHeight)
      if (item.classList.contains("active")) {
        item.classList.remove("active");
        plus.classList.remove("active");
        tl.reverse();
        ScrollTrigger.refresh();
      } else {
        item.classList.add("active");
        plus.classList.add("active");
        tl.play();
        ScrollTrigger.refresh();
      }
    });
  });
};
