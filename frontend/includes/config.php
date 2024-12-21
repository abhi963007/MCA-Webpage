<?php
// Database configuration
define('DB_HOST', 'YOUR_DB_HOST');     // Usually 'localhost' or provided by host
define('DB_USERNAME', 'YOUR_DB_USER');
define('DB_PASSWORD', 'YOUR_DB_PASSWORD');
define('DB_NAME', 'YOUR_DB_NAME');

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Site URL
define('SITE_URL', 'YOUR_SITE_URL');   // e.g., 'https://yourdomain.com'

// Initialize database connection
try {
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    // Set charset to utf8
    $conn->set_charset("utf8");
    
} catch (Exception $e) {
    error_log("Database connection failed: " . $e->getMessage());
    // In production, show a user-friendly error
    if (!defined('IS_DEVELOPMENT') || !IS_DEVELOPMENT) {
        die("We're experiencing technical difficulties. Please try again later.");
    } else {
        die($e->getMessage());
    }
}
?>
