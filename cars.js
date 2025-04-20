let menu = document.querySelector(".menu-icon");
let navbar = document.querySelector(".navbar");

menu.onclick = () => {
  menu.classList.toggle("move");
  navbar.classList.toggle("open-menu");
};



const animate = ScrollReveal({
  origin: 'top',
  distance: '60px',
  duration: '1500',
  delay: '400',
})

animate.reveal('.nav,.heading');
animate.reveal(".home-img img", { origin: "right" });
animate.reveal(".input-form", { origin: "bottom" });
animate.reveal(".trend-box, .rental-box", { interval: 100 });



