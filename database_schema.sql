-- Game News Database Schema
-- Save this as: database_schema.sql
-- Run: mysql -u root -p < database_schema.sql

-- Create Database
CREATE DATABASE IF NOT EXISTS game_news_db;
USE game_news_db;

-- 1. Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100),
    profile_image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_active BOOLEAN DEFAULT TRUE
);

-- 2. Categories Table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    slug VARCHAR(50) UNIQUE NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. News Articles Table
CREATE TABLE news_articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    content TEXT NOT NULL,
    excerpt TEXT,
    featured_image VARCHAR(255),
    category_id INT,
    author_id INT,
    status ENUM('draft', 'published', 'archived') DEFAULT 'draft',
    views INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    published_at TIMESTAMP NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL
);

-- 4. Game Updates Table
CREATE TABLE game_updates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    game_name VARCHAR(100) NOT NULL,
    version VARCHAR(50),
    content TEXT NOT NULL,
    features JSON,
    update_image VARCHAR(255),
    release_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 5. Tournaments Table
CREATE TABLE tournaments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    game VARCHAR(100) NOT NULL,
    tournament_type ENUM('valorant', 'mobile_legends', 'dota2', 'other') NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    prize_pool DECIMAL(15,2),
    location VARCHAR(255),
    status ENUM('upcoming', 'ongoing', 'completed') DEFAULT 'upcoming',
    logo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 6. Teams Table
CREATE TABLE teams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    short_name VARCHAR(10),
    region VARCHAR(50),
    logo VARCHAR(255),
    game VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 7. Tournament Standings Table
CREATE TABLE tournament_standings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tournament_id INT NOT NULL,
    team_id INT NOT NULL,
    rank_position INT NOT NULL,
    matches_played INT DEFAULT 0,
    wins INT DEFAULT 0,
    losses INT DEFAULT 0,
    points INT DEFAULT 0,
    prize_money DECIMAL(15,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tournament_id) REFERENCES tournaments(id) ON DELETE CASCADE,
    FOREIGN KEY (team_id) REFERENCES teams(id) ON DELETE CASCADE,
    UNIQUE KEY unique_tournament_team (tournament_id, team_id)
);

-- 8. Matches Table
CREATE TABLE matches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tournament_id INT NOT NULL,
    home_team_id INT NOT NULL,
    away_team_id INT NOT NULL,
    home_score INT DEFAULT 0,
    away_score INT DEFAULT 0,
    match_date DATETIME NOT NULL,
    status ENUM('scheduled', 'live', 'completed', 'cancelled') DEFAULT 'scheduled',
    match_type ENUM('group', 'playoff', 'final') DEFAULT 'group',
    map_scores JSON,
    match_details JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tournament_id) REFERENCES tournaments(id) ON DELETE CASCADE,
    FOREIGN KEY (home_team_id) REFERENCES teams(id) ON DELETE CASCADE,
    FOREIGN KEY (away_team_id) REFERENCES teams(id) ON DELETE CASCADE
);

-- 9. Comments Table
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    article_id INT NOT NULL,
    user_id INT NOT NULL,
    parent_id INT NULL,
    content TEXT NOT NULL,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (article_id) REFERENCES news_articles(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (parent_id) REFERENCES comments(id) ON DELETE CASCADE
);

-- 10. User Preferences Table
CREATE TABLE user_preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    preferred_games JSON,
    notification_settings JSON,
    theme VARCHAR(20) DEFAULT 'light',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- 11. Search Logs Table (for analytics)
CREATE TABLE search_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    search_term VARCHAR(255) NOT NULL,
    results_count INT DEFAULT 0,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Insert Initial Data
-- Categories
INSERT INTO categories (name, slug, description) VALUES
('Valorant', 'valorant', 'News and updates about Valorant'),
('Mobile Legends', 'mobile-legends', 'Mobile Legends Bang Bang news'),
('Dota 2', 'dota2', 'Dota 2 tournament and game news'),
('League of Legends', 'league-of-legends', 'LoL esports and game updates'),
('General Gaming', 'general-gaming', 'General gaming news and updates');

-- Default Admin User (password: 123456 - hashed)
INSERT INTO users (username, email, password, full_name, is_active) VALUES
('admin', 'admin@gamenews.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', TRUE);

