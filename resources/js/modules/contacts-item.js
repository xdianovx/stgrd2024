export const contactsItem = (gsap) => {
  const items = document.querySelectorAll('.contacts-item')

  if (!contactsItem) return








  items.forEach(item => {
    async function initMap() {
      await ymaps3.ready;
      const {YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer, YMapListener, YMapMarker} = ymaps3;
      const {YMapDefaultMarker} = await ymaps3.import('@yandex/ymaps3-markers@0.0.1');
      const btn = item.querySelector('.circle-btn')
      const mapContainer = item.querySelector('.contacts-item-map')
      const mapContainerInner = item.querySelector('.contacts-item-map__inner')
      const long = item.getAttribute('data-longtitude')
      const lat = item.getAttribute('data-latitude')


      // console.log(coords)
      const map = new YMap(
        mapContainerInner,
        {
          location: {
            center:  [lat, long],
            zoom: 12
          },

        },
      );

      map.addChild(new YMapDefaultSchemeLayer());
      map.addChild(new YMapDefaultFeaturesLayer());
      map.addChild(new YMapDefaultMarker({
        coordinates: [lat, long],
        // title: 'Hello World!',
        // subtitle: 'kind and bright',
        color: '#1f1f1f'
      }));

      const tl = gsap.timeline({
        paused: true,
        defaults: {
          ease: 'power5.inOut'
        }
      })


      tl.to(mapContainer, {
        height: 'auto'
      })

      btn.addEventListener('click', () => {
        if (btn.classList.contains('active')) {
          btn.classList.remove('active')
          tl.reverse()
        } else {
          btn.classList.add('active')
          tl.play()
        }
      })
    }


    initMap()



  })




}
