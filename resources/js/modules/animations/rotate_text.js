export const rotate_text = (gsap) => {
  const items = document.querySelectorAll(".rotate");

  if (!items) return;

  items.forEach(function (item) {
    const wordLenght = item.innerHTML.length;
    const charArray = [...item.innerHTML];
    item.innerHTML = "";

    // item.style.height = item.offsetHeight + "px"

    item.insertAdjacentHTML("afterbegin", `<div class="rotate-main"></div>`);
    item.insertAdjacentHTML("afterbegin", `<div class="rotate-double"></div>`);

    for (let i = 0; i < wordLenght; i++) {
      item
        .querySelector(".rotate-double")
        .insertAdjacentHTML("beforeend", `<span>${charArray[i]}</span>`);
    }
    for (let i = 0; i < wordLenght; i++) {
      item
        .querySelector(".rotate-main")
        .insertAdjacentHTML("beforeend", `<span>${charArray[i]}</span>`);
    }

    const tl = gsap.timeline({
      paused: true,
      defaults: {
        ease: "power2.inOut",
        duration: 0.5,
      },
    });

    tl.to(item.querySelectorAll(".rotate-double span"), {
      top: item.offsetHeight,
      stagger: 0.02,
    }).to(
      item.querySelectorAll(".rotate-main span"),
      {
        top: item.offsetHeight,
        stagger: 0.02,
      },
      "<"
    );

    item.addEventListener("mouseenter", function () {
      tl.play();
    });

    item.addEventListener("mouseleave", function () {
      tl.reverse();
    });
  });
};
