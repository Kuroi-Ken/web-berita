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

  // Search button functionality (scroll and highlight)
  const searchBtn = document.querySelector(".search-btn");
  const searchInput = document.querySelector(".search-input");
  const latestNewsSection = document.querySelector(
    "#news-content .latest-news"
  ); // Target latest news within news tab
  const newsCards = latestNewsSection
    ? latestNewsSection.querySelectorAll(".news-card")
    : [];

  // Function to clear existing highlights
  function clearHighlights(element) {
    if (element) {
      element.innerHTML = element.innerHTML.replace(
        /<span class="highlight">(.*?)<\/span>/g,
        "$1"
      );
    }
  }

  // Function to highlight text
  function highlightText(element, searchTerm) {
    if (element && searchTerm) {
      const originalText = element.textContent;
      // Escape special characters in regex
      const escapedSearchTerm = searchTerm.replace(
        /[.*+?^${}()|[\]\\]/g,
        "\\$&"
      );
      const regex = new RegExp(`(${escapedSearchTerm})`, "gi");
      element.innerHTML = originalText.replace(
        regex,
        '<span class="highlight">$1</span>'
      );
    }
  }

  // Event listener for search button click (existing functionality)
  searchBtn.addEventListener("click", () => {
    const searchTerm = searchInput.value.trim();

    // Scroll to menu2
    if (menu2) {
      menu2.scrollIntoView({ behavior: "smooth" });
    }

    // Highlight search terms in Latest News
    newsCards.forEach((card) => {
      const newsTitle = card.querySelector("h3");
      const newsParagraph = card.querySelector("p");

      // Clear previous highlights
      clearHighlights(newsTitle);
      clearHighlights(newsParagraph);

      // Apply new highlights if search term is not empty
      if (searchTerm) {
        highlightText(newsTitle, searchTerm);
        highlightText(newsParagraph, searchTerm);
      }
    });
  });

  // Event listener to scroll to menu2 when user starts typing in search input
  searchInput.addEventListener("input", function () {
    if (menu2) {
      menu2.scrollIntoView({ behavior: "smooth" });
    }
  });

  // Optional: Allow pressing Enter in search input to trigger search
  searchInput.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
      event.preventDefault(); // Prevent default form submission if it's part of a form
      searchBtn.click(); // Programmatically click the search button
    }
  });
});

