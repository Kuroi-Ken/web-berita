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

        <div class="sidebar">
            <div class="menu-icon">
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
                <span class="dot active"></span>
                <span class="dot"></span>
            </div>
        </div>
    </div>
    <div class="menu2">
        ewvwbwe
        <br>nvwnvwe
        br
    </div>
    <script>
    feather.replace();

    const slides = document.querySelector('.slides');
    const dots = document.querySelectorAll('.dot');

    let index = 0;
    setInterval(() => {
        index = (index + 1) % dots.length;
        slides.style.transform = `translateX(-${index * 100}%)`;
        dots.forEach(dot => dot.classList.remove('active'));
        dots[index].classList.add('active');
    }, 5000);
    </script>
</body>

</html>