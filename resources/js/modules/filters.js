export const filters = (gsap) => {
  const items = document.querySelectorAll('.filter')
  if (!items) return

  items.forEach(function (item) {
    const head = item.querySelector('.filter__title')
    const content = item.querySelector('.filter__content')

    const tl = gsap.timeline({
      paused: true,
      defaults: {
        ease: 'power2.inOut'
      }
    })

    tl.to(content, {
      height: 'auto'
    })
    head.addEventListener('click', function () {

      if(head.classList.contains('active')) {
        head.classList.remove('active')
        tl.reverse()

      } else {
        head.classList.add('active')
        tl.play()
      }
    })
  })
}