// Search functionality
document.addEventListener("DOMContentLoaded", function () {
  const searchBtn = document.querySelector(".search-btn");
  const searchInput = document.querySelector(".search-input");
  const latestNewsSection = document.querySelector(
    "#news-content .latest-news"
  );
  const newsCards = latestNewsSection
    ? latestNewsSection.querySelectorAll(".news-card")
    : [];

  // Function to clear existing highlights
  function clearHighlights(element) {
    if (element) {
      element.innerHTML = element.innerHTML.replace(
        /<span class="highlight">(.*?)<\/span>/g,
        "$1"
      );
    }
  }

  // Function to highlight text
  function highlightText(element, searchTerm) {
    if (element && searchTerm) {
      const originalText = element.textContent;
      const escapedSearchTerm = searchTerm.replace(
        /[.*+?^${}()|[\]\\]/g,
        "\\$&"
      );
      const regex = new RegExp(`(${escapedSearchTerm})`, "gi");
      element.innerHTML = originalText.replace(
        regex,
        '<span class="highlight">$1</span>'
      );
    }
  }

  // Function to perform AJAX search
  async function performSearch(searchTerm) {
    if (!searchTerm.trim()) {
      return;
    }

    try {
      const response = await fetch(
        `php/search.php?q=${encodeURIComponent(searchTerm)}`
      );
      const data = await response.json();

      if (data.success) {
        displaySearchResults(data.results, searchTerm);
      } else {
        console.error("Search failed");
      }
    } catch (error) {
      console.error("Search error:", error);
    }
  }

  // Function to display search results
  function displaySearchResults(results, searchTerm) {
    const newsContent = document.getElementById("news-content");
    const latestNewsSection = newsContent.querySelector(".latest-news");

    // Clear existing news cards
    const existingCards = latestNewsSection.querySelectorAll(".news-card");
    existingCards.forEach((card) => card.remove());

    // Update section title
    const sectionTitle = latestNewsSection.querySelector("h2");
    sectionTitle.innerHTML = `Search Results for "${searchTerm}" (${results.length} found)`;

    if (results.length === 0) {
      // No results found
      const noResultsCard = document.createElement("div");
      noResultsCard.className = "news-card";
      noResultsCard.innerHTML = `
        <div class="news-text">
          <h3>NO RESULTS FOUND</h3>
          <p>Sorry, we couldn't find any news articles matching "${searchTerm}". Try using different keywords or browse our latest news below.</p>
          <span class="time">Just now</span>
        </div>
      `;
      latestNewsSection.appendChild(noResultsCard);
      return;
    }

    // Display search results
    results.forEach((article) => {
      const newsCard = document.createElement("div");
      newsCard.className = "news-card";

      // Calculate time ago
      const publishedDate = new Date(article.published_at);
      const now = new Date();
      const diffTime = Math.abs(now - publishedDate);
      const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
      const diffHours = Math.floor(diffTime / (1000 * 60 * 60));
      const diffMinutes = Math.floor(diffTime / (1000 * 60));

      let timeAgo;
      if (diffDays > 0) {
        timeAgo = `${diffDays} Day${diffDays > 1 ? "s" : ""} Ago`;
      } else if (diffHours > 0) {
        timeAgo = `${diffHours} Hour${diffHours > 1 ? "s" : ""} Ago`;
      } else {
        timeAgo = `${diffMinutes} Minute${diffMinutes > 1 ? "s" : ""} Ago`;
      }

      newsCard.innerHTML = `
        <div class="news-text">
          <h3>${article.title.toUpperCase()}</h3>
          <p>${article.excerpt}</p>
          <span class="time">${timeAgo}</span>
          <small style="color: #888; margin-left: 10px;">
            ${article.category_name} • ${article.views} views
          </small>
        </div>
      `;

      latestNewsSection.appendChild(newsCard);

      // Highlight search terms
      const titleElement = newsCard.querySelector("h3");
      const excerptElement = newsCard.querySelector("p");
      highlightText(titleElement, searchTerm);
      highlightText(excerptElement, searchTerm);
    });
  }

  // Function to reset to original news
  async function resetToOriginalNews() {
    try {
      // Reload the page to get original content
      location.reload();
    } catch (error) {
      console.error("Error resetting news:", error);
    }
  }

  // Event listener for search button click
  searchBtn.addEventListener("click", (e) => {
    e.preventDefault();
    const searchTerm = searchInput.value.trim();

    if (searchTerm) {
      // Switch to news tab if not already active
      const newsTab = document.querySelector('.tab[data-tab="news"]');
      const newsContent = document.getElementById("news-content");

      // Activate news tab
      document
        .querySelectorAll(".tab")
        .forEach((tab) => tab.classList.remove("active"));
      document
        .querySelectorAll(".tab-content")
        .forEach((content) => (content.style.display = "none"));

      newsTab.classList.add("active");
      newsContent.style.display = "block";

      // Scroll to news section smoothly
      const menu2 = document.querySelector(".menu2");
      if (menu2) {
        menu2.scrollIntoView({ behavior: "smooth" });
      }

      // Perform search
      performSearch(searchTerm);
    }
  });

  // Event listener for Enter key in search input
  searchInput.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
      event.preventDefault();
      searchBtn.click();
    }
  });

  // Event listener for input changes (live search - optional)
  let searchTimeout;
  searchInput.addEventListener("input", function () {
    const searchTerm = this.value.trim();

    // Clear previous timeout
    clearTimeout(searchTimeout);

    // If search is empty, reset to original news
    if (!searchTerm) {
      const sectionTitle = document.querySelector(
        "#news-content .latest-news h2"
      );
      if (sectionTitle && sectionTitle.textContent.includes("Search Results")) {
        resetToOriginalNews();
      }
      return;
    }

    // Scroll to news section when user starts typing
    const menu2 = document.querySelector(".menu2");
    if (menu2) {
      menu2.scrollIntoView({ behavior: "smooth" });
    }

    // Perform search after 500ms delay (debounce)
    searchTimeout = setTimeout(() => {
      if (searchTerm.length >= 2) {
        // Minimum 2 characters
        performSearch(searchTerm);
      }
    }, 500);
  });

  // Add clear search functionality
  const clearSearchBtn = document.createElement("button");
  clearSearchBtn.innerHTML = "×";
  clearSearchBtn.className = "clear-search-btn";
  clearSearchBtn.style.cssText = `
    position: absolute;
    right: 50px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #999;
    font-size: 20px;
    cursor: pointer;
    display: none;
    z-index: 10;
  `;

  // Add clear button to search container
  const searchContainer = document.querySelector(".search-container");
  searchContainer.style.position = "relative";
  searchContainer.appendChild(clearSearchBtn);

  // Show/hide clear button
  searchInput.addEventListener("input", function () {
    clearSearchBtn.style.display = this.value.trim() ? "block" : "none";
  });

  // Clear search functionality
  clearSearchBtn.addEventListener("click", function (e) {
    e.preventDefault();
    searchInput.value = "";
    clearSearchBtn.style.display = "none";

    // Reset to original news if currently showing search results
    const sectionTitle = document.querySelector(
      "#news-content .latest-news h2"
    );
    if (sectionTitle && sectionTitle.textContent.includes("Search Results")) {
      resetToOriginalNews();
    }
  });
});
