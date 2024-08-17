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
/*let previewContainer = document.querySelector('.products-preview');
let previewBox = previewContainer.querySelectorAll('.preview');

document.querySelectorAll('.products-container .product').forEach(product =>{
  product.onclick = () =>{
    previewContainer.style.display = 'flex';
    let name = product.getAttribute('data-name');
    previewBox.forEach(preview =>{
      let target = preview.getAttribute('data-target');
      if(name == target){
        preview.classList.add('active');
      }
    });
  };
});

previewBox.forEach(close =>{
  close.querySelector('.close').onclick = () =>{
    close.classList.remove('active');
    previewContainer.style.display = 'none';
  };
});
*/

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