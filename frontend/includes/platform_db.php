<?php
if (isset($_ENV['PLATFORM_RELATIONSHIPS'])) {
    $relationships = json_decode(base64_decode($_ENV['PLATFORM_RELATIONSHIPS']), true);
    
    // Get database credentials from Platform.sh
    $credentials = $relationships['database'][0];
    
    $servername = $credentials['host'];
    $username = $credentials['username'];
    $password = $credentials['password'];
    $dbname = $credentials['path'];
    $port = $credentials['port'];
} else {
    // Local development credentials
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'college_db';
    $port = 3306;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> 