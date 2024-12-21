<?php
session_start();
if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}
require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - CareerLink</title>

    <!-- Favicon and Fonts -->
    <link rel="icon" href="../img/favicon.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f5f7fb;
            min-height: 100vh;
        }

        /* Navbar Styles */
        .navbar {
            background: white !important;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .navbar-brand {
            font-size: 28px !important;
            font-weight: 700;
            color: #1a237e !important;
            letter-spacing: 1px;
        }

        .navbar-nav > li > a {
            color: #333 !important;
            font-size: 16px;
            font-weight: 500;
            padding: 20px 15px;
            transition: all 0.3s ease;
        }

        .navbar-nav > li > a:hover {
            color: #FF5722 !important;
            transform: translateY(-2px);
        }

        /* Dashboard Header */
        .dashboard-header {
            background: linear-gradient(135deg, #1a237e, #0d47a1);
            padding: 40px 0;
            color: white;
            margin-bottom: 40px;
        }

        .dashboard-header h1 {
            margin: 0;
            font-size: 36px;
            font-weight: 600;
        }

        .dashboard-header p {
            margin: 10px 0 0;
            opacity: 0.9;
            font-size: 16px;
        }

        /* Stats Cards */
        .stats-container {
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            font-size: 40px;
            margin-bottom: 15px;
            color: #1a237e;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 600;
            color: #1a237e;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-size: 16px;
        }

        /* Quick Actions */
        .quick-actions {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 40px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px 20px;
            background: #f8f9fa;
            border-radius: 10px;
            color: #333;
            text-decoration: none;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background: #1a237e;
            color: white;
            transform: translateX(5px);
            text-decoration: none;
        }

        .action-btn i {
            font-size: 20px;
        }

        /* Recent Activity */
        .recent-activity {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f0f4ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1a237e;
        }

        .activity-details h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 500;
        }

        .activity-details p {
            margin: 5px 0 0;
            color: #666;
            font-size: 14px;
        }
    </style>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar">
  <div class="container">
        <div class="navbar-header">
                <a class="navbar-brand" href="dashboard.php">CAREERLINK</a>
        </div>
          <ul class="nav navbar-nav navbar-right">
                <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
          </ul>
      </div>
    </nav>

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="container">
            <h1><i class="fas fa-tachometer-alt"></i> Admin Dashboard</h1>
            <p>Welcome back, Administrator!</p>
  </div>
  </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Stats Row -->
        <div class="row stats-container">
            <?php
            // Get total users count
            $sql = "SELECT COUNT(*) as count FROM users";
            $result = $conn->query($sql);
            $usersCount = $result->fetch_assoc()['count'];

            // Get total companies count
            $sql = "SELECT COUNT(*) as count FROM company";
            $result = $conn->query($sql);
            $companiesCount = $result->fetch_assoc()['count'];

            // Get total job posts count
            $sql = "SELECT COUNT(*) as count FROM job_post";
            $result = $conn->query($sql);
            $jobsCount = $result->fetch_assoc()['count'];
            ?>
            <div class="col-md-4">
                <div class="stat-card">
                    <i class="fas fa-users stat-icon"></i>
                    <div class="stat-number"><?php echo $usersCount; ?></div>
                    <div class="stat-label">Total Users</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <i class="fas fa-building stat-icon"></i>
                    <div class="stat-number"><?php echo $companiesCount; ?></div>
                    <div class="stat-label">Total Companies</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <i class="fas fa-briefcase stat-icon"></i>
                    <div class="stat-number"><?php echo $jobsCount; ?></div>
                    <div class="stat-label">Active Job Posts</div>
                </div>
          </div>
        </div>

        <!-- Quick Actions -->
        <div class="row">
            <div class="col-md-6">
                <div class="quick-actions">
                    <h3 class="mb-4"><i class="fas fa-bolt"></i> Quick Actions</h3>
                    <a href="user.php" class="action-btn">
                        <i class="fas fa-users"></i>
                        Manage Users
                    </a>
                    <a href="company.php" class="action-btn">
                        <i class="fas fa-building"></i>
                        Manage Companies
                    </a>
                    <a href="job-posts.php" class="action-btn">
                        <i class="fas fa-briefcase"></i>
                        Manage Job Posts
                    </a>
                    <a href="add-alumini.php" class="action-btn">
                        <i class="fas fa-user-graduate"></i>
                        Manage Alumni
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="recent-activity">
                    <h3 class="mb-4"><i class="fas fa-clock"></i> Recent Activity</h3>
                    <?php
                    // Get recent job posts
                    $sql = "SELECT * FROM job_post ORDER BY createdat DESC LIMIT 5";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <div class="activity-item">
                                <div class="activity-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="activity-details">
                                    <h4>New Job Posted</h4>
                                    <p><?php echo $row['jobtitle']; ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
        </div>
      </div>
    </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5">
        <div class="container text-center">
            <p>&copy; 2024-2025 <a href="../index.php">CAREERLINK.COM</a></p>
        </div>
  </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>