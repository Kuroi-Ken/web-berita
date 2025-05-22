<?php
session_start();
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/data/news_data.php';

header('Content-Type: application/json');

if (!isset($_SESSION['username'])) {
    echo json_encode([
        'success' => false,
        'error' => 'User not authenticated',
        'redirect' => 'php/login.php'
    ]);
    exit();
}

$searchTerm = $_GET['q'] ?? '';
$results = [];
$error = null;

if (empty($searchTerm)) {
    echo json_encode([
        'success' => false,
        'error' => 'Search term is required',
        'search_term' => '',
        'results_count' => 0,
        'results' => []
    ]);
    exit();
}

try {
    $newsData = new NewsData();
    $results = $newsData->searchNews($searchTerm);

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
    } catch (PDOException $e) {
        error_log("Search logging error: " . $e->getMessage());
    }

    echo json_encode([
        'success' => true,
        'search_term' => htmlspecialchars($searchTerm),
        'results_count' => count($results),
        'results' => $results,
        'suggestions' => count($results) === 0 ? [
            'valorant',
            'mobile legends',
            'dota 2',
            'tournament',
            'esports'
        ] : []
    ]);
} catch (Exception $e) {
    error_log("Search error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'error' => 'Search failed. Please try again.',
        'search_term' => htmlspecialchars($searchTerm),
        'results_count' => 0,
        'results' => []
    ]);
}