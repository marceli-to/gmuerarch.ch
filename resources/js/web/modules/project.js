(function () {

  const selectors = {
    listItem: 'li.is-visible a[data-project]',
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
    });


/*
item.addEventListener("touchstart", function() {
  this.classList.add(classes.touched);
}, false);
item.addEventListener("touchend", function() {
  this.classList.remove(classes.touched);
}, false);

*/


  };

  const toggle = function(){

  };

  init();
  
})();