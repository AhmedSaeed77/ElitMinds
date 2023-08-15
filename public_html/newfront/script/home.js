
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