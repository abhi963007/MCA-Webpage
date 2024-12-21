<?php
// Database connection
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mca_website';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/plugins/bootstrap-grid.css">
    <link rel="stylesheet" href="css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="css/plugins/swiper.min.css">
    <link rel="stylesheet" href="css/plugins/fancybox.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>MCA - College Pictures</title>
</head>
<body>
    <div class="mil-wrapper" id="top">
        <!-- Content goes here -->
    </div>
    <!-- jQuery js -->
</body>
</html>
