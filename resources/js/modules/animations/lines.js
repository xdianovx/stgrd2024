import gsap from "gsap";

export const lines = () => {
  const lines = document.querySelectorAll(".hr");

  if (!lines) return

  lines.forEach((item) => {
    gsap.from(item, {
      width: 0,
      duration: 0.5,
      scrollTrigger: {
        trigger: item,
        start: "top 80%",
        ease: "power3",
      },
    });
  });
}
