feather.replace();

// Slider functionality
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

// Category tabs functionality
const tabs = document.querySelectorAll(".tab");
const tabIndicator = document.querySelector(".tab-indicator");
const categoryContents = document.querySelectorAll(".category-content");

// Position the tab indicator under the active tab on page load
function setTabIndicator() {
  if (!tabIndicator) return;

  const activeTab = document.querySelector(".tab.active");
  if (activeTab) {
    tabIndicator.style.left = `${activeTab.offsetLeft}px`;
    tabIndicator.style.width = `${activeTab.offsetWidth}px`;
  }
}

// Initialize tab indicator
window.addEventListener("load", setTabIndicator);
window.addEventListener("resize", setTabIndicator);

// Add click event listeners to tabs
tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    // Update active tab
    tabs.forEach((t) => t.classList.remove("active"));
    tab.classList.add("active");

    // Move tab indicator
    tabIndicator.style.left = `${tab.offsetLeft}px`;
    tabIndicator.style.width = `${tab.offsetWidth}px`;

    // Show corresponding content
    const category = tab.getAttribute("data-category");
    categoryContents.forEach((content) => {
      content.classList.remove("active");
    });

    const activeContent = document.querySelector(`.${category}-content`);
    activeContent.classList.add("active");
  });
});

// Generate dynamic content for each category
function generateNewsCards() {
  const newsContainer = document.querySelector(".news-container");
  let newsHTML = "";

  for (let i = 0; i < 5; i++) {
    const randomId = Math.floor(Math.random() * 1000);
    newsHTML += `
      <div class="news-card">
        <img src="https://picsum.photos/200/300?game&random=${randomId}" alt="Game News" class="news-card-img">
        <div class="news-card-content">
          <h3 class="news-card-title">LOREM IPSUM GAME NEWS</h3>
          <p class="news-card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a tortor est. Cras tempus dignissim mi eget aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.</p>
          <span class="news-card-time">${
            Math.floor(Math.random() * 12) + 1
          } Hours Ago</span>
        </div>
      </div>
    `;
  }

  newsContainer.innerHTML = newsHTML;
}

function generateUpdateCards() {
  const updateContainer = document.querySelector(".update-container");
  let updateHTML = "";

  for (let i = 0; i < 8; i++) {
    const randomId = Math.floor(Math.random() * 1000);
    updateHTML += `
      <div class="update-card">
        <img src="https://picsum.photos/200/300?game&random=${randomId}" alt="Game Update" class="update-card-img">
        <div class="update-card-content">
          <h3 class="update-card-title">Update ${i + 1}.0</h3>
          <p class="update-card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. New features and gameplay improvements are now available.</p>
          <span class="update-card-time">${
            Math.floor(Math.random() * 30) + 1
          } Days Ago</span>
        </div>
      </div>
    `;
  }

  updateContainer.innerHTML = updateHTML;
}

function generateTournamentCards() {
  const tournamentContainer = document.querySelector(".tournament-container");
  let tournamentHTML = "";

  const tournaments = [
    {
      name: "Championship Finals",
      date: "May 15, 2025",
      teams: [
        { name: "Team Alpha", score: Math.floor(Math.random() * 100) },
        { name: "Team Omega", score: Math.floor(Math.random() * 100) },
      ],
    },
    {
      name: "Regional Qualifier",
      date: "May 10, 2025",
      teams: [
        { name: "Thunderbolts", score: Math.floor(Math.random() * 100) },
        { name: "Phoenix Squad", score: Math.floor(Math.random() * 100) },
      ],
    },
    {
      name: "Invitational Cup",
      date: "May 5, 2025",
      teams: [
        { name: "Golden Eagles", score: Math.floor(Math.random() * 100) },
        { name: "Silver Sharks", score: Math.floor(Math.random() * 100) },
      ],
    },
    {
      name: "Pro League Finals",
      date: "April 28, 2025",
      teams: [
        { name: "Crimson Tide", score: Math.floor(Math.random() * 100) },
        { name: "Azure Knights", score: Math.floor(Math.random() * 100) },
      ],
    },
  ];

  tournaments.forEach((tournament, index) => {
    const randomId = Math.floor(Math.random() * 1000);
    tournamentHTML += `
      <div class="tournament-card">
        <img src="https://picsum.photos/200/300?game&random=${randomId}" alt="Tournament" class="tournament-card-img">
        <div class="tournament-card-content">
          <div class="tournament-card-info">
            <h3 class="tournament-card-title">${tournament.name}</h3>
            <p class="tournament-card-subtitle">Season 2025</p>
            <span class="tournament-card-time">${tournament.date}</span>
          </div>
          <div class="tournament-card-scores">
            <div class="tournament-score">
              <span class="tournament-score-team">${tournament.teams[0].name}</span>
              <span class="tournament-score-value">${tournament.teams[0].score}</span>
            </div>
            <div class="tournament-score">
              <span class="tournament-score-team">${tournament.teams[1].name}</span>
              <span class="tournament-score-value">${tournament.teams[1].score}</span>
            </div>
          </div>
        </div>
      </div>
    `;
  });

  tournamentContainer.innerHTML = tournamentHTML;
}

// Generate content on page load
window.addEventListener("load", () => {
  // Initialize slider
  startAutoSlide();
  updateSlider(0);

  // Generate content for all categories
  generateNewsCards();
  generateUpdateCards();
  generateTournamentCards();
});
