export const project_page = (gsap) => {
  const projectPage = document.querySelector('.project-page')

  if (!projectPage) return

  const comfortItems = projectPage.querySelectorAll('.project-page-comfort__item')

  comfortItems.forEach(function (item) {
    item.addEventListener('click', function () {
      const content = item.querySelector('.project-page-comfort__item_content')
      const tl = gsap.timeline({
        // paused: true
      })

      if (item.classList.contains('active')) {
        item.classList.remove('active')
        tl.to(content, {
          height: 0,
          ease: "power4"
        })
      } else {
        tl.to(content, {
          height: 'auto',
          ease: "power4"
        })
        item.classList.add('active')
      }
    })
  })

}
