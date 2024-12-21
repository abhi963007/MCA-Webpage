<?php 
  session_start();
  if(isset($_SESSION['id_user'])) {
    header("Location: user/dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Candidate Login - CareerLink</title>

    <!-- Favicon and Fonts -->
    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
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

        /* Login Container */
        .login-container {
            position: relative;
            z-index: 2;
            padding: 40px 0;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            margin: 40px auto;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .login-title {
            color: #fff;
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 10px;
            display: block;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            height: 50px;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #FF5722;
            box-shadow: none;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .forgot-password {
            color: #FF5722;
            font-size: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 10px;
        }

        .forgot-password:hover {
            color: #fff;
            transform: translateX(5px);
            text-decoration: none;
        }

        .submit-btn {
            background: linear-gradient(45deg, #FF5722, #FF9800);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            padding: 12px 30px;
            width: 100%;
            margin-top: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 87, 34, 0.4);
        }

        /* Alert Messages */
        .alert {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 10px;
            color: #fff;
            padding: 15px;
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .alert-success {
            background: rgba(76, 175, 80, 0.3);
        }

        .alert-danger {
            background: rgba(244, 67, 54, 0.3);
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
        }

        footer img {
            width: 30px;
            margin: 0 10px;
            transition: transform 0.3s ease;
        }

        footer img:hover {
            transform: translateY(-5px);
        }

        @media (max-width: 768px) {
            .login-box {
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
                <li><a href="search.php">Search Jobs</a></li>
                <li><a href="mainregister.php">Register</a></li>
          </ul>
      </div>
    </nav>

    <!-- Login Section -->
    <div class="login-container">
        <div class="container">
            <div class="login-box">
                <h2 class="login-title">Candidate Login</h2>
                
                <form method="post" action="checklogin.php">
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
  </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                        <a href="forgot-password.php" class="forgot-password">Forgot Password?</a>
              </div>

                    <?php if(isset($_SESSION['registerCompleted'])): ?>
                        <div class="alert alert-success">You have registered successfully!</div>
                    <?php unset($_SESSION['registerCompleted']); endif; ?>

                    <?php if(isset($_SESSION['loginError'])): ?>
                        <div class="alert alert-danger">Invalid Email or Password</div>
                    <?php unset($_SESSION['loginError']); endif; ?>

                    <button type="submit" class="submit-btn">Login</button>
            </form>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>&copy; 2024-2025 <a href="index.php" style="color: #fff;">CAREERLINK.COM</a></p>
            <div>
                <a href="#"><img src="img/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="img/twitter.png" alt="Twitter"></a>
                <a href="#"><img src="img/youtube.png" alt="YouTube"></a>
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
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: '#ffffff' },
                shape: { type: 'circle' },
                opacity: {
                    value: 0.5,
                    random: true,
                    animation: { enable: true, speed: 1, opacity_min: 0.1, sync: false }
                },
                size: {
                    value: 3,
                    random: true,
                    animation: { enable: true, speed: 2, size_min: 0.1, sync: false }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#ffffff',
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: 'none',
                    random: true,
                    straight: false,
                    out_mode: 'out',
                    bounce: false,
                    attract: { enable: true, rotateX: 600, rotateY: 1200 }
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: { enable: true, mode: 'grab' },
                    onclick: { enable: true, mode: 'push' },
                    resize: true
                },
                modes: {
                    grab: { distance: 140, line_linked: { opacity: 1 } },
                    push: { particles_nb: 4 }
                }
            },
            retina_detect: true
        });

        // Fade out success message
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 3000);
      });
    </script>
  </body>
</html>