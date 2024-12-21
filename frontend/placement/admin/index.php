<?php 
  session_start();
  if(isset($_SESSION['id_admin'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - CareerLink</title>

    <!-- Favicon and Fonts -->
    <link rel="icon" href="../img/favicon.png" type="image/x-icon"/>
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
            perspective: 1000px;
        }

        #particles-js {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

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
            max-width: 400px;
            margin: 40px auto;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            transform-style: preserve-3d;
            transform: rotateX(5deg) rotateY(0deg);
            transition: transform 0.5s ease;
        }

        .login-box:hover {
            transform: rotateX(0deg) rotateY(0deg) translateZ(20px);
        }

        .login-title {
            color: #fff;
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
            font-weight: 600;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 25px;
            transform-style: preserve-3d;
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

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            height: 50px;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
            transform: translateZ(10px);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .submit-btn {
            background: linear-gradient(45deg, #FF5722, #FF9800);
            border: none;
            border-radius: 10px;
            color: white;
            padding: 12px 30px;
            font-size: 18px;
            font-weight: 500;
            width: 100%;
            margin-top: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            transform: translateZ(15px);
            box-shadow: 0 5px 15px rgba(255, 87, 34, 0.3);
        }

        .submit-btn:hover {
            transform: translateZ(25px);
            box-shadow: 0 8px 25px rgba(255, 87, 34, 0.4);
        }

        .error-message {
            background: rgba(255, 87, 34, 0.1);
            border-left: 4px solid #FF5722;
            color: #fff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        footer {
            position: relative;
            z-index: 2;
            background: rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }

        .social-icons img {
            width: 30px;
            height: 30px;
            margin: 0 10px;
            transition: all 0.3s ease;
            filter: brightness(0) invert(1);
        }

        .social-icons img:hover {
            transform: translateY(-3px);
        }
    </style>
  </head>
  <body>
    <!-- Particles.js Container -->
    <div id="particles-js"></div>

    <!-- Navigation -->
    <nav class="navbar">
  <div class="container">
        <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">CAREERLINK</a>
            </div>
      </div>
    </nav>

    <!-- Login Form -->
    <div class="login-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="login-box">
                        <h1 class="login-title">
                            <i class="fas fa-user-shield"></i> Admin Login
                        </h1>

                        <?php if(isset($_SESSION['loginError'])): ?>
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i> Invalid Username or Password
  </div>
                        <?php unset($_SESSION['loginError']); endif; ?>

            <form method="post" action="checklogin.php">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-user"></i> Username
                                </label>
                                <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-lock"></i> Password
                                </label>
                                <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
              </div>

                            <button type="submit" class="submit-btn">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
            </form>
                    </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>&copy; 2024-2025 <a href="../index.php" style="color: white;">CAREERLINK.COM</a></p>
            <div class="social-icons">
                <a href="https://www.facebook.com/TataConsultancyServices" target="_blank">
                    <img src="../img/facebook.png" alt="Facebook">
                </a>
                <a href="https://www.twitter.com/tcs" target="_blank">
                    <img src="../img/twitter.png" alt="Twitter">
                </a>
                <a href="https://www.youtube.com/channel/UCaHyiyvJp4hhPNhIU7r9uqg" target="_blank">
                    <img src="../img/youtube.png" alt="YouTube">
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

        // Add 3D effect on mouse move
        document.addEventListener('mousemove', function(e) {
            const loginBox = document.querySelector('.login-box');
            const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
            const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
            loginBox.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
        });

        // Reset transform on mouse leave
        const loginBox = document.querySelector('.login-box');
        loginBox.addEventListener('mouseleave', function() {
            loginBox.style.transform = 'rotateY(0) rotateX(0)';
      });
    </script>
  </body>
</html>