-- Sample Teams
INSERT INTO teams (name, short_name, region, game) VALUES
('Sentinels', 'SEN', 'NA', 'Valorant'),
('Fnatic', 'FNC', 'EMEA', 'Valorant'),
('DRX', 'DRX', 'KR', 'Valorant'),
('LOUD', 'LOUD', 'BR', 'Valorant'),
('BREN Esports', 'BREN', 'PH', 'Mobile Legends'),
('RRQ Hoshi', 'RRQ', 'ID', 'Mobile Legends'),
('EVOS Legends', 'EVOS', 'ID', 'Mobile Legends'),
('Blacklist International', 'BLI', 'PH', 'Mobile Legends'),
('Team Spirit', 'TS', 'EEU', 'Dota 2'),
('OG', 'OG', 'WEU', 'Dota 2'),
('PSG.LGD', 'LGD', 'CN', 'Dota 2'),
('Evil Geniuses', 'EG', 'NA', 'Dota 2');

-- Sample Tournaments
INSERT INTO tournaments (name, game, tournament_type, start_date, end_date, prize_pool, status) VALUES
('VCT Masters Tokyo 2025', 'Valorant', 'valorant', '2025-05-15', '2025-05-22', 1000000.00, 'completed'),
('M6 World Championship', 'Mobile Legends', 'mobile_legends', '2025-05-10', '2025-05-18', 800000.00, 'completed'),
('The International 14', 'Dota 2', 'dota2', '2025-05-01', '2025-05-12', 32000000.00, 'completed');

-- Sample Tournament Standings
-- Valorant Standings
INSERT INTO tournament_standings (tournament_id, team_id, rank_position, matches_played, wins, losses, points) VALUES
(1, 1, 1, 8, 7, 1, 450),
(1, 2, 2, 8, 6, 2, 400),
(1, 3, 3, 8, 6, 2, 380),
(1, 4, 4, 8, 5, 3, 320);

-- Mobile Legends Standings
INSERT INTO tournament_standings (tournament_id, team_id, rank_position, matches_played, wins, losses, points) VALUES
(2, 5, 1, 10, 9, 1, 27),
(2, 6, 2, 10, 8, 2, 24),
(2, 7, 3, 10, 7, 3, 21),
(2, 8, 4, 10, 6, 4, 18);

-- Dota 2 Standings
INSERT INTO tournament_standings (tournament_id, team_id, rank_position, matches_played, wins, losses, points, prize_money) VALUES
(3, 9, 1, 25, 22, 3, 100, 8500000.00),
(3, 10, 2, 23, 19, 4, 85, 4200000.00),
(3, 11, 3, 24, 18, 6, 78, 2700000.00),
(3, 12, 4, 22, 16, 6, 65, 1800000.00);

-- Sample News Articles
INSERT INTO news_articles (title, slug, content, excerpt, category_id, author_id, status, published_at) VALUES
('Sentinels Wins VCT Masters Tokyo 2025', 'sentinels-wins-vct-masters-tokyo-2025', 
'Sentinels dominated the VCT Masters Tokyo 2025 tournament, showcasing exceptional teamwork and individual skill throughout the competition. The North American team defeated Fnatic in a thrilling 3-1 grand final series that kept viewers on the edge of their seats. With outstanding performances from their star players, Sentinels proved why they are considered one of the best Valorant teams in the world.', 
'Sentinels claims victory at VCT Masters Tokyo 2025 with a dominant performance against international competition.', 
1, 1, 'published', NOW()),

('BREN Esports Crowned M6 World Champions', 'bren-esports-m6-world-champions',
'BREN Esports from the Philippines has been crowned the M6 World Championship winners after defeating RRQ Hoshi 4-2 in an intense grand final. The team showed remarkable consistency throughout the tournament, adapting their strategies perfectly to counter different opponents. This victory marks a significant achievement for Southeast Asian Mobile Legends esports.', 
'BREN Esports takes home the M6 World Championship title with exceptional gameplay and strategy.', 
2, 1, 'published', NOW()),

