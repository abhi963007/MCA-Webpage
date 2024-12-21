<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include 'includes/db_connect.php';

// Fetch quick stats
$stats = [
    'courses' => $conn->query("SELECT COUNT(*) as count FROM courses")->fetch_assoc()['count'],
    'faculty' => $conn->query("SELECT COUNT(*) as count FROM faculty")->fetch_assoc()['count'],
    'events' => $conn->query("SELECT COUNT(*) as count FROM events")->fetch_assoc()['count'],
    'gallery' => $conn->query("SELECT COUNT(*) as count FROM gallery")->fetch_assoc()['count'],
];

// Fetch recent events
$recent_events = $conn->query("SELECT * FROM events ORDER BY event_date DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-bg: #f8f9fa;
            --sidebar-bg: #2c3e50;
            --card-bg: #ffffff;
        }

        body {
            background: var(--primary-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar Styles */
        .sidebar {
            background: var(--sidebar-bg);
            min-height: 100vh;
            padding: 20px 0;
            position: fixed;
            width: 250px;
            display: flex;
            flex-direction: column;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 4px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: #fff;
            text-decoration: none;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar .nav-link span {
            font-size: 14px;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        /* Card Styles */
        .stat-card {
            background: var(--card-bg);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card .icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .stat-card h3 {
            font-size: 28px;
            margin: 10px 0;
        }

        /* Recent Events Table */
        .events-table {
            background: var(--card-bg);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .table {
            margin: 0;
        }

        /* Custom Colors */
        .bg-purple { background: rgba(149, 97, 226, 0.1); color: #9561e2; }
        .bg-blue { background: rgba(52, 144, 220, 0.1); color: #3490dc; }
        .bg-orange { background: rgba(255, 159, 67, 0.1); color: #ff9f43; }

        /* Navbar Styles */
        .top-navbar {
            background: var(--card-bg);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 15px 30px;
            margin-bottom: 30px;
        }

        .profile-menu .dropdown-menu {
            right: 0;
            left: auto;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="d-flex align-items-center justify-content-center mb-4">
            <h4 class="text-white mb-0">Admin Panel</h4>
        </div>
        <div class="nav flex-column">
            <a href="../index.php" class="nav-link">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="dashboard.php" class="nav-link active">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="manage_courses.php" class="nav-link">
                <i class="fas fa-graduation-cap"></i>
                <span>Courses</span>
            </a>
            <a href="manage_faculty.php" class="nav-link">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Faculty</span>
            </a>
            <a href="manage_events.php" class="nav-link">
                <i class="fas fa-calendar-alt"></i>
                <span>Events</span>
            </a>
            <a href="manage_gallery.php" class="nav-link">
                <i class="fas fa-images"></i>
                <span>Gallery</span>
            </a>
            <div class="mt-auto">
                <hr class="bg-light opacity-25 my-4">
                <a href="logout.php" class="nav-link text-danger">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="top-navbar">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Dashboard Overview</h4>
                <div class="profile-menu">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle text-dark" type="button" id="profileDropdown" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> Admin
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-4">
                <div class="stat-card">
                    <div class="icon bg-purple">
                        <i class="fas fa-book"></i>
                    </div>
                    <p class="text-muted mb-2">Total Courses</p>
                    <h3><?php echo $stats['courses']; ?></h3>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-card">
                    <div class="icon bg-blue">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <p class="text-muted mb-2">Faculty Members</p>
                    <h3><?php echo $stats['faculty']; ?></h3>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-card">
                    <div class="icon bg-orange">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <p class="text-muted mb-2">Upcoming Events</p>
                    <h3><?php echo $stats['events']; ?></h3>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-card">
                    <div class="icon bg-info bg-opacity-25 text-info">
                        <i class="fas fa-images"></i>
                    </div>
                    <h3><?php echo $stats['gallery']; ?></h3>
                    <p class="text-muted mb-0">Gallery Items</p>
                </div>
            </div>
        </div>

        <!-- Recent Events Table -->
        <div class="events-table">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0">Recent Events</h5>
                <a href="manage_events.php" class="btn btn-primary btn-sm">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Event Title</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($event = $recent_events->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($event['title']); ?></td>
                            <td><?php echo date('M d, Y', strtotime($event['event_date'])); ?></td>
                            <td><?php echo substr(htmlspecialchars($event['description']), 0, 100) . '...'; ?></td>
                            <td>
                                <?php 
                                $event_date = strtotime($event['event_date']);
                                $today = time();
                                if($event_date < $today):
                                ?>
                                    <span class="badge bg-secondary">Past</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Upcoming</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
