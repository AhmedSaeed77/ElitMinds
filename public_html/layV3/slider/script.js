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
let myCarousel6 = document.querySelectorAll('#featureContainer6 .carousel .carousel-item');
myCarousel6.forEach((el) => {
  const minPerSlide6 = 3
  let next6 = el.nextElementSibling
  for (var i=1; i<minPerSlide6; i++) {
    if (!next6) {
      // wrap carousel by using first child
      next6 = myCarousel6[0]
    }
    let cloneChild6 = next6.cloneNode(true)
    el.appendChild(cloneChild6.children[0])
    next6 = next6.nextElementSibling
  }
})

