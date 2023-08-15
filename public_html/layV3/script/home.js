
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active2", "");
  }
  slides[slideIndex-1].style.display = "flex";  
  dots[slideIndex-1].className += " active2";
}
// //////////////////
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
coll[i].addEventListener("click", function() {
this.classList.toggle("active");
var content = this.nextElementSibling;
if (content.style.display === "block") {
  content.style.display = "none";
} else {
  content.style.display = "block";
}
});
}


var coll2 = document.getElementsByClassName("collapsibleCurriculum");
var i;

for (i = 0; i < coll2.length; i++) {
coll2[i].addEventListener("click", function() {
this.classList.toggle("active");
var content = this.nextElementSibling;
if (content.style.display === "block") {
  content.style.display = "none";
} else {
  content.style.display = "block";
}
});
}

// ///////////////////////////////

// carousel certificates
const prevcertificates = document.querySelector(".prevcertificates");
const nextcertificates = document.querySelector(".nextcertificates");
const trackcertificates = document.querySelector(".track");
const carousel = document.querySelector(".carousel-container");
let width = carousel.offsetWidth;
let index = 0;
window.addEventListener("resize", function () {
width = carousel.offsetWidth;
});
nextcertificates.addEventListener("click", function (e) {
e.preventDefault();
index = index + 1;
prevcertificates.classList.add("show");
trackcertificates.style.transform = "translateX(" + index * -width + "px)";
if (trackcertificates.offsetWidth - index * width < index * width) {
nextcertificates.classList.add("hide");
}
});
prevcertificates.addEventListener("click", function () {
index = index - 1;
nextcertificates.classList.remove("hide");
if (index === 0) {
prevcertificates.classList.remove("show");
}
trackcertificates.style.transform = "translateX(" + index * -width + "px)";
});
// end carousel certificates



// carousel book
const prevbook = document.querySelector(".prevbook");
const nextbook = document.querySelector(".nextbook");
const trackbook = document.querySelector(".trackbook");
const carouselbook = document.querySelector(".carousel-containerbook");
let widthbook = carouselbook.offsetWidth;
let indexbook = 0;
window.addEventListener("resize", function () {
  widthbook = carouselbook.offsetWidth;
});
nextbook.addEventListener("click", function (e) {
e.preventDefault();
indexbook = indexbook + 1;
prevbook.classList.add("show");
trackbook.style.transform = "translateX(" + indexbook * -widthbook + "px)";
if (trackbook.offsetWidth - indexbook * widthbook < indexbook * widthbook) {
nextbook.classList.add("hide");
}
});
prevbook.addEventListener("click", function () {
  indexbook = indexbook - 1;
nextbook.classList.remove("hide");
if (indexbook === 0) {
prevbook.classList.remove("show");
}
trackbook.style.transform = "translateX(" + indexbook * -widthbook + "px)";
});
// end carouse lbook

// carousel Educational
const prevEducational = document.querySelector(".prevEducational ");
const nextEducational = document.querySelector(".nextEducational ");
const carouselEducational = document.querySelector(".carousel-containerEducational");
const trackEducational = document.querySelector(".trackEducational");
let widthEducational = carousel.offsetWidth;
let indexEducational = 0;
window.addEventListener("resize", function () {
  widthEducational = carousel.offsetWidth;
});
nextEducational.addEventListener("click", function (e) {
e.preventDefault();
indexEducational = indexEducational + 1;
prevEducational.classList.add("show");
trackEducational.style.transform = "translateX(" + indexEducational * -widthEducational + "px)";
if (trackEducational.offsetWidth - indexEducational * widthEducational < indexEducational * widthEducational) {
  nextEducational.classList.add("hide");
}
});
prevEducational.addEventListener("click", function () {
  indexEducational = indexEducational - 1;
nextEducational.classList.remove("hide");
if (indexEducational === 0) {
prevEducational.classList.remove("show");
}
trackEducational.style.transform = "translateX(" + indexEducational * -widthEducational + "px)";
});

// endEducational


let myCarousel = document.querySelectorAll('#featureContainer .carousel .carousel-item');
myCarousel.forEach((el) => {
  const minPerSlide = 3
  let next = el.nextElementSibling
  for (var i=1; i<minPerSlide; i++) {
    if (!next) {
      // wrap carousel by using first child
      next = myCarousel[0]
    }
    let cloneChild = next.cloneNode(true)
    el.appendChild(cloneChild.children[0])
    next = next.nextElementSibling
  }
})

let myCarousel2 = document.querySelectorAll('#featureContainer2 .carousel .carousel-item');
myCarousel2.forEach((el) => {
  const minPerSlide2 = 3
  let next2 = el.nextElementSibling
  for (var i=1; i<minPerSlide2; i++) {
    if (!next2) {
      // wrap carousel by using first child
      next2 = myCarousel2[0]
    }
    let cloneChild2 = next2.cloneNode(true)
    el.appendChild(cloneChild2.children[0])
    next2 = next2.nextElementSibling
  }
})



let myCarousel3 = document.querySelectorAll('#featureContainer3 .carousel .carousel-item');
myCarousel3.forEach((el) => {
  const minPerSlide3 = 3
  let next3 = el.nextElementSibling
  for (var i=1; i<minPerSlide3; i++) {
    if (!next3) {
      // wrap carousel by using first child
      next3 = myCarousel3[0]
      

    }
    let cloneChild3 = next3.cloneNode(true)
    el.appendChild(cloneChild3.children[0])
    next3= next3.nextElementSibling
  }
});

let myCarousel4 = document.querySelectorAll('#featureContainerbook .carousel .carousel-item');
myCarousel4.forEach((el) => {
  const minPerSlide4 = 3
  let next4 = el.nextElementSibling
  for (var i=1; i<minPerSlide4; i++) {
    if (!next4) {
      // wrap carousel by using first child
      next4 = myCarousel4[0]
    }
    let cloneChild4 = next4.cloneNode(true)
    el.appendChild(cloneChild4.children[0])
    next4 = next4.nextElementSibling
  }
})


