<?php
session_start();
include 'includes/db_connect.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

// Generate CSRF token if not exists
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        if ($_POST['action'] == 'add') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $duration = $_POST['duration'];
            $fees = $_POST['fees'];
            
            $sql = "INSERT INTO courses (title, description, duration, fees) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $title, $description, $duration, $fees);
            
            if($stmt->execute()) {
                $_SESSION['success_message'] = "Course added successfully!";
                header("Location: manage_courses.php");
                exit();
            } else {
                $error = "Error adding course.";
            }
            
        } elseif ($_POST['action'] == 'delete' && isset($_POST['course_id'])) {
            $course_id = $_POST['course_id'];
            
            $sql = "DELETE FROM courses WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $course_id);
            
            if($stmt->execute()) {
                $_SESSION['success_message'] = "Course deleted successfully!";
                header("Location: manage_courses.php");
                exit();
            } else {
                $error = "Error deleting course.";
            }
        }
    } else if (isset($_POST['action'])) {
        $error = "Invalid form submission. Please try again.";
    }
}

// Display success message from session if exists
if (isset($_SESSION['success_message'])) {
    $success = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

// Fetch all courses
$sql = "SELECT * FROM courses ORDER BY title";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
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

        .sidebar {
            background: var(--sidebar-bg);
            min-height: 100vh;
            padding: 20px 0;
            position: fixed;
            width: 250px;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .card-header {
            background: var(--card-bg);
            border-bottom: 1px solid rgba(0,0,0,0.1);
            padding: 20px;
            border-radius: 15px 15px 0 0 !important;
        }

        .card-body {
            padding: 20px;
        }

        .btn-primary {
            background: #3490dc;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
        }

        .btn-danger {
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
        }

        .table {
            margin: 0;
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: #555;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid rgba(0,0,0,0.1);
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(52,144,220,0.25);
        }

        .alert {
            border-radius: 10px;
            padding: 15px 20px;
        }

        .course-action-btn {
            padding: 6px 12px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .course-action-btn:hover {
            transform: translateY(-2px);
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 4px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
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
            <a href="dashboard.php" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="manage_courses.php" class="nav-link active">
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
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Manage Courses</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                    <i class="fas fa-plus me-2"></i>Add New Course
                </button>
            </div>

            <?php if(isset($success)): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $success; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if(isset($error)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $error; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Courses List -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Current Courses</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Fees</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                                        <td><?php echo substr(htmlspecialchars($row['description']), 0, 100) . '...'; ?></td>
                                        <td><?php echo htmlspecialchars($row['duration']); ?></td>
                                        <td><?php echo htmlspecialchars($row['fees']); ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-info course-action-btn me-2" 
                                                    onclick="editCourse(<?php echo $row['id']; ?>)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form method="POST" action="" style="display: inline;">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                                <input type="hidden" name="course_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger course-action-btn" 
                                                        onclick="return confirm('Are you sure you want to delete this course?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Course Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <div class="mb-3">
                            <label class="form-label">Course Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Duration</label>
                            <input type="text" class="form-control" name="duration" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fees</label>
                            <input type="text" class="form-control" name="fees" required>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function editCourse(courseId) {
            // Implement edit functionality
            console.log('Editing course:', courseId);
        }
    </script>
</body>
</html>
