<?php
require_once __DIR__ . '/../config/database.php';

class TournamentData
{
    private $conn;

    public function __construct()
    {
        $this->conn = getDB();
    }

    public function getTournamentStandings($tournamentType, $limit = 10)
    {
        try {
            $sql = "SELECT ts.*, t.name as tournament_name, tm.name as team_name, 
                           tm.short_name, tm.region, tm.logo, t.prize_pool
                    FROM tournament_standings ts
                    JOIN tournaments t ON ts.tournament_id = t.id
                    JOIN teams tm ON ts.team_id = tm.id
                    WHERE t.tournament_type = :tournament_type
                    ORDER BY t.end_date DESC, ts.rank_position ASC
                    LIMIT :limit";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tournament_type', $tournamentType);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error getting tournament standings: " . $e->getMessage());
            return [];
        }
    }

    public function getRecentMatches($tournamentType = null, $limit = 5)
    {
        try {
            $sql = "SELECT m.*, t.name as tournament_name, t.tournament_type,
                           ht.name as home_team_name, ht.logo as home_team_logo,
                           at.name as away_team_name, at.logo as away_team_logo
                    FROM matches m
                    JOIN tournaments t ON m.tournament_id = t.id
                    JOIN teams ht ON m.home_team_id = ht.id
                    JOIN teams at ON m.away_team_id = at.id
                    WHERE m.status = 'completed'";

            if ($tournamentType) {
                $sql .= " AND t.tournament_type = :tournament_type";
            }

            $sql .= " ORDER BY m.match_date DESC LIMIT :limit";

            $stmt = $this->conn->prepare($sql);
            if ($tournamentType) {
                $stmt->bindParam(':tournament_type', $tournamentType);
            }
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error getting recent matches: " . $e->getMessage());
            return [];
        }
    }

    public function getUpcomingMatches($limit = 5)
    {
        try {
            $sql = "SELECT m.*, t.name as tournament_name, t.tournament_type,
                           ht.name as home_team_name, ht.logo as home_team_logo,
                           at.name as away_team_name, at.logo as away_team_logo
                    FROM matches m
                    JOIN tournaments t ON m.tournament_id = t.id
                    JOIN teams ht ON m.home_team_id = ht.id
                    JOIN teams at ON m.away_team_id = at.id
                    WHERE m.status IN ('scheduled', 'live')
                    ORDER BY m.match_date ASC
                    LIMIT :limit";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error getting upcoming matches: " . $e->getMessage());
            return [];
        }
    }

    public function getActiveTournaments($type = null)
    {
        try {
            $sql = "SELECT * FROM tournaments WHERE status IN ('upcoming', 'ongoing')";

            if ($type) {
                $sql .= " AND tournament_type = :type";
            }

            $sql .= " ORDER BY start_date ASC";

            $stmt = $this->conn->prepare($sql);
            if ($type) {
                $stmt->bindParam(':type', $type);
            }
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error getting active tournaments: " . $e->getMessage());
            return [];
        }
    }
}