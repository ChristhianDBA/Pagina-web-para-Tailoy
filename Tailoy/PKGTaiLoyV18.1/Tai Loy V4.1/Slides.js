/*MENU DESPEGABLE*/

document.addEventListener('DOMContentLoaded', function() {
    const menuCheckbox = document.getElementById('menu');
    const body = document.body;

    menuCheckbox.addEventListener('change', function() {
        if (this.checked) {
            body.classList.add('menu-open');
        } else {
            body.classList.remove('menu-open');
        }
    });

    const menuItems = document.querySelectorAll('.navbar ul li a');
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            menuCheckbox.checked = false;
            body.classList.remove('menu-open');
        });
    });
});
  

/*Botones y desplazamiento de los sliders*/
let slideImages = document.querySelectorAll('.slide-container .slides img');
let next = document.querySelector('.next');
let prev = document.querySelector('.prev');
let dots = document.querySelectorAll('.dot');

var counter = 0;

next.addEventListener('click', slideNext);
function slideNext() {
    slideImages[counter].style.animation = 'next1 0.5s ease-in forwards';
    if (counter >= slideImages.length - 1) {
        counter = 0;
    }
    else {
        counter++;
    }
    slideImages[counter].style.animation = 'next2 0.5s ease-in forwards';
}


prev.addEventListener('click', slidePrev);
function slidePrev() {
    slideImages[counter].style.animation = 'prev1 0.5s ease-in forwards';
    if (counter == 0) {
        counter = slideImages.length - 1;
    }
    else {
        counter--;
    }
    slideImages[counter].style.animation = 'prev2 0.5s ease-in forwards';
    indicators();
}

function autoSliding() {
    deletInterval = setInterval(timer, 3000);
    function timer() {
        slideNext();
        indicators();
    }
}
autoSliding();

const container = document.querySelector('.slide-container');
container.addEventListener('mouseover', function () {
    clearInterval(deletInterval);
});

container.addEventListener('mouseout', autoSliding);

function indicators() {
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(' active', '');
    }
    dots[counter].className += ' active';
}

function switchImage(currentImage) {
    currentImage.classList.add('active');
    var imageId = currentImage.getAttribute('attr');
    if (imageId > counter) {
        slideImages[counter].style.animation = 'next1 0.5s ease-in forwards';
        counter = imageId;
        slideImages[counter].style.animation = 'next2 0.5s ease-in forwards';
    }
    else if (imageId == counter) {
        return;
    }
    else {
        slideImages[counter].style.animation = 'prev1 0.5s ease-in forwards';
        counter = imageId;
        slideImages[counter].style.animation = 'prev2 0.5s ease-in forwards';
    }
    indicators();
}
/*carrusel 1 */
let slideIndex = 0;
const slides = document.querySelectorAll('.carousel-item');

function changeSlide(n) {
  slideIndex += n;
  showSlides();
}

function showSlides() {
  if (slideIndex >= slides.length - 2) {
    slideIndex = 0;
  }
  if (slideIndex < 0) {
    slideIndex = slides.length - 3;
  }
  const offset = -slideIndex * (100 / 3);
  document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
}
