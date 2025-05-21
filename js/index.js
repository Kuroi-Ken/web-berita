// Add this JavaScript to js/index.js

// Initialize feather icons
feather.replace();

// Slider functionality from your original code
const slides = document.querySelector(".slides");
const navigationDots = document.querySelectorAll(".navigation-dots .dot");
const sidebar = document.getElementById("sidebar");
const menuIcon = document.getElementById("menuIcon");

let currentSlideIndex = 0;
let slideInterval;
const TOTAL_SLIDES = 2;

function updateSlider(newIndex) {
  newIndex = newIndex % TOTAL_SLIDES;
  slides.style.transform = `translateX(-${newIndex * 50}%)`;

  navigationDots.forEach((dot, index) => {
    if (index === newIndex) {
      dot.classList.add("active");
    } else {
      dot.classList.remove("active");
    }
  });

  currentSlideIndex = newIndex;
}

function startAutoSlide() {
  if (slideInterval) {
    clearInterval(slideInterval);
  }

  slideInterval = setInterval(() => {
    let nextSlide = (currentSlideIndex + 1) % TOTAL_SLIDES;
    updateSlider(nextSlide);
  }, 5000);
}

navigationDots.forEach((dot, index) => {
  dot.addEventListener("click", () => {
    clearInterval(slideInterval);
    updateSlider(index);
    startAutoSlide();
  });
});

menuIcon.addEventListener("click", () => {
  sidebar.classList.toggle("sidebar-expanded");
});

startAutoSlide();
updateSlider(0);

// Recommended cards slider functionality
document.addEventListener("DOMContentLoaded", function () {
  const recommendedCards = document.querySelectorAll(".recommended-card");
  const recommendedDots = document.querySelectorAll(".dots .dot");
  let currentRecommendedIndex = 0;

  function showRecommendedCard(index) {
    recommendedCards.forEach((card) => {
      card.classList.remove("active");
    });

    recommendedDots.forEach((dot) => {
      dot.classList.remove("active");
    });

    recommendedCards[index].classList.add("active");
    recommendedDots[index].classList.add("active");
  }

  recommendedDots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      currentRecommendedIndex = index;
      showRecommendedCard(currentRecommendedIndex);
    });
  });

  // Auto slide for recommended cards
  setInterval(() => {
    currentRecommendedIndex =
      (currentRecommendedIndex + 1) % recommendedCards.length;
    showRecommendedCard(currentRecommendedIndex);
  }, 5000);

  // Tab navigation functionality
  const tabs = document.querySelectorAll(".tab");
  const tabContents = document.querySelectorAll(".tab-content");

  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      // Remove active class from all tabs
      tabs.forEach((t) => t.classList.remove("active"));

      // Add active class to clicked tab
      tab.classList.add("active");

      // Hide all tab contents
      tabContents.forEach((content) => {
        content.style.display = "none";
      });

      // Show the selected tab content
      const tabName = tab.getAttribute("data-tab");
      document.getElementById(`${tabName}-content`).style.display = "block";
    });
  });
});

// Scroll effect for the topbar
document.addEventListener("DOMContentLoaded", function () {
  const topbar = document.querySelector(".topbar");
  const menu2 = document.querySelector(".menu2");

  // Set initial state
  topbar.classList.add("transparent");

  // Function to check scroll position and update topbar
  function checkScroll() {
    // Get the position of menu2
    const menu2Position = menu2.getBoundingClientRect().top;

    // If menu2 is at the top of the viewport or above, add solid class
    if (menu2Position <= 60) {
      // 60px threshold accounts for the topbar height
      topbar.classList.remove("transparent");
      topbar.classList.add("solid");
    } else {
      // Otherwise, keep it transparent
      topbar.classList.add("transparent");
      topbar.classList.remove("solid");
    }
  }

  // Add scroll event listener
  window.addEventListener("scroll", checkScroll);

  // Check initial position (in case page is loaded scrolled down)
  checkScroll();
});