('Team Spirit Wins The International 14', 'team-spirit-wins-ti14',
'Team Spirit has successfully defended their International title by winning The International 14 with a $32 million prize pool. The Eastern European squad defeated OG 3-2 in the grand final, showcasing incredible teamwork and individual brilliance. This back-to-back victory solidifies their position as one of the greatest Dota 2 teams of all time.', 
'Team Spirit claims their second International title in dominant fashion at TI14.', 
3, 1, 'published', NOW()),

('Valorant Episode 8 Brings New Agent and Map', 'valorant-episode-8-new-agent-map',
'Riot Games has unveiled Episode 8 of Valorant, introducing a new duelist agent with unique mobility abilities and a futuristic map set in Neo Tokyo. The update also includes balance changes to existing agents and weapon adjustments based on community feedback.', 
'Valorant Episode 8 introduces exciting new content including a fresh agent and map.', 
1, 1, 'published', NOW()),

('Mobile Legends Professional League Season 19 Announced', 'mpl-season-19-announced',
'Moonton has officially announced the Mobile Legends Professional League Season 19 with an increased prize pool of $2 million. The new season will feature 16 teams from across Southeast Asia competing in a double round-robin format followed by playoffs.', 
'MPL Season 19 brings bigger prizes and more intense competition to Mobile Legends esports.', 
2, 1, 'published', NOW());

-- Sample Matches
INSERT INTO matches (tournament_id, home_team_id, away_team_id, home_score, away_score, match_date, status, match_type) VALUES
(1, 1, 2, 3, 1, '2025-05-21 18:00:00', 'completed', 'final'),
(2, 5, 6, 4, 2, '2025-05-18 15:30:00', 'completed', 'final'),
(3, 9, 10, 3, 2, '2025-05-12 17:00:00', 'completed', 'final'),
(1, 3, 4, 2, 1, '2025-05-26 18:00:00', 'scheduled', 'group'),
(2, 7, 8, 0, 0, '2025-05-24 15:30:00', 'scheduled', 'group');

-- Game Updates
INSERT INTO game_updates (title, game_name, version, content, release_date) VALUES
('FIFA 2025 New Features', 'FIFA 2025', '2025.1', 'EA Sports has announced revolutionary AI-powered player movement and ultra-realistic stadium atmospheres for FIFA 2025. The game introduces enhanced career mode with improved transfer negotiations.', '2025-05-22'),
('Pro Evolution Soccer 2025 Announced', 'PES 2025', '1.0', 'Konami reveals PES 2025 with enhanced ball physics and over 200 authentic teams with official licenses. The game focuses on tactical gameplay and realistic player movements.', '2025-05-19'),
('Valorant Episode 8 Update', 'Valorant', '8.0', 'New agent Fade brings darkness abilities to the battlefield. The update also includes map rotations and weapon balance changes.', '2025-05-20');

-- Create Indexes for better performance
CREATE INDEX idx_news_category ON news_articles(category_id);
CREATE INDEX idx_news_author ON news_articles(author_id);
CREATE INDEX idx_news_status ON news_articles(status);
CREATE INDEX idx_news_published ON news_articles(published_at);
CREATE INDEX idx_tournament_game ON tournaments(game);
CREATE INDEX idx_tournament_status ON tournaments(status);
CREATE INDEX idx_matches_tournament ON matches(tournament_id);
CREATE INDEX idx_matches_date ON matches(match_date);
CREATE INDEX idx_search_term ON search_logs(search_term);
CREATE INDEX idx_search_date ON search_logs(created_at);

-- Create Views for common queries
CREATE VIEW latest_news AS
SELECT 
    na.id,
    na.title,
    na.slug,
    na.excerpt,
    na.published_at,
    na.views,
    c.name as category_name,
    u.username as author_name
FROM news_articles na
LEFT JOIN categories c ON na.category_id = c.id
LEFT JOIN users u ON na.author_id = u.id
WHERE na.status = 'published'
ORDER BY na.published_at DESC;

CREATE VIEW tournament_results AS
SELECT 
    t.name as tournament_name,
    t.game,
    ts.rank_position,
    tm.name as team_name,
    tm.region,
    ts.matches_played,
    ts.wins,
    ts.losses,
    ts.points,
    ts.prize_money
FROM tournament_standings ts
JOIN tournaments t ON ts.tournament_id = t.id
JOIN teams tm ON ts.team_id = tm.id
ORDER BY t.id, ts.rank_position;