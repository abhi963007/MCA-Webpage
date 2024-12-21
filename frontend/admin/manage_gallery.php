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

// Add image categories
$categories = [
    'events' => 'Events',
    'workshops' => 'Workshops',
    'campus' => 'Campus Life',
    'academic' => 'Academic Activities'
];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        if ($_POST['action'] == 'add') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            
            // Handle image upload with better validation
            $target_dir = "../uploads/gallery/";
            $image_path = "";
            
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
                $file_extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                
                if (in_array($file_extension, $allowed_types)) {
                    $new_filename = uniqid() . '.' . $file_extension;
                    $target_file = $target_dir . $new_filename;
                    
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $image_path = "uploads/gallery/" . $new_filename;
                        
                        // Check if category column exists
                        $check_column = $conn->query("SHOW COLUMNS FROM gallery LIKE 'category'");
                        
                        if ($check_column->num_rows > 0) {
                            // If category exists, use the new query
                            $sql = "INSERT INTO gallery (title, description, category, image_path) VALUES (?, ?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ssss", $title, $description, $category, $image_path);
                        } else {
                            // If category doesn't exist, use old query structure
                            $sql = "INSERT INTO gallery (title, description, image_path) VALUES (?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("sss", $title, $description, $image_path);
                        }
                        
                        if($stmt->execute()) {
                            $_SESSION['success_message'] = "Gallery item added successfully!";
                            header("Location: manage_gallery.php");
                            exit();
                        }
                    }
                } else {
                    $error = "Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.";
                }
            }
        } elseif ($_POST['action'] == 'delete' && isset($_POST['image_id'])) {
            $image_id = $_POST['image_id'];
            
            // Delete image file
            $sql = "SELECT image_path FROM gallery WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $image_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                if (!empty($row['image_path'])) {
                    unlink("../" . $row['image_path']);
                }
            }
            
            // Delete database record
            $sql = "DELETE FROM gallery WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $image_id);
            
            if($stmt->execute()) {
                $_SESSION['success_message'] = "Gallery item deleted successfully!";
                header("Location: manage_gallery.php");
                exit();
            } else {
                $error = "Error deleting gallery item.";
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

// Fetch all gallery items
$sql = "SELECT * FROM gallery ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Gallery</title>
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

        .gallery-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
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

        .gallery-action-btn {
            padding: 6px 12px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .gallery-action-btn:hover {
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
            <a href="../index.php" class="nav-link">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="dashboard.php" class="nav-link">
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
            <a href="manage_gallery.php" class="nav-link active">
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
                <h2 class="mb-0">Manage Gallery</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGalleryModal">
                    <i class="fas fa-plus me-2"></i>Add New Image
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

            <!-- Gallery Grid -->
            <div class="row gallery-grid">
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4 gallery-item <?php echo isset($row['category']) ? htmlspecialchars($row['category']) : ''; ?>">
                        <div class="card">
                            <div class="card-body">
                                <img src="../<?php echo htmlspecialchars($row['image_path']); ?>" 
                                     alt="<?php echo htmlspecialchars($row['title']); ?>" 
                                     class="gallery-img mb-3 w-100">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                                <p class="card-text text-muted"><?php echo htmlspecialchars($row['description']); ?></p>
                                <?php if(isset($row['category'])): ?>
                                    <p class="card-text"><small class="text-muted">Category: <?php echo htmlspecialchars($row['category']); ?></small></p>
                                <?php endif; ?>
                                <form method="POST" action="" style="display: inline;">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <input type="hidden" name="image_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger gallery-action-btn" 
                                            onclick="return confirm('Are you sure you want to delete this image?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <!-- Add Gallery Modal -->
    <div class="modal fade" id="addGalleryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*" required
                                   onchange="previewImage(this)">
                            <img id="imagePreview" class="gallery-img mt-3 d-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-control" name="category" required>
                                <?php foreach($categories as $key => $value): ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Image</button>
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

        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('[data-filter]');
            const galleryItems = document.querySelectorAll('.gallery-item');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.dataset.filter;
                    
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    galleryItems.forEach(item => {
                        if (filter === 'all' || item.classList.contains(filter)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
