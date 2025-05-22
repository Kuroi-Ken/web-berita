<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: php/login.php");
    exit();
}

require_once 'php/data/news_data.php';
require_once 'php/data/tournament_data.php';

$newsData = new NewsData();
$tournamentData = new TournamentData();

$latestNews = $newsData->getLatestNews(5);
$recommendedNews = $newsData->getRecommendedNews(3);
$valorantStandings = $tournamentData->getTournamentStandings('valorant', 4);
$mlStandings = $tournamentData->getTournamentStandings('mobile_legends', 4);
$dotaStandings = $tournamentData->getTournamentStandings('dota2', 4);
$recentMatches = $tournamentData->getRecentMatches(null, 3);
$upcomingMatches = $tournamentData->getUpcomingMatches(3);

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
                <span class="span-text">Game
                    News</span>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="menu-icon" id="menuIcon">
                <i data-feather="menu"></i>
            </div>
            <ul class="nav">
                <li><a href="#">Profile
                        (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a>
                </li>
                <li><a href="#">Home</a></li>
                <li><a href="php/about.php">About</a>
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
                    <p>Team Esport Shanghai
                        Berhasil Memenangkan
                        Kejuaraan League of
                        Legends World Champion</p>
                    <button class="explore">EXPLORE
                        MORE</button>
                </div>
                <div class="slide slide2">
                    <h1>Valorant</h1>
                    <p>Valorant Champions 2024:
                        Trace Esports Melaju ke
                        Babak Playoff, Kalahkan
                        Juara VCT America!</p>
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
            <!-- Recommended For You section - Updated with Database -->
            <div class="section recommended">
                <h2>Recommended For You</h2>
                <div class="recommended-slider">
                    <?php if (!empty($recommendedNews)): ?>
                    <?php foreach ($recommendedNews as $index => $news): ?>
                    <div class="recommended-card <?php echo $index === 0 ? 'active' : ''; ?>">
                        <div class="card-content">
                            <div class="text-block">
                                <h3><?php echo htmlspecialchars(strtoupper($news['title'])); ?>
                                </h3>
                                <p><?php echo htmlspecialchars($news['excerpt']); ?>
                                </p>
                                <small style="color: #ccc; font-size: 12px;">
                                    <?php echo $news['category_name']; ?>
                                    •
                                    <?php echo date('M j, Y', strtotime($news['published_at'])); ?>
                                </small>
                            </div>
                            <div class="image-block">
                                <!-- Image placeholder since images are hidden by CSS -->
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <!-- Fallback jika tidak ada data -->
                    <div class="recommended-card active">
                        <div class="card-content">
                            <div class="text-block">
                                <h3>WELCOME TO
                                    GAME NEWS</h3>
                                <p>Stay updated
                                    with the
                                    latest gaming
                                    news,
                                    tournament
                                    results, and
                                    esports
                                    updates. Get
                                    all the
                                    information
                                    you need about
                                    your favorite
                                    games and
                                    teams.</p>
                                <small style="color: #ccc; font-size: 12px;">
                                    General •
                                    Today
                                </small>
                            </div>
                            <div class="image-block">
                                <!-- Image placeholder -->
                            </div>
                        </div>
                    </div>
                    <div class="recommended-card">
                        <div class="card-content">
                            <div class="text-block">
                                <h3>TOURNAMENT
                                    UPDATES</h3>
                                <p>Follow live
                                    tournaments,
                                    check
                                    standings, and
                                    get real-time
                                    updates from
                                    the world of
                                    competitive
                                    gaming and
                                    esports.</p>
                                <small style="color: #ccc; font-size: 12px;">
                                    Esports •
                                    Today
                                </small>
                            </div>
                            <div class="image-block">
                                <!-- Image placeholder -->
                            </div>
                        </div>
                    </div>
                    <div class="recommended-card">
                        <div class="card-content">
                            <div class="text-block">
                                <h3>GAME REVIEWS
                                </h3>
                                <p>Discover
                                    in-depth
                                    reviews of the
                                    latest games,
                                    updates, and
                                    patches. Make
                                    informed
                                    decisions
                                    about your
                                    next gaming
                                    adventure.</p>
                                <small style="color: #ccc; font-size: 12px;">
                                    Reviews •
                                    Today
                                </small>
                            </div>
                            <div class="image-block">
                                <!-- Image placeholder -->
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="dots">
                    <?php
                    $totalCards = !empty($recommendedNews) ? count($recommendedNews) : 3;
                    for ($i = 0; $i < $totalCards; $i++):
                    ?>
                    <span class="dot <?php echo $i === 0 ? 'active' : ''; ?>"></span>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Latest News section - Updated with Database -->
            <div class="section latest-news">
                <h2>Latest News</h2>
                <?php if (!empty($latestNews)): ?>
                <?php foreach ($latestNews as $news): ?>
                <div class="news-card">
                    <div class="news-text">
                        <h3><?php echo htmlspecialchars(strtoupper($news['title'])); ?>
                        </h3>
                        <p><?php echo htmlspecialchars($news['excerpt']); ?>
                        </p>
                        <span class="time">
                            <?php
                                    $publishedDate = new DateTime($news['published_at']);
                                    $now = new DateTime();
                                    $diff = $now->diff($publishedDate);

                                    if ($diff->days == 0) {
                                        if ($diff->h == 0) {
                                            echo $diff->i . " Minutes Ago";
                                        } else {
                                            echo $diff->h . " Hours Ago";
                                        }
                                    } elseif ($diff->days == 1) {
                                        echo "1 Day Ago";
                                    } else {
                                        echo $diff->days . " Days Ago";
                                    }
                                    ?>
                        </span>
                        <small style="color: #888; margin-left: 10px;">
                            <?php echo $news['category_name']; ?>
                            •
                            <?php echo $news['views']; ?>
                            views
                        </small>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <!-- Fallback jika tidak ada berita -->
                <div class="news-card">
                    <div class="news-text">
                        <h3>WELCOME TO GAME NEWS
                        </h3>
                        <p>We're preparing
                            exciting gaming
                            content for you. Check
                            back soon for the
                            latest news, updates,
                            and tournament
                            coverage from the
                            world of gaming and
                            esports.</p>
                        <span class="time">Just
                            Now</span>
                        <small style="color: #888; margin-left: 10px;">General
                            • 0 views</small>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-text">
                        <h3>VALORANT CHAMPIONS
                            TOUR</h3>
                        <p>Stay tuned for updates
                            from the biggest
                            Valorant tournaments.
                            Get live scores, match
                            results, and player
                            statistics from
                            top-tier competitive
                            play.</p>
                        <span class="time">1 Hour
                            Ago</span>
                        <small style="color: #888; margin-left: 10px;">Valorant
                            • 0 views</small>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-text">
                        <h3>MOBILE LEGENDS WORLD
                            CHAMPIONSHIP</h3>
                        <p>Follow the intense
                            competition as teams
                            from around the world
                            compete for the
                            ultimate prize in
                            Mobile Legends Bang
                            Bang professional
                            esports.</p>
                        <span class="time">2 Hours
                            Ago</span>
                        <small style="color: #888; margin-left: 10px;">Mobile
                            Legends • 0
                            views</small>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <?php
        // Di bagian atas file, tambahkan setelah news data
        require_once 'php/data/tournament_data.php';

        // Initialize tournament data handler
        $tournamentData = new TournamentData();

        // Get tournament data
        $valorantStandings = $tournamentData->getTournamentStandings('valorant', 4);
        $mlStandings = $tournamentData->getTournamentStandings('mobile_legends', 4);
        $dotaStandings = $tournamentData->getTournamentStandings('dota2', 4);
        $recentMatches = $tournamentData->getRecentMatches(null, 3);
        $upcomingMatches = $tournamentData->getUpcomingMatches(3);

        // Get game updates (you may need to create a GameUpdates class)
        try {
            $db = getDB();
            $sql = "SELECT * FROM game_updates ORDER BY release_date DESC LIMIT 5";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $gameUpdates = $stmt->fetchAll();
        } catch (PDOException $e) {
            $gameUpdates = [];
            error_log("Error getting game updates: " . $e->getMessage());
        }
        ?>

        <!-- Update Tab Content -->
        <div class="tab-content" id="update-content" style="display: none;">
            <!-- Game Updates Section -->
            <div class="section updates">
                <h2>Game Updates</h2>

                <?php if (!empty($gameUpdates)): ?>
                <?php foreach ($gameUpdates as $update): ?>
                <div class="update-card">
                    <div class="update-header">
                        <div class="update-title">
                            <?php echo htmlspecialchars($update['title']); ?>
                        </div>
                        <div class="update-date">
                            <?php echo date('M j, Y', strtotime($update['release_date'])); ?>
                        </div>
                    </div>
                    <div class="update-content">
                        <div class="update-image">
                            <!-- Image hidden by CSS -->
                        </div>
                        <p><?php echo htmlspecialchars($update['content']); ?>
                        </p>

                        <?php if (!empty($update['version'])): ?>
                        <div class="update-features">
                            <div class="feature">
                                <i data-feather="tag"></i>
                                <span>Version
                                    <?php echo htmlspecialchars($update['version']); ?></span>
                            </div>
                            <div class="feature">
                                <i data-feather="calendar"></i>
                                <span><?php echo htmlspecialchars($update['game_name']); ?></span>
                            </div>
                            <div class="feature">
                                <i data-feather="clock"></i>
                                <span><?php echo date('M j', strtotime($update['release_date'])); ?></span>
                            </div>
                        </div>
                        <?php endif; ?>

                        <button class="read-more-btn">Read
                            Full Article</button>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <!-- Fallback content jika database kosong -->
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
                            <!-- Image hidden by CSS -->
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
                            Pro Evolution Soccer
                            2025 Announced</div>
                        <div class="update-date">
                            May 19, 2025</div>
                    </div>
                    <div class="update-content">
                        <div class="update-image">
                            <!-- Image hidden by CSS -->
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
                <?php endif; ?>
            </div>

            <!-- Game News Section -->
            <div class="section game-news">
                <h2>Game Industry News</h2>

                <?php
                // Get recent gaming news from news_articles
                $gamingNews = $newsData->getNewsByCategory('general-gaming', 3);
                if (empty($gamingNews)) {
                    // Fallback to any news if no gaming-specific news
                    $gamingNews = $newsData->getLatestNews(2);
                }
                ?>

                <?php if (!empty($gamingNews)): ?>
                <?php foreach ($gamingNews as $news): ?>
                <div class="update-card">
                    <div class="update-header">
                        <div class="update-title">
                            <?php echo htmlspecialchars($news['title']); ?>
                        </div>
                        <div class="update-date">
                            <?php echo date('M j, Y', strtotime($news['published_at'])); ?>
                        </div>
                    </div>
                    <div class="update-content">
                        <div class="update-image">
                            <!-- Image hidden by CSS -->
                        </div>
                        <p><?php echo htmlspecialchars($news['excerpt']); ?>
                        </p>
                        <div class="update-quote">
                            <blockquote>
                                "<?php echo htmlspecialchars(substr($news['content'], 0, 150)); ?>..."
                            </blockquote>
                            <cite>—
                                <?php echo htmlspecialchars($news['author_name'] ?? 'Game News Team'); ?></cite>
                        </div>
                        <button class="read-more-btn">Read
                            Full Article</button>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <!-- Fallback content -->
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
                            <!-- Image hidden by CSS -->
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
                <?php endif; ?>
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
                                        about.</p>
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
                                        with our
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
        <div class="tab-content" id="tournament-score-content" style="display: none;">
            <!-- Valorant Tournament Section -->
            <?php if (!empty($valorantStandings)): ?>
            <div class="section tournament-standings valorant-section">
                <h2>Valorant Champions Tour 2025
                </h2>
                <div class="esports-header">
                    <div class="esports-logo">
                        <!-- Logo hidden by CSS -->
                    </div>
                    <div class="tournament-info">
                        <div class="tournament-title">
                            <?php echo htmlspecialchars($valorantStandings[0]['tournament_name']); ?>
                        </div>
                        <div class="tournament-date">
                            May 15-22, 2025</div>
                        <div class="prize-pool">
                            $<?php echo number_format($valorantStandings[0]['prize_pool']); ?>
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
                            Region</div>
                        <div class="match-col">
                            Matches</div>
                        <div class="win-col">W
                        </div>
                        <div class="loss-col">L
                        </div>
                        <div class="points-col">
                            Points</div>
                    </div>
                    <?php foreach ($valorantStandings as $standing): ?>
                    <div class="standings-row">
                        <div class="rank-col">
                            <?php echo $standing['rank_position']; ?>
                        </div>
                        <div class="team-col">
                            <span><?php echo htmlspecialchars($standing['team_name']); ?></span>
                        </div>
                        <div class="region-col">
                            <?php echo htmlspecialchars($standing['region']); ?>
                        </div>
                        <div class="match-col">
                            <?php echo $standing['matches_played']; ?>
                        </div>
                        <div class="win-col">
                            <?php echo $standing['wins']; ?>
                        </div>
                        <div class="loss-col">
                            <?php echo $standing['losses']; ?>
                        </div>
                        <div class="points-col">
                            <?php echo $standing['points']; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Mobile Legends Tournament Section -->
            <?php if (!empty($mlStandings)): ?>
            <div class="section tournament-standings ml-section">
                <h2>Mobile Legends: Bang Bang
                    World Championship</h2>
                <div class="esports-header">
                    <div class="esports-logo">
                        <!-- Logo hidden by CSS -->
                    </div>
                    <div class="tournament-info">
                        <div class="tournament-title">
                            <?php echo htmlspecialchars($mlStandings[0]['tournament_name']); ?>
                        </div>
                        <div class="tournament-date">
                            May 10-18, 2025</div>
                        <div class="prize-pool">
                            $<?php echo number_format($mlStandings[0]['prize_pool']); ?>
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
                            Region</div>
                        <div class="match-col">
                            Matches</div>
                        <div class="win-col">W
                        </div>
                        <div class="loss-col">L
                        </div>
                        <div class="points-col">
                            Points</div>
                    </div>
                    <?php foreach ($mlStandings as $standing): ?>
                    <div class="standings-row">
                        <div class="rank-col">
                            <?php echo $standing['rank_position']; ?>
                        </div>
                        <div class="team-col">
                            <span><?php echo htmlspecialchars($standing['team_name']); ?></span>
                        </div>
                        <div class="region-col">
                            <?php echo htmlspecialchars($standing['region']); ?>
                        </div>
                        <div class="match-col">
                            <?php echo $standing['matches_played']; ?>
                        </div>
                        <div class="win-col">
                            <?php echo $standing['wins']; ?>
                        </div>
                        <div class="loss-col">
                            <?php echo $standing['losses']; ?>
                        </div>
                        <div class="points-col">
                            <?php echo $standing['points']; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Dota 2 Tournament Section -->
            <?php if (!empty($dotaStandings)): ?>
            <div class="section tournament-standings dota-section">
                <h2>Dota 2 The International 2025
                </h2>
                <div class="esports-header">
                    <div class="esports-logo">
                        <!-- Logo hidden by CSS -->
                    </div>
                    <div class="tournament-info">
                        <div class="tournament-title">
                            <?php echo htmlspecialchars($dotaStandings[0]['tournament_name']); ?>
                        </div>
                        <div class="tournament-date">
                            May 1-12, 2025</div>
                        <div class="prize-pool">
                            $<?php echo number_format($dotaStandings[0]['prize_pool']); ?>
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
                            Region</div>
                        <div class="match-col">
                            Matches</div>
                        <div class="win-col">W
                        </div>
                        <div class="loss-col">L
                        </div>
                        <div class="points-col">
                            Prize</div>
                    </div>
                    <?php foreach ($dotaStandings as $standing): ?>
                    <div class="standings-row">
                        <div class="rank-col">
                            <?php echo $standing['rank_position']; ?>
                        </div>
                        <div class="team-col">
                            <span><?php echo htmlspecialchars($standing['team_name']); ?></span>
                        </div>
                        <div class="region-col">
                            <?php echo htmlspecialchars($standing['region']); ?>
                        </div>
                        <div class="match-col">
                            <?php echo $standing['matches_played']; ?>
                        </div>
                        <div class="win-col">
                            <?php echo $standing['wins']; ?>
                        </div>
                        <div class="loss-col">
                            <?php echo $standing['losses']; ?>
                        </div>
                        <div class="points-col">
                            $<?php echo number_format($standing['prize_money']); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Recent Matches Section -->
            <?php if (!empty($recentMatches)): ?>
            <div class="section recent-matches">
                <h2>Recent Match Results</h2>
                <?php foreach ($recentMatches as $match): ?>
                <div
                    class="result-card <?php echo ($match['tournament_type'] == 'valorant') ? 'featured-match' : ''; ?>">
                    <div class="match-info">
                        <span class="tournament-name"><?php echo htmlspecialchars($match['tournament_name']); ?></span>
                        <span class="match-date"><?php echo date('M j, Y', strtotime($match['match_date'])); ?></span>
                    </div>
                    <div class="match-result">
                        <div class="team home-team">
                            <span class="team-name"><?php echo htmlspecialchars($match['home_team_name']); ?></span>
                        </div>
                        <div class="score">
                            <span class="home-score"><?php echo $match['home_score']; ?></span>
                            <span class="score-divider">:</span>
                            <span class="away-score"><?php echo $match['away_score']; ?></span>
                        </div>
                        <div class="team away-team">
                            <span class="team-name"><?php echo htmlspecialchars($match['away_team_name']); ?></span>
                        </div>
                    </div>

                    <?php if ($match['tournament_type'] == 'valorant' && $match['home_score'] > $match['away_score']): ?>
                    <div class="mvp-info">
                        <div class="mvp">
                            <i data-feather="award"></i>
                            <span>Match Winner:
                                <?php echo htmlspecialchars($match['home_team_name']); ?></span>
                        </div>
                    </div>
                    <?php elseif ($match['tournament_type'] == 'valorant'): ?>
                    <div class="mvp-info">
                        <div class="mvp">
                            <i data-feather="award"></i>
                            <span>Match Winner:
                                <?php echo htmlspecialchars($match['away_team_name']); ?></span>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- Upcoming Matches Section -->
            <?php if (!empty($upcomingMatches)): ?>
            <div class="section upcoming-matches">
                <h2>Upcoming Tournament Matches
                </h2>
                <?php foreach ($upcomingMatches as $match): ?>
                <div class="upcoming-match">
                    <div class="upcoming-header">
                        <div class="upcoming-game">
                            <span><?php echo htmlspecialchars($match['tournament_name']); ?></span>
                            <span class="game-badge <?php echo $match['tournament_type']; ?>-badge">
                                <?php echo strtoupper(str_replace('_', ' ', $match['tournament_type'])); ?>
                            </span>
                        </div>
                        <div class="upcoming-date">
                            <?php echo date('M j, Y • H:i', strtotime($match['match_date'])); ?>
                            GMT
                        </div>
                    </div>
                    <div class="upcoming-teams">
                        <div class="upcoming-team">
                            <span><?php echo htmlspecialchars($match['home_team_name']); ?></span>
                        </div>
                        <div class="vs">VS</div>
                        <div class="upcoming-team">
                            <span><?php echo htmlspecialchars($match['away_team_name']); ?></span>
                        </div>
                    </div>

                    <?php if ($match['status'] == 'live'): ?>
                    <div class="live-match">
                        <div style="text-align: center; color: #dc3545; font-weight: bold; margin-top: 10px;">
                            🔴 LIVE NOW
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- Tournament Statistics (if no data available, show message) -->
            <?php if (empty($valorantStandings) && empty($mlStandings) && empty($dotaStandings)): ?>
            <div class="section tournament-standings">
                <h2>Tournament Information</h2>
                <div class="update-card">
                    <div class="update-content" style="text-align: center; padding: 40px;">
                        <i data-feather="calendar"
                            style="width: 48px; height: 48px; color: #ccc; margin-bottom: 20px;"></i>
                        <h3>No Active Tournaments
                        </h3>
                        <p>There are currently no
                            active tournaments.
                            Check back soon for
                            upcoming esports
                            events and tournament
                            standings.</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>




        <script src="js/index.js"></script>
</body>

</html>