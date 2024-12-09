export const vacancy = (gsap) => {
  const wrap = document.querySelector(".actual-vacancy__list");

  if (!wrap) return;

  const items = gsap.utils.toArray(".vacancy-item");
  const tabs = gsap.utils.toArray(".vacancy-item__tab");
  const tabToggles = items.map(createAnimation);

  tabs.forEach(function (tab) {
    tab.addEventListener("click", () => toggleMenu(tab));
  });
  function toggleMenu(clickedTab) {
    tabToggles.forEach((toggleFn) => toggleFn(clickedTab));
  }

  function createAnimation(element) {
    let menu = element.querySelector(".vacancy-item__tab");
    let box = element.querySelector(".vacancy-item__content");

    gsap.set(box, { height: "auto" });

    let animation = gsap
      .timeline()
      .from(box, {
        height: 0,
        duration: 0.2,
        ease: "power2.inOut",
      })
      .reverse();

    return function (clickedMenu) {
      if (clickedMenu === menu) {
        element.classList.add("active");
        animation.reversed(!animation.reversed());
      } else {
        element.classList.remove("active");
        animation.reverse();
      }
    };
  }

  const reviews = gsap.utils.toArray(".team-reviews__item");
  // const reviewsImage = gsap.utils.toArray(".team-reviews__item_img");

  reviews.forEach(function (review) {
    const reviewsImage = review.querySelector(".team-reviews__item_img");
    const reviewsVideo = review.querySelector(
      ".team-reviews__item_video video"
    );
    console.log(reviewsImage);

    reviewsVideo.addEventListener("click", function () {
      reviewsVideo.play();
      console.log(123);
    });

    review.addEventListener("mouseenter", function () {
      gsap.to(reviewsImage, {
        duration: 0.1,
        width: 0,
        ease: "power4.inOut",
        height: 0,
      });
    });
    review.addEventListener("mouseleave", function () {
      reviewsVideo.pause();

      gsap.to(reviewsImage, {
        duration: 0.1,
        ease: "power2.inOut",

        width: "100%",
        height: "100%",
      });
    });
  });
};
