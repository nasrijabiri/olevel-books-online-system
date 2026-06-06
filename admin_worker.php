<?php
// Online O-Level Book Purchasing System - Admin Processing Worker API

header('Content-Type: application/json');
require_once 'db_connect.php';

// Check if request is an incoming POST form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title     = isset($_POST['title']) ? trim($_POST['title']) : '';
    $cat_id    = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;
    $price     = isset($_POST['price']) ? floatval($_POST['price']) : 0.0;
    $stock     = isset($_POST['stock_quantity']) ? intval($_POST['stock_quantity']) : 0;
    $author    = 'TIE'; 
    $desc      = 'Official curriculum textbook mapped according to the national syllabus specifications.';

    if (!empty($title) && $cat_id > 0 && $price > 0) {
        try {
            // Prepared statement to stop SQL Injection completely
            $stmt = $pdo->prepare("INSERT INTO books (category_id, title, author, description, price, stock_quantity) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$cat_id, $title, $author, $desc, $price, $stock]);
            
            echo json_encode(['status' => 'success', 'message' => 'Textbook entry successfully inserted into the system!']);
        } catch (\PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Validation failed. Please check inputs.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
