(function () {

  const selectors = {
    listItem: 'li.is-visible a[data-project]',
    listItemFirst: 'li.is-visible a.is-active[data-project]',
    imageItem:  'picture[data-project]',
  };

  const init = () => {

    const listItems = document.querySelectorAll(selectors.listItem);
    const listItemsArray = [].slice.call(listItems);

    const imageItems = document.querySelectorAll(selectors.imageItem);
    const imageItemsArray = [].slice.call(imageItems);

    listItemsArray.forEach(function (item) {
      item.addEventListener("mouseover", function() {
        const id = item.dataset.project;
        imageItemsArray.forEach(function (image) {
          image.classList.add('is-hidden');
        });
        const targetImage = document.querySelector('picture[data-project="'+ id +'"]');
        targetImage.classList.remove('is-hidden');
      });

      item.addEventListener("mouseleave", function() {
        imageItemsArray.forEach(function (image) {
          image.classList.add('is-hidden');
        });

        const itemFirst = document.querySelector(selectors.listItemFirst);
        const id = itemFirst.dataset.project;
        const targetImage = document.querySelector('picture[data-project="'+ id +'"]');
        targetImage.classList.remove('is-hidden');
      });

    });
  };

  init();
  
})();