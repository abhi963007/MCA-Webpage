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
            $name = $_POST['name'];
            $designation = $_POST['designation'];
            $department = $_POST['department'];
            $email = $_POST['email'];
            
            // Handle image upload
            $target_dir = "../uploads/faculty/";
            $image_path = "";
            
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                $file_extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                $new_filename = uniqid() . '.' . $file_extension;
                $target_file = $target_dir . $new_filename;
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image_path = "uploads/faculty/" . $new_filename;
                }
            }
            
            $sql = "INSERT INTO faculty (name, designation, department, email, image_path) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $name, $designation, $department, $email, $image_path);
            
            if($stmt->execute()) {
                $_SESSION['success_message'] = "Faculty member added successfully!";
                header("Location: manage_faculty.php");
                exit();
            } else {
                $error = "Error adding faculty member.";
            }
            
        } elseif ($_POST['action'] == 'delete' && isset($_POST['faculty_id'])) {
            $faculty_id = $_POST['faculty_id'];
            
            // Delete associated image first
            $sql = "SELECT image_path FROM faculty WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $faculty_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                if (!empty($row['image_path'])) {
                    unlink("../" . $row['image_path']);
                }
            }
            
            // Delete faculty record
            $sql = "DELETE FROM faculty WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $faculty_id);
            
            if($stmt->execute()) {
                $_SESSION['success_message'] = "Faculty member deleted successfully!";
                header("Location: manage_faculty.php");
                exit();
            } else {
                $error = "Error deleting faculty member.";
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

// Fetch all faculty
$sql = "SELECT * FROM faculty ORDER BY name";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Faculty</title>
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

        .faculty-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .faculty-img-preview {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
            margin-top: 10px;
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

        .faculty-action-btn {
            padding: 6px 12px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .faculty-action-btn:hover {
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 10px;
            padding: 15px 20px;
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
            <a href="dashboard.php" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="manage_courses.php" class="nav-link">
                <i class="fas fa-graduation-cap"></i>
                <span>Courses</span>
            </a>
            <a href="manage_events.php" class="nav-link">
                <i class="fas fa-calendar-alt"></i>
                <span>Events</span>
            </a>
            <a href="manage_faculty.php" class="nav-link active">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Faculty</span>
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
                <h2 class="mb-0">Manage Faculty</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFacultyModal">
                    <i class="fas fa-plus me-2"></i>Add New Faculty
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

            <!-- Faculty List -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Current Faculty Members</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td>
                                            <?php if (!empty($row['image_path'])): ?>
                                                <img src="../<?php echo htmlspecialchars($row['image_path']); ?>" 
                                                     alt="<?php echo htmlspecialchars($row['name']); ?>" 
                                                     class="faculty-img">
                                            <?php else: ?>
                                                <div class="faculty-img bg-secondary d-flex align-items-center justify-content-center">
                                                    <i class="fas fa-user text-white"></i>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['designation']); ?></td>
                                        <td><?php echo htmlspecialchars($row['department']); ?></td>
                                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-info faculty-action-btn me-2" 
                                                    onclick="editFaculty(<?php echo $row['id']; ?>)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form method="POST" action="" style="display: inline;">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                                <input type="hidden" name="faculty_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger faculty-action-btn" 
                                                        onclick="return confirm('Are you sure you want to delete this faculty member?')">
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

    <!-- Add Faculty Modal -->
    <div class="modal fade" id="addFacultyModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Faculty Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" class="form-control" name="designation" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <input type="text" class="form-control" name="department" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Profile Photo</label>
                            <input type="file" class="form-control" name="image" accept="image/*" 
                                   onchange="previewImage(this)">
                            <img id="imagePreview" class="faculty-img-preview d-none">
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Faculty</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function editFaculty(facultyId) {
            // Implement edit functionality
            console.log('Editing faculty:', facultyId);
        }
    </script>
</body>
</html>
