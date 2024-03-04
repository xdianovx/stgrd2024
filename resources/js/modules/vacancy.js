export const vacancy = (gsap) => {
    const wrap = document.querySelector('.actual-vacancy__list')

    if (!wrap) return

    const items = gsap.utils.toArray('.vacancy-item')
    const tabs = gsap.utils.toArray('.vacancy-item__tab')
    const tabToggles = items.map(createAnimation)

    tabs.forEach(function (tab) {
        tab.addEventListener("click", () => toggleMenu(tab))
    })
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
                ease: "power2.inOut"
            })
            .reverse();

        return function (clickedMenu) {
            if (clickedMenu === menu) {
                element.classList.add('active')
                animation.reversed(!animation.reversed());
            } else {
                element.classList.remove('active')
                animation.reverse();

            }
        };
    }
}

