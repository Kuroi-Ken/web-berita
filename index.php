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
    <link rel="stylesheet" href="css/tourscore.css">
    <link rel="stylesheet" href="css/updates.css">
    <script src="https://unpkg.com/feather-icons">
    </script>
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
                <li><a href="php/logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="slider">
            <div class="slides">
                <div class="slide slide1">
                    <h1>League of Legends</h1>
                    <p>Team Esport Shanghai Berhasil Memenangkan Kejuaraan League of Legends World Champion
                    </p>
                    <button class="explore">EXPLORE
                        MORE</button>
                </div>
                <div class="slide slide2">
                    <h1>Valorant</h1>
                    <p>Valorant Champions 2024: Trace Esports Melaju ke Babak Playoff, Kalahkan Juara VCT America!</p>
                    <button class="explore">EXPLORE
                        MORE</button>
                </div>
            </div>
            <div class="navigation-dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
            </div>
        </div>
    </div>

    <div class="menu2">
        <!-- Tab Navigation -->
        <div class="tab-navigation">
            <div class="tab active" data-tab="news">News</div>
            <div class="tab" data-tab="update">
                Update</div>
            <div class="tab" data-tab="tournament-score">
                Tournament Score</div>
        </div>

        <!-- News Tab Content -->
        <div class="tab-content" id="news-content">
            <!-- Recommended For You section - Updated to match design -->
            <div class="section recommended">
                <h2>Recommended For You</h2>
                <div class="recommended-slider">
                    <div class="recommended-card active">
                        <div class="card-content">
                            <div class="text-block">
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
                            <div class="image-block">
                                <img src="images/football.png" alt="Football" />
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
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>

            <!-- Latest News section -->
            <div class="section latest-news">
                <h2>Latest News</h2>
                <div class="news-card">
                    <img src="images/football.png" alt="Football">
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
                    <img src="images/football.png" alt="Football">
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
                    <img src="images/football.png" alt="Football">
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
                    <img src="images/football.png" alt="Football">
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
                    <img src="images/football.png" alt="Football">
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
    </div>

    <!-- Update Tab Content -->
    <!-- Enhanced Update Tab Content -->
    <div class="tab-content" id="update-content" style="display: none;">
        <!-- Game Updates Section -->
        <div class="section updates">
            <h2>Game Updates</h2>
            <div class="update-card">
                <div class="update-header">
                    <div class="update-title">
                        FIFA
                        2025 New Features
                    </div>
                    <div class="update-date">
                        May 22,
                        2025</div>
                </div>
                <div class="update-content">
                    <div class="update-image">
                        <img src="images/fifa-update.jpg" alt="FIFA 2025 Update">
                    </div>
                    <p>EA Sports has announced
                        the
                        newest features for
                        FIFA 2025,
                        including
                        revolutionary
                        AI-powered player
                        movement and
                        ultra-realistic
                        stadium
                        atmospheres. The game
                        will
                        introduce a completely
                        revamped career mode
                        with
                        enhanced transfer
                        negotiations
                        and player development
                        systems.</p>
                    <div class="update-features">
                        <div class="feature">
                            <i data-feather="cpu"></i>
                            <span>Advanced
                                AI</span>
                        </div>
                        <div class="feature">
                            <i data-feather="users"></i>
                            <span>Team
                                Chemistry</span>
                        </div>
                        <div class="feature">
                            <i data-feather="trending-up"></i>
                            <span>Career
                                Evolution</span>
                        </div>
                    </div>
                    <button class="read-more-btn">Read
                        Full Article</button>
                </div>
            </div>

            <div class="update-card">
                <div class="update-header">
                    <div class="update-title">
                        Pro
                        Evolution Soccer 2025
                        Announced</div>
                    <div class="update-date">
                        May 19,
                        2025</div>
                </div>
                <div class="update-content">
                    <div class="update-image">
                        <img src="images/pes-update.jpg" alt="PES 2025 Announcement">
                    </div>
                    <p>Konami has revealed Pro
                        Evolution Soccer 2025
                        with an
                        emphasis on tactical
                        gameplay
                        and enhanced ball
                        physics. The
                        new game introduces
                        over 200
                        authentic teams with
                        official
                        licenses, including
                        exclusive
                        rights to several
                        major
                        European clubs.</p>
                    <div class="update-features">
                        <div class="feature">
                            <i data-feather="droplet"></i>
                            <span>Realistic
                                Physics</span>
                        </div>
                        <div class="feature">
                            <i data-feather="shuffle"></i>
                            <span>Tactical
                                Options</span>
                        </div>
                        <div class="feature">
                            <i data-feather="shield"></i>
                            <span>Official
                                Licenses</span>
                        </div>
                    </div>
                    <button class="read-more-btn">Read
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
                        EA
                        Sports Partners with
                        Champions
                        League</div>
                    <div class="update-date">
                        May 17,
                        2025</div>
                </div>
                <div class="update-content">
                    <div class="update-image">
                        <img src="images/champions-league.jpg" alt="Champions League Partnership">
                    </div>
                    <p>Electronic Arts has
                        signed a
                        new 5-year exclusive
                        partnership with UEFA
                        to
                        feature Champions
                        League
                        content in its FIFA
                        series.
                        The deal includes
                        detailed
                        recreation of the
                        tournament
                        format, official
                        branding, and
                        exclusive in-game
                        events tied
                        to real Champions
                        League
                        matches.</p>
                    <div class="video-preview">
                        <div class="video-thumbnail">
                            <div class="play-button">
                                <i data-feather="play"></i>
                            </div>
                        </div>
                        <div class="video-info">
                            <div class="video-title">
                                EA Sports x
                                Champions
                                League -
                                Official
                                Partnership
                            </div>
                            <div class="video-duration">
                                4:25</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="update-card">
                <div class="update-header">
                    <div class="update-title">
                        Football
                        Manager 2026
                        Development
                        Begins</div>
                    <div class="update-date">
                        May 15,
                        2025</div>
                </div>
                <div class="update-content">
                    <div class="update-image">
                        <img src="images/football-manager.jpg" alt="Football Manager 2026">
                    </div>
                    <p>Sports Interactive has
                        started
                        development on
                        Football
                        Manager 2026,
                        promising the
                        most comprehensive
                        overhaul of
                        the series in a
                        decade. The
                        new version will
                        feature a
                        completely redesigned
                        match
                        engine with
                        motion-captured
                        animations and
                        enhanced
                        tactical options.</p>
                    <div class="update-quote">
                        <blockquote>
                            "We're reimagining
                            what a
                            football
                            management
                            simulation can be.
                            FM26
                            will be our most
                            ambitious
                            project to date."
                        </blockquote>
                        <cite>— Miles
                            Jacobson, Studio
                            Director</cite>
                    </div>
                    <button class="read-more-btn">Read
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
                        Game
                        News Mobile App 2.0
                    </div>
                    <div class="update-date">
                        May 20,
                        2025</div>
                </div>
                <div class="update-content">
                    <p>We're excited to
                        announce the
                        release of Game News
                        2.0 for
                        iOS and Android! Our
                        completely redesigned
                        app
                        offers personalized
                        news
                        feeds, live match
                        notifications, and
                        seamless
                        video playback.</p>
                    <div class="app-features">
                        <div class="app-feature">
                            <div class="feature-icon">
                                <i data-feather="bell"></i>
                            </div>
                            <div class="feature-details">
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
                                    about.
                                </p>
                            </div>
                        </div>
                        <div class="app-feature">
                            <div class="feature-icon">
                                <i data-feather="video"></i>
                            </div>
                            <div class="feature-details">
                                <h4>Match
                                    Highlights
                                </h4>
                                <p>Watch key
                                    moments
                                    from games
                                    with
                                    our
                                    integrated
                                    video
                                    player.
                                </p>
                            </div>
                        </div>
                        <div class="app-feature">
                            <div class="feature-icon">
                                <i data-feather="share-2"></i>
                            </div>
                            <div class="feature-details">
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
                </div>
            </div>
        </div>
    </div>

    <!-- Tournament Score Tab Content -->
    <!-- Esports Tournament Score Tab Content -->
    <div class="tab-content" id="tournament-score-content" style="display: none;">
        <!-- Valorant Tournament Section -->
        <div class="section tournament-standings">
            <h2>Valorant Champions Tour 2025
            </h2>
            <div class="esports-header">
                <div class="esports-logo">
                    <img src="images/valorant-logo.png" alt="Valorant Logo">
                </div>
                <div class="tournament-info">
                    <div class="tournament-title">
                        Masters Tokyo</div>
                    <div class="tournament-date">
                        May
                        15-22, 2025</div>
                    <div class="prize-pool">
                        $1,000,000
                        Prize Pool</div>
                </div>
            </div>

            <div class="standings-table">
                <div class="standings-header">
                    <div class="rank-col">Rank
                    </div>
                    <div class="team-col">Team
                    </div>
                    <div class="region-col">
                        Region
                    </div>
                    <div class="match-col">
                        Matches
                    </div>
                    <div class="win-col">W
                    </div>
                    <div class="loss-col">L
                    </div>
                    <div class="points-col">
                        Points
                    </div>
                </div>
                <div class="standings-row">
                    <div class="rank-col">1
                    </div>
                    <div class="team-col">
                        <img src="images/sentinels.png" alt="Sentinels" class="team-logo-small">
                        <span>Sentinels</span>
                    </div>
                    <div class="region-col">NA
                    </div>
                    <div class="match-col">8
                    </div>
                    <div class="win-col">7
                    </div>
                    <div class="loss-col">1
                    </div>
                    <div class="points-col">
                        450</div>
                </div>
                <div class="standings-row">
                    <div class="rank-col">2
                    </div>
                    <div class="team-col">
                        <img src="images/fnatic.png" alt="Fnatic" class="team-logo-small">
                        <span>Fnatic</span>
                    </div>
                    <div class="region-col">
                        EMEA</div>
                    <div class="match-col">8
                    </div>
                    <div class="win-col">6
                    </div>
                    <div class="loss-col">2
                    </div>
                    <div class="points-col">
                        400</div>
                </div>
                <div class="standings-row">
                    <div class="rank-col">3
                    </div>
                    <div class="team-col">
                        <img src="images/drx.png" alt="DRX" class="team-logo-small">
                        <span>DRX</span>
                    </div>
                    <div class="region-col">KR
                    </div>
                    <div class="match-col">8
                    </div>
                    <div class="win-col">6
                    </div>
                    <div class="loss-col">2
                    </div>
                    <div class="points-col">
                        380</div>
                </div>
                <div class="standings-row">
                    <div class="rank-col">4
                    </div>
                    <div class="team-col">
                        <img src="images/loud.png" alt="LOUD" class="team-logo-small">
                        <span>LOUD</span>
                    </div>
                    <div class="region-col">BR
                    </div>
                    <div class="match-col">8
                    </div>
                    <div class="win-col">5
                    </div>
                    <div class="loss-col">3
                    </div>
                    <div class="points-col">
                        320</div>
                </div>
            </div>

            <!-- Valorant Recent Match -->
            <div class="result-card featured-match">
                <div class="match-info">
                    <span class="tournament-name">VCT
                        Masters Tokyo</span>
                    <span class="match-date">Grand
                        Final • May 21,
                        2025</span>
                </div>
                <div class="match-result">
                    <div class="team home-team">
                        <img src="images/sentinels.png" alt="Sentinels" class="team-logo">
                        <span class="team-name">Sentinels</span>
                    </div>
                    <div class="score">
                        <span class="home-score">3</span>
                        <span class="score-divider">:</span>
                        <span class="away-score">1</span>
                    </div>
                    <div class="team away-team">
                        <img src="images/fnatic.png" alt="Fnatic" class="team-logo">
                        <span class="team-name">Fnatic</span>
                    </div>
                </div>
                <div class="map-scores">
                    <div class="map">
                        <div class="map-name">
                            Haven
                        </div>
                        <div class="map-score">
                            13-8
                        </div>
                    </div>
                    <div class="map">
                        <div class="map-name">
                            Bind
                        </div>
                        <div class="map-score">
                            10-13
                        </div>
                    </div>
                    <div class="map">
                        <div class="map-name">
                            Split
                        </div>
                        <div class="map-score">
                            13-11
                        </div>
                    </div>
                    <div class="map">
                        <div class="map-name">
                            Ascent
                        </div>
                        <div class="map-score">
                            13-7
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Mobile Legends Tournament Section -->
        <div class="section tournament-standings">
            <h2>Mobile Legends: Bang Bang
                World
                Championship</h2>
            <div class="esports-header">
                <div class="esports-logo">
                    <img src="images/mlbb-logo.png" alt="Mobile Legends Logo">
                </div>
                <div class="tournament-info">
                    <div class="tournament-title">
                        M6
                        World Championship
                    </div>
                    <div class="tournament-date">
                        May
                        10-18, 2025</div>
                    <div class="prize-pool">
                        $800,000
                        Prize Pool</div>
                </div>
            </div>

            <div class="standings-table">
                <div class="standings-header">
                    <div class="rank-col">Rank
                    </div>
                    <div class="team-col">Team
                    </div>
                    <div class="region-col">
                        Region
                    </div>
                    <div class="match-col">
                        Matches
                    </div>
                    <div class="win-col">W
                    </div>
                    <div class="loss-col">L
                    </div>
                    <div class="points-col">
                        Points
                    </div>
                </div>
                <div class="standings-row">
                    <div class="rank-col">1
                    </div>
                    <div class="team-col">
                        <img src="images/bren.png" alt="BREN Esports" class="team-logo-small">
                        <span>BREN
                            Esports</span>
                    </div>
                    <div class="region-col">PH
                    </div>
                    <div class="match-col">10
                    </div>
                    <div class="win-col">9
                    </div>
                    <div class="loss-col">1
                    </div>
                    <div class="points-col">27
                    </div>
                </div>
                <div class="standings-row">
                    <div class="rank-col">2
                    </div>
                    <div class="team-col">
                        <img src="images/rrq.png" alt="RRQ Hoshi" class="team-logo-small">
                        <span>RRQ Hoshi</span>
                    </div>
                    <div class="region-col">ID
                    </div>
                    <div class="match-col">10
                    </div>
                    <div class="win-col">8
                    </div>
                    <div class="loss-col">2
                    </div>
                    <div class="points-col">24
                    </div>
                </div>
                <div class="standings-row">
                    <div class="rank-col">3
                    </div>
                    <div class="team-col">
                        <img src="images/evos.png" alt="EVOS Legends" class="team-logo-small">
                        <span>EVOS
                            Legends</span>
                    </div>
                    <div class="region-col">ID
                    </div>
                    <div class="match-col">10
                    </div>
                    <div class="win-col">7
                    </div>
                    <div class="loss-col">3
                    </div>
                    <div class="points-col">21
                    </div>
                </div>
                <div class="standings-row">
                    <div class="rank-col">4
                    </div>
                    <div class="team-col">
                        <img src="images/blacklist.png" alt="Blacklist International" class="team-logo-small">
                        <span>Blacklist
                            Int'l</span>
                    </div>
                    <div class="region-col">PH
                    </div>
                    <div class="match-col">10
                    </div>
                    <div class="win-col">6
                    </div>
                    <div class="loss-col">4
                    </div>
                    <div class="points-col">18
                    </div>
                </div>
            </div>

            <!-- Mobile Legends Recent Match -->
            <div class="result-card">
                <div class="match-info">
                    <span class="tournament-name">M6
                        World
                        Championship</span>
                    <span class="match-date">Grand
                        Final • May 18,
                        2025</span>
                </div>
                <div class="match-result">
                    <div class="team home-team">
                        <img src="images/bren.png" alt="BREN Esports" class="team-logo">
                        <span class="team-name">BREN
                            Esports</span>
                    </div>
                    <div class="score">
                        <span class="home-score">4</span>
                        <span class="score-divider">:</span>
                        <span class="away-score">2</span>
                    </div>
                    <div class="team away-team">
                        <img src="images/rrq.png" alt="RRQ Hoshi" class="team-logo">
                        <span class="team-name">RRQ
                            Hoshi</span>
                    </div>
                </div>
                <div class="heroes-used">
                    <div class="team-heroes">
                        <div class="heroes-label">
                            Key
                            Heroes:</div>
                        <div class="hero-icons">
                            <img src="images/ml-hero1.png" alt="Hero" class="hero-icon">
                            <img src="images/ml-hero2.png" alt="Hero" class="hero-icon">
                            <img src="images/ml-hero3.png" alt="Hero" class="hero-icon">
                        </div>
                    </div>
                    <div class="team-heroes">
                        <div class="heroes-label">
                            Key
                            Heroes:</div>
                        <div class="hero-icons">
                            <img src="images/ml-hero4.png" alt="Hero" class="hero-icon">
                            <img src="images/ml-hero5.png" alt="Hero" class="hero-icon">
                            <img src="images/ml-hero6.png" alt="Hero" class="hero-icon">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dota 2 Tournament Section -->
        <div class="section tournament-standings">
            <h2>Dota 2 The International 2025
            </h2>
            <div class="esports-header">
                <div class="esports-logo">
                    <img src="images/dota2-logo.png" alt="Dota 2 Logo">
                </div>
                <div class="tournament-info">
                    <div class="tournament-title">
                        The
                        International 14</div>
                    <div class="tournament-date">
                        May
                        1-12, 2025</div>
                    <div class="prize-pool">
                        $32,000,000 Prize Pool
                    </div>
                </div>
            </div>

            <div class="standings-table">
                <div class="standings-header">
                    <div class="rank-col">Rank
                    </div>
                    <div class="team-col">Team
                    </div>
                    <div class="region-col">
                        Region
                    </div>
                    <div class="match-col">
                        Matches
                    </div>
                    <div class="win-col">W
                    </div>
                    <div class="loss-col">L
                    </div>
                    <div class="points-col">
                        Prize
                    </div>
                </div>
                <div class="standings-row">
                    <div class="rank-col">1
                    </div>
                    <div class="team-col">
                        <img src="images/team-spirit.png" alt="Team Spirit" class="team-logo-small">
                        <span>Team
                            Spirit</span>
                    </div>
                    <div class="region-col">
                        EEU</div>
                    <div class="match-col">25
                    </div>
                    <div class="win-col">22
                    </div>
                    <div class="loss-col">3
                    </div>
                    <div class="points-col">
                        $8.5M
                    </div>
                </div>
                <div class="standings-row">
                    <div class="rank-col">2
                    </div>
                    <div class="team-col">
                        <img src="images/og.png" alt="OG" class="team-logo-small">
                        <span>OG</span>
                    </div>
                    <div class="region-col">
                        WEU</div>
                    <div class="match-col">23
                    </div>
                    <div class="win-col">19
                    </div>
                    <div class="loss-col">4
                    </div>
                    <div class="points-col">
                        $4.2M
                    </div>
                </div>
                <div class="standings-row">
                    <div class="rank-col">3
                    </div>
                    <div class="team-col">
                        <img src="images/lgd.png" alt="PSG.LGD" class="team-logo-small">
                        <span>PSG.LGD</span>
                    </div>
                    <div class="region-col">CN
                    </div>
                    <div class="match-col">24
                    </div>
                    <div class="win-col">18
                    </div>
                    <div class="loss-col">6
                    </div>
                    <div class="points-col">
                        $2.7M
                    </div>
                </div>
                <div class="standings-row">
                    <div class="rank-col">4
                    </div>
                    <div class="team-col">
                        <img src="images/eg.png" alt="Evil Geniuses" class="team-logo-small">
                        <span>Evil
                            Geniuses</span>
                    </div>
                    <div class="region-col">NA
                    </div>
                    <div class="match-col">22
                    </div>
                    <div class="win-col">16
                    </div>
                    <div class="loss-col">6
                    </div>
                    <div class="points-col">
                        $1.8M
                    </div>
                </div>
            </div>

            <!-- Dota 2 Recent Match -->
            <div class="result-card">
                <div class="match-info">
                    <span class="tournament-name">The
                        International
                        14</span>
                    <span class="match-date">Grand
                        Final • May 12,
                        2025</span>
                </div>
                <div class="match-result">
                    <div class="team home-team">
                        <img src="images/team-spirit.png" alt="Team Spirit" class="team-logo">
                        <span class="team-name">Team
                            Spirit</span>
                    </div>
                    <div class="score">
                        <span class="home-score">3</span>
                        <span class="score-divider">:</span>
                        <span class="away-score">2</span>
                    </div>
                    <div class="team away-team">
                        <img src="images/og.png" alt="OG" class="team-logo">
                        <span class="team-name">OG</span>
                    </div>
                </div>
                <div class="match-details">
                    <div class="detail-item">
                        <span class="detail-label">Game
                            Duration:</span>
                        <span class="detail-value">43:21
                        </span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Total
                            Kills:</span>
                        <span class="detail-value">Team
                            Spirit (78) - OG
                            (65)</span>
                    </div>
                </div>

            </div>

            <!-- Upcoming Match Section -->
            <div class="section upcoming-matches">
                <h2>Upcoming Tournament
                    Matches</h2>
                <div class="upcoming-match">
                    <div class="upcoming-header">
                        <div class="upcoming-game">
                            <img src="images/valorant-logo-small.png" alt="Valorant">
                            <span>Valorant
                                Champions
                                Tour
                                2025</span>
                        </div>
                        <div class="upcoming-date">
                            May
                            25, 2025 • 18:00
                            GMT</div>
                    </div>
                    <div class="upcoming-teams">
                        <div class="upcoming-team">
                            <img src="images/100thieves.png" alt="100 Thieves" class="team-logo">
                            <span>100
                                Thieves</span>
                        </div>
                        <div class="vs">VS
                        </div>
                        <div class="upcoming-team">
                            <img src="images/cloud9.png" alt="Cloud9" class="team-logo">
                            <span>Cloud9</span>
                        </div>
                    </div>
                </div>

                <div class="upcoming-match">
                    <div class="upcoming-header">
                        <div class="upcoming-game">
                            <img src="images/mlbb-logo-small.png" alt="Mobile Legends">
                            <span>MPL Season
                                19</span>
                        </div>
                        <div class="upcoming-date">
                            May
                            24, 2025 • 15:30
                            GMT</div>
                    </div>
                    <div class="upcoming-teams">
                        <div class="upcoming-team">
                            <img src="images/echo.png" alt="ECHO" class="team-logo">
                            <span>ECHO</span>
                        </div>
                        <div class="vs">VS
                        </div>
                        <div class="upcoming-team">
                            <img src="images/onic.png" alt="ONIC Esports" class="team-logo">
                            <span>ONIC
                                Esports</span>
                        </div>
                    </div>
                </div>

                <div class="upcoming-match">
                    <div class="upcoming-header">
                        <div class="upcoming-game">
                            <img src="images/dota2-logo-small.png" alt="Dota 2">
                            <span>ESL One
                                Stockholm
                                2025</span>
                        </div>
                        <div class="upcoming-date">
                            May
                            26, 2025 • 17:00
                            GMT</div>
                    </div>
                    <div class="upcoming-teams">
                        <div class="upcoming-team">
                            <img src="images/liquid.png" alt="Team Liquid" class="team-logo">
                            <span>Team
                                Liquid</span>
                        </div>
                        <div class="vs">VS
                        </div>
                        <div class="upcoming-team">
                            <img src="images/secret.png" alt="Team Secret" class="team-logo">
                            <span>Team
                                Secret</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="js/index.js"></script>
</body>

</html>