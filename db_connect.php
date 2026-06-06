<?php
// Online O-Level Book Purchasing System - Secure Database Connection
// Developer: Nasri Jabiri : Registration Number - 14325011/T.24

// Define local server configuration settings for your environment
$host     = 'localhost';
$db_name  = 'olevel_books_db';
$username = 'root';
$password = ''; // Default database password for XAMPP environments is empty
$charset  = 'utf8mb4';

// Establish the Data Source Name string
$dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";

// Set professional, secure configuration choices
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Displays precise errors clearly if queries fail
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetches data rows as clean arrays
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Disables emulation to protect strictly against SQL Injections
];

try {
    // Attempt to open a live connection instance to your MySQL database system
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    // If connection drops, stop operation immediately and safely hide deep server paths
    die("System Database connection failed safely: " . $e->getMessage());
}
?>
