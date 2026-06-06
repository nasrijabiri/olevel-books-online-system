<?php
// Online O-Level Book Purchasing System - Background Search API
// Developer: Nasri Jabiri: Registration Number - 14325011/T.24

header('Content-Type: application/json');
require_once 'db_connect.php';

$search = isset($_GET['query']) ? trim($_GET['query']) : '';

try {
    if (!empty($search)) {
        // Query database safely with prepared statement placeholders to block malicious strings
        $stmt = $pdo->prepare("SELECT b.*, c.category_name FROM books b JOIN categories c ON b.category_id = c.category_id WHERE b.title LIKE ? OR c.category_name LIKE ? ORDER BY b.title ASC");
        $stmt->execute(["%$search%", "%$search%"]);
    } else {
        // Fallback default dataset to populate the page on initial load
        $stmt = $pdo->query("SELECT b.*, c.category_name FROM books b JOIN categories c ON b.category_id = c.category_id ORDER BY b.book_id ASC LIMIT 6");
    }
    
    $books = $stmt->fetchAll();
    echo json_encode($books); 
} catch (\PDOException $e) {
    echo json_encode(['error' => 'Database operation error occurred safely']);
}
?>
