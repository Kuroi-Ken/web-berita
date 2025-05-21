feather.replace();

const slides = document.querySelector('.slides');
const dots = document.querySelectorAll('.dot');
const sidebar = document.getElementById('sidebar');
const menuIcon = document.getElementById('menuIcon');

let currentSlideIndex = 0;
let slideInterval;

function updateSlider(newIndex) {
    slides.style.transform = `translateX(-${newIndex * 100}%)`;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[newIndex].classList.add('active');
    currentSlideIndex = newIndex;
}

function startAutoSlide() {
    slideInterval = setInterval(() => {
        currentSlideIndex = (currentSlideIndex + 1) % dots.length;
        updateSlider(currentSlideIndex);
    }, 5000);
}

dots.forEach(dot => {
    dot.addEventListener('click', (event) => {
        clearInterval(slideInterval);
        const slideIndex = parseInt(event.target.dataset.slide);
        updateSlider(slideIndex);
        startAutoSlide();
    });
});

menuIcon.addEventListener('click', () => {
    sidebar.classList.toggle('sidebar-expanded');
});

startAutoSlide();