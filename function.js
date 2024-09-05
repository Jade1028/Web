let list = document.querySelector('.slider .list');
let items = document.querySelectorAll('.slider .list .item');
let dots = document.querySelectorAll('.slider .dots li');
let prev = document.getElementById('prev');
let next = document.getElementById('next');

let active = 0;
let lengthItems = items.length -1;

next.onclick = function(){
    if(active + 1 > lengthItems){
        active = 0;
    }else{
        active = active + 1;
    }
    reloadSlider();
}
prev.onclick = function(){
    if(active - 1 < 0){
        active = lengthItems;
    }else{
        active = active -1;
    }
    reloadSlider();
}
let refreshSlider = setInterval(() => {next.click()}, 3000);
function reloadSlider(){
    let checkLeft = items[active].offsetLeft;
    list.style.left = -checkLeft +'px';

    let lastActiveDot = document.querySelector('.slider .dots li.active');
    lastActiveDot.classList.remove('active');
    dots[active].classList.add('active');
    
    clearInterval(refreshSlider);
    refreshSlider = setInterval(()=> {next.click()}, 3000)
}

dots.forEach((li, key) => {
    li.addEventListener('click', function(){
        active = key;
        reloadSlider();
    })
})

//Product
let previewContainer = document.querySelector('.products-preview');
let previewBox = previewContainer.querySelectorAll('.preview');

// Add event listeners to each product
document.querySelectorAll('.products-container .product').forEach(product => {
  product.onclick = () => {
    // Show the preview container
    previewContainer.style.display = 'flex';

    // Get the name of the clicked product
    let name = product.getAttribute('data-name');

    // Show the corresponding preview box
    previewBox.forEach(preview => {
      let target = preview.getAttribute('data-target');
      if (name === target) {
        preview.classList.add('active1');
      } else {
        preview.classList.remove('active1');
      }
    });
  };
});

// Add event listeners to close buttons to hide the product card
previewBox.forEach(preview => {
  preview.querySelector('.close').onclick = () => {
    preview.classList.remove('active1');
    previewContainer.style.display = 'none';
  };
});

//search
function search() {
  let filter = document.getElementById('searchInput').value.toUpperCase();
  let items = document.querySelectorAll('.product');
  let categories = document.querySelectorAll('.same-types');

  // Loop through all the product items and filter them
  items.forEach(item => {
    let title = item.querySelector('h3'); // Get the <h3> inside each product
    let value = title.textContent || title.innerText; // Get the text content of the title

    // Check if the product title matches the filter
    if (value.toUpperCase().indexOf(filter) > -1) {
      item.style.display = "";
    } else {
      item.style.display = "none";
    }
  });

  // Loop through all category containers to check if they have any visible products
  categories.forEach(category => {
    let visibleProducts = category.querySelectorAll('.product:not([style*="display: none"])');

    if (visibleProducts.length > 0) {
      category.style.display = "";
    } else {
      category.style.display = "none";
    }
  });
}