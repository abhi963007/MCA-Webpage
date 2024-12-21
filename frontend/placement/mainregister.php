<?php

session_start();
require_once("db.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register - CareerLink</title>

    <!-- Favicon and Fonts -->
    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Particles.js -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #1a237e;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Particle Background */
        #particles-js {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        /* Navbar Styles */
        .navbar {
            background-color: rgba(255, 255, 255, 0.1) !important;
            border: none;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            position: relative;
            z-index: 2;
        }

        .navbar-brand {
            font-size: 28px !important;
            font-weight: 700;
            color: #fff !important;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .navbar-nav > li > a {
            color: #fff !important;
            font-size: 16px;
            font-weight: 500;
            padding: 20px 15px;
            transition: all 0.3s ease;
        }

        .navbar-nav > li > a:hover {
            color: #FF5722 !important;
            transform: translateY(-2px);
        }

        /* Header Banner */
        .header-banner {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 40px 0;
            color: white;
            text-align: center;
            margin-bottom: 50px;
        }

        .header-banner h1 {
            font-size: 48px;
            font-weight: 700;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Registration Cards */
        .register-options {
            position: relative;
            z-index: 2;
            padding: 40px 0;
        }

        .register-cards-container {
            display: flex;
            justify-content: center;
            align-items: stretch;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }

        .register-card {
            flex: 1;
            min-width: 300px;
            max-width: 350px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .register-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.8;
            transition: all 0.3s ease;
        }

        .register-card.candidate::before {
            background: linear-gradient(135deg, #FF5722, #FF9800);
        }

        .register-card.company::before {
            background: linear-gradient(135deg, #2196F3, #03A9F4);
        }

        .register-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .register-card:hover::before {
            opacity: 0.9;
        }

        .register-card a {
            position: relative;
            color: white;
            text-decoration: none;
            display: block;
            padding: 40px 20px;
            height: 100%;
            z-index: 1;
            text-align: center;
        }

        .register-card .icon {
            font-size: 54px;
            margin-bottom: 25px;
            display: block;
            color: rgba(255, 255, 255, 0.95);
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .register-card:hover .icon {
            transform: scale(1.1);
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .register-card h2 {
            color: white;
            font-size: 28px;
            font-weight: 600;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Footer */
        footer {
            position: relative;
            z-index: 2;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 20px 0;
            color: #fff;
            margin-top: 50px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .social-icons img {
            width: 30px;
            transition: transform 0.3s ease;
        }

        .social-icons img:hover {
            transform: translateY(-5px);
        }

        @media (max-width: 768px) {
            .register-card {
                min-width: 100%;
                margin: 10px 20px;
            }
            
            .header-banner h1 {
                font-size: 36px;
            }
        }
    </style>
  </head>
  <body>
    <!-- Particles Container -->
    <div id="particles-js"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">CAREERLINK</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])): ?>
                    <li><a href="user/dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php elseif(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])): ?>
                    <li><a href="company/dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="search.php">Search Jobs</a></li>
                    <li><a href="mainregister.php">Register</a></li>
                    <li><a href="mainlogin.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <!-- Header Banner -->
    <div class="header-banner">
        <h1>Choose Registration Type</h1>
    </div>

    <!-- Registration Options -->
    <div class="container-fluid register-options">
        <div class="register-cards-container">
            <div class="register-card candidate">
                <a href="register.php">
                    <i class="icon fa-solid fa-user-plus"></i>
                    <h2>Candidate Register</h2>
                </a>
            </div>
            
            <div class="register-card company">
                <a href="company-register.php">
                    <i class="icon fa-solid fa-building-user"></i>
                    <h2>Company Register</h2>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>&copy; 2024-2025 <a href="index.php" style="color: #fff;">CAREERLINK.COM</a></p>
            <div class="social-icons">
                <a href="https://www.facebook.com/TataConsultancyServices" target="_blank">
                    <img src="img/facebook.png" alt="Facebook">
                </a>
                <a href="https://www.twitter.com/tcs" target="_blank">
                    <img src="img/twitter.png" alt="Twitter">
                </a>
                <a href="https://www.youtube.com/channel/UCaHyiyvJp4hhPNhIU7r9uqg" target="_blank">
                    <img src="img/youtube.png" alt="YouTube">
                </a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script>
        // Initialize particles.js
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 50,
                    density: {
                        enable: true,
                        value_area: 1000
                    }
                },
                color: { value: '#ffffff' },
                shape: { 
                    type: 'circle',
                    stroke: {
                        width: 0
                    }
                },
                opacity: {
                    value: 0.6,
                    random: false,
                    animation: {
                        enable: true,
                        speed: 0.5,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 3,
                    random: true,
                    animation: {
                        enable: true,
                        speed: 1,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#ffffff',
                    opacity: 0.3,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 1,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'bounce',
                    bounce: false,
                    attract: {
                        enable: true,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'grab'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 140,
                        line_linked: {
                            opacity: 0.8
                        }
                    },
                    push: {
                        particles_nb: 2
                    }
                }
            },
            retina_detect: true
        });
    </script>
  </body>
</html>
