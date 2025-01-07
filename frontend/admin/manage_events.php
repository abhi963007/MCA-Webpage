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
            $date = $_POST['date'];
            $description = $_POST['description'];
            $venue = $_POST['venue'];
            
            // Handle image upload
            $image_path = '';
            if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = "../img/events/";
                // Create directory if it doesn't exist
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                
                // Get file extension
                $file_extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                $new_filename = uniqid() . '.' . $file_extension;
                $target_file = $target_dir . $new_filename;
                
                // Move uploaded file
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image_path = "img/events/" . $new_filename;
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                }
            }
            
            if (!isset($error)) {
                $sql = "INSERT INTO events (title, event_date, description, venue, image_path) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $title, $date, $description, $venue, $image_path);
                
                if($stmt->execute()) {
                    $_SESSION['success_message'] = "Event added successfully!";
                    header("Location: manage_events.php");
                    exit();
                } else {
                    $error = "Error adding event: " . $conn->error;
                }
            }
            
        } elseif ($_POST['action'] == 'delete' && isset($_POST['event_id'])) {
            $event_id = $_POST['event_id'];
            
            $sql = "DELETE FROM events WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $event_id);
            
            if($stmt->execute()) {
                $_SESSION['success_message'] = "Event deleted successfully!";
                header("Location: manage_events.php");
                exit();
            } else {
                $error = "Error deleting event.";
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

// Fetch all events
$sql = "SELECT * FROM events ORDER BY event_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
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

        .event-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
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

        .event-action-btn {
            padding: 6px 12px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .event-action-btn:hover {
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 10px;
            padding: 15px 20px;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid rgba(0,0,0,0.1);
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(52,144,220,0.25);
        }

        .form-label {
            color: #4a5568;
        }
        
        .form-control {
            border-radius: 0.375rem;
            border: 1px solid #e2e8f0;
            padding: 0.5rem 1rem;
        }
        
        .form-control:focus {
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
        }
        
        .btn-primary {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }
        
        .card {
            border: none;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }
        
        .card-header {
            background-color: #f8fafc;
            border-bottom: 1px solid #edf2f7;
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
            <a href="manage_faculty.php" class="nav-link">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Faculty</span>
            </a>
            <a href="manage_events.php" class="nav-link active">
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
            <h1 class="h3 mb-4 text-gray-800">Manage Events</h1>
            
            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <?php if(isset($success)): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>

            <!-- Add Event Form -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Add New Event</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <input type="hidden" name="action" value="add">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="title" class="form-label fw-bold mb-2">Event Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required 
                                           placeholder="Enter event title">
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="date" class="form-label fw-bold mb-2">Event Date</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="venue" class="form-label fw-bold mb-2">Venue</label>
                                    <input type="text" class="form-control" id="venue" name="venue" required 
                                           placeholder="Enter event venue">
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="image" class="form-label fw-bold mb-2">Event Image</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    <small class="form-text text-muted mt-1">Upload an image for the event (optional)</small>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description" class="form-label fw-bold mb-2">Description</label>
                                    <textarea class="form-control" id="description" name="description" 
                                              rows="4" required placeholder="Enter event description"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-plus me-2"></i>Add Event
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Events List -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Current Events</h5>
                </div>
                <div class="card-body">
                    <?php if ($result->num_rows > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Venue</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td>
                                                <?php if($row['image_path']): ?>
                                                    <img src="../<?php echo htmlspecialchars($row['image_path']); ?>" alt="Event Image" style="width: 50px; height: 50px; object-fit: cover;">
                                                <?php else: ?>
                                                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                        <i class="fas fa-image"></i>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                                            <td><?php echo date('M d, Y', strtotime($row['event_date'])); ?></td>
                                            <td><?php echo htmlspecialchars($row['venue']); ?></td>
                                            <td><?php echo substr(htmlspecialchars($row['description']), 0, 100) . '...'; ?></td>
                                            <td>
                                                <form method="POST" action="" class="d-inline">
                                                    <input type="hidden" name="action" value="delete">
                                                    <input type="hidden" name="event_id" value="<?php echo $row['id']; ?>">
                                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm event-action-btn" onclick="return confirm('Are you sure you want to delete this event?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-info">No events found.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function editEvent(eventId) {
            // Implement edit functionality
            console.log('Editing event:', eventId);
        }
    </script>
</body>
</html>
