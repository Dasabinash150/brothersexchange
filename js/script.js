// document.querySelector('video').playbackRate = 1.25;
const video = document.getElementById('background-video');
video.playbackRate = 0.5;


document.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('.nav-link');
    links.forEach(link => {
        link.addEventListener('click', function () {
            links.forEach(l => l.classList.remove('active')); // Remove active from all links
            this.classList.add('active'); // Add active to clicked link
        });
    });
});



// const swiper = new Swiper('.swiper', {
//     // Optional parameters
//     direction: 'horizontal',
//     loop: true,

//     // If we need pagination
//     pagination: {
//       el: '.swiper-pagination',
//     },

//     // Navigation arrows
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },

//     // And if we need scrollbar
//     scrollbar: {
//       el: '.swiper-scrollbar',
//     },
//   });

// var swiper = new Swiper(".mySwiper", {
//     effect: "coverflow",
//     grabCursor: true,
//     centeredSlides: true,
//     slidesPerView: "auto",
//     coverflowEffect: {
//       rotate: 50,
//       stretch: 0,
//       depth: 100,
//       modifier: 1,
//       slideShadows: true,
//     },
//     pagination: {
//       el: ".swiper-pagination",
//     },
//   });
var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    loop: true,
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var first_swiper = new Swiper(".FirstMySwiper ", {
    effect: "cards",
    grabCursor: true,
    loop: true,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
});



//   var swiper = new Swiper(".mySwiper", {
//     spaceBetween: 30,
//     centeredSlides: true,
//     autoplay: {
//       delay: 2500,
//       disableOnInteraction: false,
//     },
//     pagination: {
//       el: ".swiper-pagination",
//       clickable: true,
//     },
//     navigation: {
//       nextEl: ".swiper-button-next",
//       prevEl: ".swiper-button-prev",
//     },
//   });


// var waypoint = new Waypoint({
//     element: document.getElementById('px-offset-waypoint'),
//     handler: function(direction) {
//       notify('I am 20px from the top of the window')
//     },
//     offset: 20 
//   })


  $(document).ready(function(){
    $('.about-text').waypoint(function(direction){
        $('.about-text').addClass('animated bounce')
    },{
        offset: '400px'
    })
  })



// let valueDisplays = document.querySelectorAll(".c-number");
// let interval = 4000;

// valueDisplays.forEach((valueDisplay) => { // Corrected variable name
//     let startValue = 0;
//     let endValue = parseInt(valueDisplay.getAttribute("data-val"));
//     let displayType = valueDisplay.getAttribute("data-type");
//     let duration = Math.floor(interval / endValue);
    
//     let counter = setInterval(function () {
//         startValue += 1;
        
//         // Different display formats based on the type
//         if (displayType === "K+" && startValue >= 10) {
//             valueDisplay.textContent = (startValue / 10).toFixed(0) + "K+";
//         } else if (displayType === "+") {
//             valueDisplay.textContent = startValue + "+";
//         } else if (displayType === "hr") {
//             valueDisplay.textContent = startValue + "hr";
//         } else {
//             valueDisplay.textContent = startValue; // Default case
//         }

//         // Stop the counter when the target value is reached
//         if (startValue == endValue) {
//             clearInterval(counter);
//         }
    
//     }, duration);

// });

let valueDisplays = document.querySelectorAll(".c-number");
let interval = 1000;
let hasStarted = false;  // Flag to ensure counting starts only once

// Function to start counting when the section comes into view
function startCounting() {
    let section = document.querySelector('.counters'); // Section to watch

    // Get the position of the section relative to the viewport
    let sectionPosition = section.getBoundingClientRect().top;
    let screenPosition = window.innerHeight / 1.2; // Trigger when section is 80% in view

    // Check if the section is in view and if the counter hasn't started
    if (sectionPosition < screenPosition && !hasStarted) {
        hasStarted = true;  // Set the flag to prevent multiple triggers
        valueDisplays.forEach((valueDisplay) => {
            let startValue = 0;
            let endValue = parseInt(valueDisplay.getAttribute("data-val"));
            let displayType = valueDisplay.getAttribute("data-type");

            // Apply a scaling factor for large values to speed up counting
            let duration = endValue >= 1000 ? Math.floor(interval / (endValue / 1000)) : Math.floor(interval / endValue);

            let counter = setInterval(function () {
                startValue += 1;

                // Different display formats based on the type
                if (displayType === "K+" && startValue >= 10) {
                    valueDisplay.textContent = (startValue / 10).toFixed(0) + "K+";
                } else if (displayType === "+") {
                    valueDisplay.textContent = startValue + "+";
                } else if (displayType === "hr") {
                    valueDisplay.textContent = startValue + "hr";
                } else {
                    valueDisplay.textContent = startValue;  // Default case for regular numbers
                }

                // Stop the counter when the target value is reached
                if (startValue >= endValue) {
                    clearInterval(counter);
                }

            }, duration);
        });
    }
}

// Listen for scroll events and trigger the counter when the section is visible
window.addEventListener('scroll', startCounting);

