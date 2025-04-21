const texts = [
    "Panamera Turbo",
    "718 Boxster",
    "TaycanS",
];
const images = ["images/5.png", "images/8.png", "images/1.png"];
let currentTextIndex = 0;
let currentImageIndex = 0;
const textElement = document.getElementById('text-slider');
const slideshow = document.getElementById('slideshow');

function changeContent() {
    textElement.classList.remove("slide-in");
    void textElement.offsetWidth;
    textElement.textContent = texts[(currentTextIndex + 1) % texts.length];
    textElement.classList.add("slide-in")
    slideshow.classList.remove("fade-in");
    void slideshow.offsetWidth;

    slideshow.src = images[(currentImageIndex + 1) % images.length];
    slideshow.classList.add("fade-in");

    currentTextIndex = (currentTextIndex + 1) % texts.length;
    currentImageIndex = (currentImageIndex + 1) % images.length;
}

setInterval(changeContent, 3000);





