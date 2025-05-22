<?php
require_once __DIR__ . '/../config/database.php';

class NewsData
{
    private $conn;

    public function __construct()
    {
        $this->conn = getDB();
    }

    public function getLatestNews($limit = 10)
    {
        try {
            $sql = "SELECT * FROM latest_news LIMIT :limit";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error getting latest news: " . $e->getMessage());
            return [];
        }
    }

    public function getNewsByCategory($categorySlug, $limit = 10)
    {
        try {
            $sql = "SELECT na.*, c.name as category_name, u.username as author_name 
                    FROM news_articles na
                    LEFT JOIN categories c ON na.category_id = c.id
                    LEFT JOIN users u ON na.author_id = u.id
                    WHERE c.slug = :category_slug AND na.status = 'published'
                    ORDER BY na.published_at DESC
                    LIMIT :limit";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':category_slug', $categorySlug);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error getting news by category: " . $e->getMessage());
            return [];
        }
    }

    public function searchNews($searchTerm, $limit = 20)
    {
        try {
            $searchTerm = "%{$searchTerm}%";
            $sql = "SELECT na.*, c.name as category_name, u.username as author_name 
                    FROM news_articles na
                    LEFT JOIN categories c ON na.category_id = c.id
                    LEFT JOIN users u ON na.author_id = u.id
                    WHERE (na.title LIKE :search OR na.content LIKE :search OR na.excerpt LIKE :search)
                    AND na.status = 'published'
                    ORDER BY na.published_at DESC
                    LIMIT :limit";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':search', $searchTerm);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error searching news: " . $e->getMessage());
            return [];
        }
    }

    public function getRecommendedNews($limit = 3)
    {
        try {
            $sql = "SELECT * FROM latest_news 
                    ORDER BY views DESC, published_at DESC 
                    LIMIT :limit";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error getting recommended news: " . $e->getMessage());
            return [];
        }
    }

    public function incrementViews($articleId)
    {
        try {
            $sql = "UPDATE news_articles SET views = views + 1 WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $articleId);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error incrementing views: " . $e->getMessage());
            return false;
        }
    }
}