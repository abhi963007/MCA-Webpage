<?php
  session_start();
  if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) {
    header("Location: user/dashboard.php");
    exit();
  } else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) {
  header("Location: company/dashboard.php");
  exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration - CareerLink</title>

    <!-- Favicon and Fonts -->
    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
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
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
        }

        /* Navigation */
        .nav-container {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 15px 0;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .nav-brand {
            color: white;
            font-size: 24px;
            font-weight: 700;
            text-decoration: none;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 30px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .nav-links a:hover {
            color: #ff5252;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 100px 20px 40px;
            position: relative;
            z-index: 2;
        }

        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 1000px;
            position: relative;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .register-title {
            color: white;
            text-align: center;
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .required-note {
            color: #ff5252;
            text-align: center;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .form-col {
            flex: 1;
            padding: 0 10px;
            min-width: 250px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            color: white;
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group label i {
            margin-right: 8px;
            color: #ff5252;
        }

        .form-control {
            width: 100%;
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            color: white;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 82, 82, 0.1);
        }

        .resume-upload {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 8px;
            border: 1px dashed rgba(255, 255, 255, 0.3);
            margin-bottom: 20px;
        }

        .btn-register {
            width: 100%;
            padding: 15px;
            background: #ff5252;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: #ff1744;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 82, 82, 0.3);
        }

        .error-message {
            background: rgba(255, 82, 82, 0.1);
            color: #ff5252;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .nav-content {
                flex-direction: column;
                text-align: center;
            }

            .nav-links {
                margin-top: 15px;
            }

            .nav-links a {
                margin: 0 15px;
            }

            .register-container {
                padding: 20px;
            }

            .form-col {
                flex: 100%;
            }
        }
    </style>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="nav-container">
        <div class="nav-content">
            <a href="index.php" class="nav-brand">CAREERLINK</a>
            <div class="nav-links">
                <a href="search.php"><i class="fas fa-search"></i> Search Jobs</a>
                <a href="mainregister.php"><i class="fas fa-user-plus"></i> Register</a>
                <a href="mainlogin.php"><i class="fas fa-sign-in-alt"></i> Login</a>
          </div>
        </div>
      </nav>

    <!-- Particles.js Container -->
    <div id="particles-js"></div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="register-container">
            <h1 class="register-title">Student Registration</h1>
            <p class="required-note"><i class="fas fa-info-circle"></i> Fields marked with * are required</p>

            <?php if(isset($_SESSION['registerError']) || isset($_SESSION['uploadError'])) { ?>
                <div class="error-message">
          <?php 
              if(isset($_SESSION['registerError'])) {
                        echo '<i class="fas fa-exclamation-circle"></i> Email Already Exists! Please choose a different email.';
                        unset($_SESSION['registerError']);
                    }
                    if(isset($_SESSION['uploadError'])) {
                        echo '<i class="fas fa-exclamation-circle"></i> ' . $_SESSION['uploadError'];
                        unset($_SESSION['uploadError']);
                    }
                    ?>
                </div>
            <?php } ?>

            <form method="post" action="adduser.php" enctype="multipart/form-data">
                <!-- Personal Information -->
                <div class="form-row">
                    <div class="form-col">
              <div class="form-group">
                            <label><i class="fas fa-user"></i> First Name *</label>
                            <input type="text" class="form-control" name="fname" placeholder="Enter first name" required>
              </div>
            </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label><i class="fas fa-user"></i> Last Name *</label>
                            <input type="text" class="form-control" name="lname" placeholder="Enter last name" required>
              </div>
              </div>
              </div>

                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label><i class="fas fa-envelope"></i> Email Address *</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email address" required>
              </div>
              </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label><i class="fas fa-lock"></i> Password *</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
              </div>
              </div>
              </div>

                <!-- Contact Information -->
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label><i class="fas fa-phone"></i> Contact Number *</label>
                            <input type="tel" class="form-control" name="contactno" placeholder="Enter contact number" required>
          </div>    
              </div>
                    <div class="form-col">
              <div class="form-group">
                            <label><i class="fas fa-calendar"></i> Date of Birth *</label>
                            <input type="date" class="form-control" name="dob" required>
                        </div>
                    </div>
              </div>

                <!-- Educational Information -->
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label><i class="fas fa-graduation-cap"></i> Qualification *</label>
                            <input type="text" class="form-control" name="qualification" placeholder="Enter qualification" required>
              </div>
              </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label><i class="fas fa-stream"></i> Stream</label>
                            <input type="text" class="form-control" name="stream" placeholder="Enter stream">
              </div>
              </div>
              </div>

                <div class="form-group">
                    <label><i class="fas fa-map-marker-alt"></i> Address *</label>
                    <textarea class="form-control" name="address" placeholder="Enter your address" required></textarea>
          </div>

                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label><i class="fas fa-city"></i> City</label>
                            <input type="text" class="form-control" name="city" placeholder="Enter city">
      </div>
    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label><i class="fas fa-map"></i> State</label>
                            <input type="text" class="form-control" name="state" placeholder="Enter state">
                        </div>
  </div>
  </div>

                <div class="resume-upload">
                    <label><i class="fas fa-file-pdf"></i> Upload Resume (PDF or DOC) *</label>
                    <input type="file" class="form-control" name="resume" accept=".pdf,.doc,.docx" required>
  </div>

                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus"></i> Complete Registration
                </button>
            </form>
    </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 50,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle"
                },
                "opacity": {
                    "value": 0.3,
                    "random": true
                },
                "size": {
                    "value": 3,
                    "random": true
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.2,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                }
            },
            "retina_detect": true
        });
    </script>
  </body>
</html>