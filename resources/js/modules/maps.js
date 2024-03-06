export const maps = () => {

  const mainMap = document.querySelector('.main-map')

  console.log(mainMap)

  if (!mainMap) return

  async function initMap() {
    // Промис `ymaps3.ready` будет зарезолвлен, когда загрузятся все компоненты основного модуля API
    await ymaps3.ready;

    const {YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer, YMapMarker} = ymaps3;
    const {YMapDefaultMarker} = await ymaps3.import('@yandex/ymaps3-markers@0.0.1');


    const map = new YMap(
      mainMap,
      {
        location: {
          center: [42.018706, 45.078537],
          zoom: 12
        },

      },
    );


    // map.behavior.disable('scrollZoom')



    map.addChild(new YMapDefaultSchemeLayer());
    map.addChild(new YMapDefaultFeaturesLayer());
    map.addChild(new YMapDefaultMarker({
      coordinates: [42.018706, 45.078537],
      // title: 'Hello World!',
      // subtitle: 'kind and bright',
      color: '#1f1f1f'
    }));

  }

  initMap()
}
