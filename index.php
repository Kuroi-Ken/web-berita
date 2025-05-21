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
            <li><a href="about.html">About</a></li>
            <li><a href="help.html">Help</a></li>
            <li><a href="php/logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="content">
    </div>

    <script>
    feather.replace();

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
    </script>
</body>

</html>