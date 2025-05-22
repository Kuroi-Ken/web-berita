<?php
session_start();
require_once 'config/database.php';
require_once 'data/news_data.php';

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$searchTerm = $_GET['q'] ?? '';
$results = [];

if (!empty($searchTerm)) {
    $newsData = new NewsData();
    $results = $newsData->searchNews($searchTerm);
    
    // Log pencarian untuk analytics
    try {
        $db = getDB();
        $userId = $_SESSION['user_id'] ?? null;
        $ipAddress = $_SERVER['REMOTE_ADDR'] ?? '';
        $resultsCount = count($results);
        
        $sql = "INSERT INTO search_logs (user_id, search_term, results_count, ip_address, created_at) 
                VALUES (:user_id, :search_term, :results_count, :ip_address, NOW())";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':search_term', $searchTerm);
        $stmt->bindParam(':results_count', $resultsCount);
        $stmt->bindParam(':ip_address', $ipAddress);
        $stmt->execute();
    } catch(PDOException $e) {
        error_log("Search logging error: " . $e->getMessage());
    }
}

header('Content-Type: application/json');
echo json_encode([
    'success' => true,
    'search_term' => $searchTerm,
    'results_count' => count($results),
    'results' => $results
]);
?>