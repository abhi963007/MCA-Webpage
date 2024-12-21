<?php
session_start();
include 'includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: #0c192c;
            overflow: hidden;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 25px rgba(0,0,0,0.2);
            transform-style: preserve-3d;
            perspective: 1000px;
            transition: transform 0.3s ease;
        }

        .login-box:hover {
            transform: translateZ(20px) rotateX(5deg) rotateY(5deg);
        }

        .login-box h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2em;
            transform: translateZ(30px);
        }

        .form-floating {
            margin-bottom: 20px;
        }

        .form-floating input {
            background: rgba(255, 255, 255, 0.1) !important;
            border: none !important;
            color: #fff !important;
            border-radius: 10px !important;
        }

        .form-floating label {
            color: #aaa !important;
        }

        .form-floating input:focus {
            box-shadow: 0 0 10px rgba(255,255,255,0.2) !important;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, #00a8ff, #0097e6);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,168,255,0.4);
        }

        .alert {
            background: rgba(255,255,255,0.1) !important;
            border: none !important;
            color: #ff6b6b !important;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        .floating {
            animation: float 4s ease-in-out infinite;
        }
    </style>
</head>
<body>
    <div id="particles-js"></div>

    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="login-box floating">
                    <h2>Admin Login</h2>
                    <?php if(isset($error)) { ?>
                        <div class="alert alert-danger text-center mb-4"><?php echo $error; ?></div>
                    <?php } ?>
                    <form method="POST" action="">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <button type="submit" class="btn-login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js',
        {
            "particles": {
                "number": {
                    "value": 80,
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
                    "value": 0.5,
                    "random": false
                },
                "size": {
                    "value": 3,
                    "random": true
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
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
                        "mode": "repulse"
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
