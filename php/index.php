<?php
session_start();

// Redirect jika tidak login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Cegah halaman di-cache oleh browser
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    <div class="sidebar">
        <div class="menu-icon">
            <i data-feather="menu"></i>
        </div>
        <ul class="nav">
            <li><a href="#">Profile</a></li>
            <li><a href="#">Home</a></li>
            <!-- <li><a class="Profile" href="#">Game
                    <i class="arrow" data-feather="chevron-right"></i>
                </a>
                <ul class="home">
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Menu</a></li>
                </ul>
            </li> -->
            <li><a href="about.html">About</a></li>
            <li><a href="help.html">Help</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="content"></div>

    <script>
    feather.replace();

    <
    script >
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

    // Hapus cache dengan cara paksa refresh saat kembali
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
    </script>

    </script>
</body>

</html>