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
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://unpkg.com/feather-icons">
    </script>
</head>

<body>
    <div class="menu1">
        <div class="topbar">
            <div class="search-wrapper">
                <div class="search-container">
                    <input type="text"
                        class="search-input"
                        placeholder="Search anything...">
                    <button class="search-btn">
                        <i
                            data-feather="search"></i>
                    </button>
                </div>
            </div>
            <div class="title">
                <span class="span-text">Web
                    Title</span>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="menu-icon" id="menuIcon">
                <i data-feather="menu"></i>
            </div>
            <ul class="nav">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="about.html">About</a>
                </li>
                <li><a href="help.html">Help</a>
                </li>
                <li><a
                        href="php/logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="slider">
            <div class="slides">
                <div class="slide slide1">
                    <h1>LOREM IPSUM</h1>
                    <p>Lorem ipsum dolor sit amet,
                        consectetur adipiscing
                        elit. Fusce a tortor est.
                    </p>
                    <button
                        class="explore">EXPLORE
                        MORE</button>
                </div>
                <div class="slide slide2">
                    <h1>NEW LOREM</h1>
                    <p>Ut enim ad minim veniam,
                        quis nostrud exercitation
                        ullamco laboris nisi ut
                        aliquip.</p>
                    <button
                        class="explore">EXPLORE
                        MORE</button>
                </div>
            </div>
            <div class="navigation-dots">
                <span class="dot active"
                    data-slide="0"></span>
                <span class="dot"
                    data-slide="1"></span>
            </div>
        </div>
    </div>

    <div class="menu2">
        <!-- Tab Navigation -->
        <div class="tab-navigation">
            <div class="tab active"
                data-tab="news">News</div>
            <div class="tab" data-tab="update">
                Update</div>
            <div class="tab"
                data-tab="tournament-score">
                Tournament Score</div>
        </div>

        <!-- News Tab Content -->
        <div class="tab-content"
            id="news-content">
            <!-- Recommended For You section - Updated to match design -->
            <div class="section recommended">
                <h2>Recommended For You</h2>
                <div class="recommended-slider">
                    <div
                        class="recommended-card active">
                        <div class="card-content">
                            <div
                                class="text-block">
                                <h3>LOREM IPSUM
                                </h3>
                                <p>Lorem ipsum
                                    dolor sit
                                    amet,
                                    consectetur
                                    adipiscing
                                    elit. Fusce a
                                    tortor est.
                                    Cras tempus
                                    dignissim mi
                                    eget aliquam.
                                    Vestibulum
                                    ante ipsum
                                    primis in
                                    faucibus orci
                                    luctus et
                                    ultrices
                                    posuere
                                    cubilia curae;
                                </p>
                            </div>
                            <div
                                class="image-block">
                                <img src="images/football.png"
                                    alt="Football" />
                            </div>
                        </div>
                    </div>
                    <div class="recommended-card">
                        <!-- Second card content -->
                    </div>
                    <div class="recommended-card">
                        <!-- Third card content -->
                    </div>
                </div>
                <div class="dots">
                    <span
                        class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>

            <!-- Latest News section -->
            <div class="section latest-news">
                <h2>Latest News</h2>
                <div class="news-card">
                    <img src="images/football.png"
                        alt="Football">
                    <div class="news-text">
                        <h3>LOREM IPSUM</h3>
                        <p>Lorem ipsum dolor sit
                            amet, consectetur
                            adipiscing elit. Fusce
                            a tortor est. Cras
                            tempus dignissim mi
                            eget aliquam.
                            Vestibulum ante ipsum
                            primis in faucibus
                            orci luctus et
                            ultrices posuere
                            cubilia curae;</p>
                        <span class="time">4 Hours
                            Ago</span>
                    </div>
                </div>
                <div class="news-card">
                    <img src="images/football.png"
                        alt="Football">
                    <div class="news-text">
                        <h3>LOREM IPSUM</h3>
                        <p>Lorem ipsum dolor sit
                            amet, consectetur
                            adipiscing elit. Fusce
                            a tortor est. Cras
                            tempus dignissim mi
                            eget aliquam.
                            Vestibulum ante ipsum
                            primis in faucibus
                            orci luctus et
                            ultrices posuere
                            cubilia curae;</p>
                        <span class="time">4 Hours
                            Ago</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Tab Content -->
        <!-- Enhanced Update Tab Content -->
        <div class="tab-content"
            id="update-content"
            style="display: none;">
            <!-- Game Updates Section -->
            <div class="section updates">
                <h2>Game Updates</h2>
                <div class="update-card">
                    <div class="update-header">
                        <div class="update-title">
                            FIFA 2025 New Features
                        </div>
                        <div class="update-date">
                            May 22, 2025</div>
                    </div>
                    <div class="update-content">
                        <div class="update-image">
                            <img src="images/fifa-update.jpg"
                                alt="FIFA 2025 Update">
                        </div>
                        <p>EA Sports has announced
                            the newest features
                            for FIFA 2025,
                            including
                            revolutionary
                            AI-powered player
                            movement and
                            ultra-realistic
                            stadium atmospheres.
                            The game will
                            introduce a completely
                            revamped career mode
                            with enhanced transfer
                            negotiations and
                            player development
                            systems.</p>
                        <div
                            class="update-features">
                            <div class="feature">
                                <i
                                    data-feather="cpu"></i>
                                <span>Advanced
                                    AI</span>
                            </div>
                            <div class="feature">
                                <i
                                    data-feather="users"></i>
                                <span>Team
                                    Chemistry</span>
                            </div>
                            <div class="feature">
                                <i
                                    data-feather="trending-up"></i>
                                <span>Career
                                    Evolution</span>
                            </div>
                        </div>
                        <button
                            class="read-more-btn">Read
                            Full Article</button>
                    </div>
                </div>

                <div class="update-card">
                    <div class="update-header">
                        <div class="update-title">
                            Pro Evolution Soccer
                            2025 Announced</div>
                        <div class="update-date">
                            May 19, 2025</div>
                    </div>
                    <div class="update-content">
                        <div class="update-image">
                            <img src="images/pes-update.jpg"
                                alt="PES 2025 Announcement">
                        </div>
                        <p>Konami has revealed Pro
                            Evolution Soccer 2025
                            with an emphasis on
                            tactical gameplay and
                            enhanced ball physics.
                            The new game
                            introduces over 200
                            authentic teams with
                            official licenses,
                            including exclusive
                            rights to several
                            major European clubs.
                        </p>
                        <div
                            class="update-features">
                            <div class="feature">
                                <i
                                    data-feather="droplet"></i>
                                <span>Realistic
                                    Physics</span>
                            </div>
                            <div class="feature">
                                <i
                                    data-feather="shuffle"></i>
                                <span>Tactical
                                    Options</span>
                            </div>
                            <div class="feature">
                                <i
                                    data-feather="shield"></i>
                                <span>Official
                                    Licenses</span>
                            </div>
                        </div>
                        <button
                            class="read-more-btn">Read
                            Full Article</button>
                    </div>
                </div>
            </div>

            <!-- Game News Section -->
            <div class="section game-news">
                <h2>Game Industry News</h2>
                <div class="update-card">
                    <div class="update-header">
                        <div class="update-title">
                            EA Sports Partners
                            with Champions League
                        </div>
                        <div class="update-date">
                            May 17, 2025</div>
                    </div>
                    <div class="update-content">
                        <div class="update-image">
                            <img src="images/champions-league.jpg"
                                alt="Champions League Partnership">
                        </div>
                        <p>Electronic Arts has
                            signed a new 5-year
                            exclusive partnership
                            with UEFA to feature
                            Champions League
                            content in its FIFA
                            series. The deal
                            includes detailed
                            recreation of the
                            tournament format,
                            official branding, and
                            exclusive in-game
                            events tied to real
                            Champions League
                            matches.</p>
                        <div
                            class="video-preview">
                            <div
                                class="video-thumbnail">
                                <img src="images/champions-video.jpg"
                                    alt="Partnership Announcement">
                                <div
                                    class="play-button">
                                    <i
                                        data-feather="play"></i>
                                </div>
                            </div>
                            <div
                                class="video-info">
                                <div
                                    class="video-title">
                                    EA Sports x
                                    Champions
                                    League -
                                    Official
                                    Partnership
                                </div>
                                <div
                                    class="video-duration">
                                    4:25</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="update-card">
                    <div class="update-header">
                        <div class="update-title">
                            Football Manager 2026
                            Development Begins
                        </div>
                        <div class="update-date">
                            May 15, 2025</div>
                    </div>
                    <div class="update-content">
                        <div class="update-image">
                            <img src="images/football-manager.jpg"
                                alt="Football Manager 2026">
                        </div>
                        <p>Sports Interactive has
                            started development on
                            Football Manager 2026,
                            promising the most
                            comprehensive overhaul
                            of the series in a
                            decade. The new
                            version will feature a
                            completely redesigned
                            match engine with
                            motion-captured
                            animations and
                            enhanced tactical
                            options.</p>
                        <div class="update-quote">
                            <blockquote>
                                "We're reimagining
                                what a football
                                management
                                simulation can be.
                                FM26 will be our
                                most ambitious
                                project to date."
                            </blockquote>
                            <cite>— Miles
                                Jacobson, Studio
                                Director</cite>
                        </div>
                        <button
                            class="read-more-btn">Read
                            Full Article</button>
                    </div>
                </div>
            </div>

            <!-- App Updates Section -->
            <div class="section app-updates">
                <h2>Our App Updates</h2>
                <div class="update-card app-card">
                    <div class="update-header">
                        <div class="update-title">
                            Game News Mobile App
                            2.0</div>
                        <div class="update-date">
                            May 20, 2025</div>
                    </div>
                    <div class="update-content">
                        <p>We're excited to
                            announce the release
                            of Game News 2.0 for
                            iOS and Android! Our
                            completely redesigned
                            app offers
                            personalized news
                            feeds, live match
                            notifications, and
                            seamless video
                            playback.</p>
                        <div class="app-features">
                            <div
                                class="app-feature">
                                <div
                                    class="feature-icon">
                                    <i
                                        data-feather="bell"></i>
                                </div>
                                <div
                                    class="feature-details">
                                    <h4>Customizable
                                        Alerts
                                    </h4>
                                    <p>Get
                                        notifications
                                        only for
                                        the teams
                                        and
                                        tournaments
                                        you care
                                        about.</p>
                                </div>
                            </div>
                            <div
                                class="app-feature">
                                <div
                                    class="feature-icon">
                                    <i
                                        data-feather="video"></i>
                                </div>
                                <div
                                    class="feature-details">
                                    <h4>Match
                                        Highlights
                                    </h4>
                                    <p>Watch key
                                        moments
                                        from games
                                        with our
                                        integrated
                                        video
                                        player.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="app-feature">
                                <div
                                    class="feature-icon">
                                    <i
                                        data-feather="share-2"></i>
                                </div>
                                <div
                                    class="feature-details">
                                    <h4>Social
                                        Integration
                                    </h4>
                                    <p>Share
                                        stories
                                        and
                                        highlights
                                        directly
                                        to social
                                        media
                                        platforms.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="app-download">
                            <button
                                class="app-button">
                                <i
                                    data-feather="smartphone"></i>
                                <span>App
                                    Store</span>
                            </button>
                            <button
                                class="app-button">
                                <i
                                    data-feather="smartphone"></i>
                                <span>Google
                                    Play</span>
                            </button>
                        </div>
                        <div class="app-rating">
                            <div class="stars">
                                <i
                                    data-feather="star"></i>
                                <i
                                    data-feather="star"></i>
                                <i
                                    data-feather="star"></i>
                                <i
                                    data-feather="star"></i>
                                <i
                                    data-feather="star"></i>
                            </div>
                            <span
                                class="rating-text">4.8/5
                                from 12,546
                                reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tournament Score Tab Content -->
        <!-- Enhanced Tournament Score Tab Content -->
        <div class="tab-content"
            id="tournament-score-content"
            style="display: none;">
            <!-- Tournament Standings Section -->
            <div
                class="section tournament-standings">
                <h2>Premier League Standings</h2>
                <div class="standings-table">
                    <div class="standings-header">
                        <div class="rank-col">Pos
                        </div>
                        <div class="team-col">Club
                        </div>
                        <div class="played-col">MP
                        </div>
                        <div class="win-col">W
                        </div>
                        <div class="draw-col">D
                        </div>
                        <div class="loss-col">L
                        </div>
                        <div class="gf-col">GF
                        </div>
                        <div class="ga-col">GA
                        </div>
                        <div class="gd-col">GD
                        </div>
                        <div class="points-col">
                            Pts</div>
                    </div>
                    <div class="standings-row">
                        <div class="rank-col">1
                        </div>
                        <div class="team-col"><img
                                src="images/arsenal.png"
                                alt="Arsenal"
                                class="team-logo-small">Arsenal
                        </div>
                        <div class="played-col">37
                        </div>
                        <div class="win-col">27
                        </div>
                        <div class="draw-col">5
                        </div>
                        <div class="loss-col">5
                        </div>
                        <div class="gf-col">89
                        </div>
                        <div class="ga-col">28
                        </div>
                        <div class="gd-col">+61
                        </div>
                        <div class="points-col">86
                        </div>
                    </div>
                    <div class="standings-row">
                        <div class="rank-col">2
                        </div>
                        <div class="team-col"><img
                                src="images/city.png"
                                alt="Man City"
                                class="team-logo-small">Manchester
                            City</div>
                        <div class="played-col">36
                        </div>
                        <div class="win-col">26
                        </div>
                        <div class="draw-col">7
                        </div>
                        <div class="loss-col">3
                        </div>
                        <div class="gf-col">93
                        </div>
                        <div class="ga-col">35
                        </div>
                        <div class="gd-col">+58
                        </div>
                        <div class="points-col">85
                        </div>
                    </div>
                    <div class="standings-row">
                        <div class="rank-col">3
                        </div>
                        <div class="team-col"><img
                                src="images/liverpool.png"
                                alt="Liverpool"
                                class="team-logo-small">Liverpool
                        </div>
                        <div class="played-col">37
                        </div>
                        <div class="win-col">24
                        </div>
                        <div class="draw-col">10
                        </div>
                        <div class="loss-col">3
                        </div>
                        <div class="gf-col">86
                        </div>
                        <div class="ga-col">39
                        </div>
                        <div class="gd-col">+47
                        </div>
                        <div class="points-col">82
                        </div>
                    </div>
                    <div class="standings-row">
                        <div class="rank-col">4
                        </div>
                        <div class="team-col"><img
                                src="images/villa.png"
                                alt="Aston Villa"
                                class="team-logo-small">Aston
                            Villa</div>
                        <div class="played-col">37
                        </div>
                        <div class="win-col">20
                        </div>
                        <div class="draw-col">8
                        </div>
                        <div class="loss-col">9
                        </div>
                        <div class="gf-col">76
                        </div>
                        <div class="ga-col">51
                        </div>
                        <div class="gd-col">+25
                        </div>
                        <div class="points-col">68
                        </div>
                    </div>
                    <div class="standings-row">
                        <div class="rank-col">5
                        </div>
                        <div class="team-col"><img
                                src="images/spurs.png"
                                alt="Tottenham"
                                class="team-logo-small">Tottenham
                        </div>
                        <div class="played-col">37
                        </div>
                        <div class="win-col">19
                        </div>
                        <div class="draw-col">6
                        </div>
                        <div class="loss-col">12
                        </div>
                        <div class="gf-col">71
                        </div>
                        <div class="ga-col">59
                        </div>
                        <div class="gd-col">+12
                        </div>
                        <div class="points-col">63
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Results Section -->
            <div class="section recent-results">
                <h2>Recent Match Results</h2>
                <div class="result-card">
                    <div class="match-info">
                        <span
                            class="match-date">May
                            21, 2025</span>
                        <span
                            class="match-league">Premier
                            League</span>
                    </div>
                    <div class="match-result">
                        <div
                            class="team home-team">
                            <img src="images/arsenal.png"
                                alt="Arsenal"
                                class="team-logo">
                            <span
                                class="team-name">Arsenal</span>
                        </div>
                        <div class="score">
                            <span
                                class="home-score">3</span>
                            <span
                                class="score-divider">:</span>
                            <span
                                class="away-score">0</span>
                        </div>
                        <div
                            class="team away-team">
                            <img src="images/everton.png"
                                alt="Everton"
                                class="team-logo">
                            <span
                                class="team-name">Everton</span>
                        </div>
                    </div>
                    <div class="match-goals">
                        <div class="home-goals">
                            <span>Saka 14',
                                Odegaard 36',
                                Havertz 78'</span>
                        </div>
                        <div class="away-goals">
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="result-card">
                    <div class="match-info">
                        <span
                            class="match-date">May
                            19, 2025</span>
                        <span
                            class="match-league">Premier
                            League</span>
                    </div>
                    <div class="match-result">
                        <div
                            class="team home-team">
                            <img src="images/city.png"
                                alt="Manchester City"
                                class="team-logo">
                            <span
                                class="team-name">Manchester
                                City</span>
                        </div>
                        <div class="score">
                            <span
                                class="home-score">4</span>
                            <span
                                class="score-divider">:</span>
                            <span
                                class="away-score">1</span>
                        </div>
                        <div
                            class="team away-team">
                            <img src="images/west-ham.png"
                                alt="West Ham"
                                class="team-logo">
                            <span
                                class="team-name">West
                                Ham</span>
                        </div>
                    </div>
                    <div class="match-goals">
                        <div class="home-goals">
                            <span>Haaland 12',
                                45', De Bruyne
                                33', Foden
                                67'</span>
                        </div>
                        <div class="away-goals">
                            <span>Bowen 28'</span>
                        </div>
                    </div>
                </div>

                <div class="result-card">
                    <div class="match-info">
                        <span
                            class="match-date">May
                            19, 2025</span>
                        <span
                            class="match-league">Premier
                            League</span>
                    </div>
                    <div class="match-result">
                        <div
                            class="team home-team">
                            <img src="images/liverpool.png"
                                alt="Liverpool"
                                class="team-logo">
                            <span
                                class="team-name">Liverpool</span>
                        </div>
                        <div class="score">
                            <span
                                class="home-score">2</span>
                            <span
                                class="score-divider">:</span>
                            <span
                                class="away-score">0</span>
                        </div>
                        <div
                            class="team away-team">
                            <img src="images/wolves.png"
                                alt="Wolves"
                                class="team-logo">
                            <span
                                class="team-name">Wolves</span>
                        </div>
                    </div>
                    <div class="match-goals">
                        <div class="home-goals">
                            <span>Salah 45+2',
                                Núñez 76'</span>
                        </div>
                        <div class="away-goals">
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Fixtures Section -->
            <div
                class="section upcoming-fixtures">
                <h2>Upcoming Fixtures</h2>
                <div class="fixture-card">
                    <div class="fixture-date">
                        Sunday, May 25, 2025</div>
                    <div class="fixture-match">
                        <div
                            class="team home-team">
                            <img src="images/city.png"
                                alt="Man City"
                                class="team-logo">
                            <span
                                class="team-name">Manchester
                                City</span>
                        </div>
                        <div class="fixture-time">
                            16:00</div>
                        <div
                            class="team away-team">
                            <img src="images/arsenal.png"
                                alt="Arsenal"
                                class="team-logo">
                            <span
                                class="team-name">Arsenal</span>
                        </div>
                    </div>
                    <div class="fixture-venue">
                        Etihad Stadium</div>
                </div>

                <div class="fixture-card">
                    <div class="fixture-date">
                        Sunday, May 25, 2025</div>
                    <div class="fixture-match">
                        <div
                            class="team home-team">
                            <img src="images/united.png"
                                alt="Man United"
                                class="team-logo">
                            <span
                                class="team-name">Manchester
                                United</span>
                        </div>
                        <div class="fixture-time">
                            15:00</div>
                        <div
                            class="team away-team">
                            <img src="images/liverpool.png"
                                alt="Liverpool"
                                class="team-logo">
                            <span
                                class="team-name">Liverpool</span>
                        </div>
                    </div>
                    <div class="fixture-venue">Old
                        Trafford</div>
                </div>

                <div class="fixture-card">
                    <div class="fixture-date">
                        Saturday, May 24, 2025
                    </div>
                    <div class="fixture-match">
                        <div
                            class="team home-team">
                            <img src="images/chelsea.png"
                                alt="Chelsea"
                                class="team-logo">
                            <span
                                class="team-name">Chelsea</span>
                        </div>
                        <div class="fixture-time">
                            17:30</div>
                        <div
                            class="team away-team">
                            <img src="images/spurs.png"
                                alt="Tottenham"
                                class="team-logo">
                            <span
                                class="team-name">Tottenham</span>
                        </div>
                    </div>
                    <div class="fixture-venue">
                        Stamford Bridge</div>
                </div>
            </div>
        </div>
    </div>



    <script src="js/index.js"></script>
</body>

</html>