feather.replace();

const slides = document.querySelector(".slides");
const navigationDots = document.querySelectorAll(".navigation-dots .dot");
const sidebar = document.getElementById("sidebar");
const menuIcon = document.getElementById("menuIcon");

let currentSlideIndex = 0;
let slideInterval;
const TOTAL_SLIDES = 2;

/**
 * Updates the slider to show the specified slide
 * @param {number} newIndex - The index of the slide to show (0 or 1)
 */
function updateSlider(newIndex) {
  // Ensure newIndex is always valid (0 or 1)
  newIndex = newIndex % TOTAL_SLIDES;

  // Transform the slides container to show the selected slide
  // PERBAIKAN: Mengubah formula dari newIndex * 100% menjadi newIndex * 50%
  // Karena masing-masing slide seharusnya mengambil 50% dari lebar container
  slides.style.transform = `translateX(-${newIndex * 50}%)`;

  // Update the active state of the navigation dots
  navigationDots.forEach((dot, index) => {
    if (index === newIndex) {
      dot.classList.add("active");
    } else {
      dot.classList.remove("active");
    }
  });

  // Update the current slide index
  currentSlideIndex = newIndex;
}

/**
 * Starts the automatic slide transition
 */
function startAutoSlide() {
  // Clear any existing interval
  if (slideInterval) {
    clearInterval(slideInterval);
  }

  // Set a new interval to switch slides every 5 seconds
  slideInterval = setInterval(() => {
    // Move to the next slide (always cycling between 0 and 1)
    let nextSlide = (currentSlideIndex + 1) % TOTAL_SLIDES;
    updateSlider(nextSlide);
  }, 5000);
}

// Add click event listeners to the navigation dots
navigationDots.forEach((dot, index) => {
  dot.addEventListener("click", () => {
    // Stop the automatic slide transition
    clearInterval(slideInterval);

    // Show the selected slide
    updateSlider(index);

    // Restart the automatic slide transition
    startAutoSlide();
  });
});

// Add click event listener to the menu icon
menuIcon.addEventListener("click", () => {
  sidebar.classList.toggle("sidebar-expanded");
});

// Start the automatic slide transition when the page loads
startAutoSlide();

// Inisialisasi dengan slide pertama
updateSlider(0);
