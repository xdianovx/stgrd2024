export const maps = (gsap) => {
  const mainMap = document.querySelector(".main-map");

  if (!mainMap) return;

  async function initMap() {
    await ymaps3.ready;
    const {
      YMap,
      YMapDefaultSchemeLayer,
      YMapDefaultFeaturesLayer,
      YMapListener,
      YMapMarker,
    } = ymaps3;
    const { YMapDefaultMarker } = await ymaps3.import(
      "@yandex/ymaps3-markers@0.0.1"
    );

    const map = new YMap(mainMap, {
      location: {
        center: [42.018706, 45.078537],
        zoom: 12,
      },
    });

    map.addChild(new YMapDefaultSchemeLayer());
    map.addChild(new YMapDefaultFeaturesLayer());
    map.addChild(
      new YMapDefaultMarker({
        coordinates: [42.018706, 45.078537],
        // title: 'Hello World!',
        // subtitle: 'kind and bright',
        color: "#1f1f1f",
      })
    );
  }

  initMap();

  const pinBtn = document.querySelector(".contacts__hero_wrap .circle-btn");
  const mapContainer = document.querySelector(".content__hero_map_container");

  let tl = gsap.timeline({
    paused: true,
    defaults: {
      ease: "power2.inOut",
    },
  });

  tl.to(mapContainer, {
    height: "auto",
  });

  pinBtn.addEventListener("click", () => {
    if (pinBtn.classList.contains("active")) {
      tl.reverse();
      pinBtn.classList.remove("active");
    } else {
      tl.play();
      pinBtn.classList.add("active");
    }
  });
};
