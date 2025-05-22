<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: php/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Game News</title>
    <link rel="stylesheet" href="../css/about.css">
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <div class="topbar">
        <div class="search-wrapper">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search anything...">
                <button class="search-btn">
                    <i data-feather="search"></i>
                </button>
            </div>
        </div>
        <div class="title">
            <span class="span-text">Game News</span>
        </div>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="menu-icon" id="menuIcon">
            <i data-feather="menu"></i>
        </div>
        <ul class="nav">
            <li><a href="#">Profile (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a></li>
            <li><a href="../index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="https://wa.me/6281236998967" target="_blank" rel="noopener noreferrer">Help </a></li>
            <li><a href="../php/logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="about-container">
        <div class="about-section">
            <div class="about-image-wrapper">
                <img src="../assets/champion3.png" alt="About Us" class="about-image">
            </div>
            <div class="about-content">
                <h1>About Us</h1>
                <h2>Dedicated to Gaming News & Esports</h2>
                <p>Welcome to <strong>Game News</strong>, your premier destination for the latest in the gaming world.
                    We are passionate about bringing you timely, accurate, and insightful coverage of everything from
                    breaking game updates to professional esports tournaments. Our mission is to keep you informed and
                    engaged with the dynamic universe of gaming.</p>
                <p>Founded in 2024, Game News was created by a team of dedicated gamers and industry enthusiasts who
                    recognized the need for a centralized, reliable source of gaming information. We strive to be the
                    bridge between you and the pulse of the gaming industry, providing comprehensive articles, in-depth
                    analyses, and exclusive insights.</p>
                <p>Whether you're a casual player, a hardcore competitor, or an industry professional, Game News is here
                    to provide you with the content you need. Join our community and explore the exciting world of
                    gaming with us!</p>
            </div>
        </div>
    </div>

    <script>
    feather.replace();
    const sidebar = document.getElementById("sidebar");
    const menuIcon = document.getElementById("menuIcon");
    menuIcon.addEventListener("click", () => {
        sidebar.classList.toggle("sidebar-expanded");
    });
    </script>
</body>

</html>