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
    <title>MCA CONTACT</title>
</head>
<body>
    <div class="mil-wrapper" id="top">
        <!-- Content goes here -->
        <footer class="mil-dark-bg">
            <div class="mi-invert-fix">
                <div class="container mil-p-120-60">
                    <div class="row justify-content-between">
                        <div class="col-md-4 col-lg-4 mil-mb-60">
                            <div class="mil-muted mil-logo mil-up mil-mb-30">MANGALAM COLLEGE OF ENGINEERING</div>
                            <p class="mil-muted">Contact: +91 123 456 7890</p>
                            <p class="mil-muted">Email: info@mca.edu</p>
                            <div class="mil-footer-socials">
                                <a href="#" class="mil-facebook mil-footer-social-link" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" class="mil-twitter mil-footer-social-link" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="mil-instagram mil-footer-social-link" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                <a href="#" class="mil-youtube mil-footer-social-link" target="_blank">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </div>
                            <div class="mil-footer-copyright">
                                <p class="mil-muted">2023 MCA Department. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->
    </div>
    <!-- wrapper end -->
    <!-- jQuery js -->
    <script src="js/plugins/jquery.min.js"></script>
    <script src="js/plugins/swiper.min.js"></script>
    <script src="js/plugins/fancybox.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
