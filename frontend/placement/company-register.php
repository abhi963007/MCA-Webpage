<?php
  session_start();
  if(isset($_SESSION['id_user'])) {
    header("Location: user/dashboard.php");
    exit();
  }
  require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company Registration - CareerLink</title>

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

        /* Registration Container */
        .register-container {
            position: relative;
            z-index: 2;
            padding: 40px 0;
        }

        .register-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            max-width: 800px;
            margin: 40px auto;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .register-title {
            color: #fff;
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .required-text {
            color: #FF5722;
            text-align: center;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label i {
            color: #FF5722;
            font-size: 14px;
        }

        .form-control {
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #FF5722;
            box-shadow: none;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .submit-btn {
            background: linear-gradient(45deg, #FF5722, #FF9800);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: 500;
            width: 100%;
            margin-top: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 87, 34, 0.4);
        }

        .alert {
            background: rgba(244, 67, 54, 0.2);
            border: none;
            color: #fff;
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
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
            .register-box {
                margin: 20px;
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

    <!-- Registration Section -->
    <div class="register-container">
        <div class="container">
            <div class="register-box">
                <h2 class="register-title">Company Registration</h2>
                <p class="required-text"><i class="fas fa-info-circle"></i> Fields marked with * are required</p>
                
                <form method="post" action="addcompany.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-building"></i> Company Name *
                                </label>
                                <input type="text" class="form-control" name="companyname" placeholder="Enter company name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-map-marker-alt"></i> Head Office City *
                                </label>
                                <input type="text" class="form-control" name="headofficecity" placeholder="Enter city" required>
            </div>
      </div>
    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-phone"></i> Contact Number *
                                </label>
                                <input type="tel" class="form-control" name="contactno" placeholder="Enter contact number" pattern=".{10,10}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-globe"></i> Website
                                </label>
                                <input type="url" class="form-control" name="website" placeholder="Enter website URL">
                            </div>
                        </div>
  </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-industry"></i> Company Type
                                </label>
                                <input type="text" class="form-control" name="companytype" placeholder="Enter company type">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-envelope"></i> Email Address *
                                </label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email address" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock"></i> Password *
                        </label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
          </div>

                    <?php if(isset($_SESSION['registerError'])): ?>
                        <div class="alert">
                            <i class="fas fa-exclamation-circle"></i> Email already exists!
          </div>
                    <?php unset($_SESSION['registerError']); endif; ?>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-user-plus"></i> Register Company
                    </button>
        </form>
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