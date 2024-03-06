import Choices from "choices.js";


export  const selectors = () => {
  const selectors = document.querySelectorAll('.js-choice');

  if (selectors) {
    selectors.forEach(item => {
      const choices = new Choices(item, {
        searchEnabled: false,
        itemSelectText: ''
      });
    })
  }

}
