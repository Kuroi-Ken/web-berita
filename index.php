<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: php/login.php");
    exit();
}

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="js/index.js">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <div class="menu1">
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
                <span class="span-text">Web Title</span>
            </div>
        </div>

        <div class="sidebar" id="sidebar">
            <div class="menu-icon" id="menuIcon">
                <i data-feather="menu"></i>
            </div>
            <ul class="nav">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="help.html">Help</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="slider">
            <div class="slides">
                <div class="slide slide1">
                    <h1>LOREM IPSUM</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a tortor est.</p>
                    <button class="explore">EXPLORE MORE</button>
                </div>
                <div class="slide slide2">
                    <h1>NEW LOREM</h1>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                    <button class="explore">EXPLORE MORE</button>
                </div>
            </div>
            <div class="navigation-dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
            </div>
        </div>
    </div>

    <div class="menu2">
        <div class="section recommended">
            <h2>Recommended For You</h2>
            <div class="recommended-slider">
                <div class="recommended-card active">
                    <div class="card-content">
                        <div class="text-block">
                            <h3>LOREM IPSUM</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a tortor est. Cras tempus
                                dignissim mi eget aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et
                                ultrices posuere cubilia curae;</p>
                        </div>
                        <div class="image-block">
                            <img src="images/football.png" alt="Football" />
                        </div>
                    </div>
                </div>
                <!-- Placeholder slides for carousel dots -->
                <div class="recommended-card"></div>
                <div class="recommended-card"></div>
            </div>
            <div class="dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>

        <div class="section latest-news">
            <h2>Latest News</h2>

            <div class="news-card">
                <img src="images/football.png" alt="Football">
                <div class="news-text">
                    <h3>LOREM IPSUM</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a tortor est. Cras tempus
                        dignissim mi eget aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia curae;</p>
                    <span class="time">4 Hours Ago</span>
                </div>
            </div>

            <div class="news-card">
                <img src="images/football.png" alt="Football">
                <div class="news-text">
                    <h3>LOREM IPSUM</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a tortor est. Cras tempus
                        dignissim mi eget aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia curae;</p>
                    <span class="time">4 Hours Ago</span>
                </div>
            </div>
        </div>
    </div>

    <script src="js/index.js"></script>
</body>

</html>