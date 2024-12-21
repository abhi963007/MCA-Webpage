<?php
session_start();
if(empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}
require_once("../db.php");

// Create alumni table if it doesn't exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS `alumni` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `qualification` varchar(255) NOT NULL,
    `current_company` varchar(255) NOT NULL,
    `contact_email` varchar(255) NOT NULL,
    `phone` varchar(20) NOT NULL,
    `passout_year` int(4) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if (!$conn->query($createTableSQL)) {
    die("Error creating table: " . $conn->error);
}

// Handle deletion of alumni record
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); // Convert to integer for security
    $sql = "DELETE FROM alumni WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        $message = "Alumni deleted successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}

// Fetch all alumni from the database
$sql = "SELECT * FROM alumni ORDER BY created_at DESC";
$result = $conn->query($sql);

// Get total alumni count
$countSql = "SELECT COUNT(*) as count FROM alumni";
$countResult = $conn->query($countSql);
$alumniCount = $countResult->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Alumni - CareerLink Admin</title>
    
    <!-- Favicon and Fonts -->
    <link rel="icon" href="../img/favicon.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">

    <style>
        /* Base Styles */
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

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #1a237e, #0d47a1);
            padding: 40px 0;
            color: white;
            margin: 0 0 40px;
        }

        /* Stats Card */
        .stats-card {
            background: linear-gradient(135deg, #1a237e, #0d47a1);
            color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stats-card h3 {
            font-size: 42px;
            margin-bottom: 10px;
        }

        /* Form Styles */
        .form-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .form-container h3 {
            color: #1a237e;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .form-group label {
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
        }

        .form-control {
            height: 45px;
            border-radius: 8px;
            border: 2px solid #e0e0e0;
            padding: 10px 15px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #1a237e;
            box-shadow: 0 0 0 3px rgba(26, 35, 126, 0.1);
        }

        /* Table Styles */
        .table-container {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .table thead th {
            background: #f8f9fa;
            color: #1a237e;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
            padding: 15px;
            border-bottom: 2px solid #1a237e;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        /* Button Styles */
        .btn {
            height: 38px;
            min-width: 100px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.3s ease;
            margin: 0 5px;
            border: none;
        }

        .btn i {
            margin-right: 8px;
            font-size: 14px;
        }

        .btn-submit {
            background: #1a237e;
            color: white;
            height: 45px;
            min-width: 140px;
        }

        .btn-submit:hover {
            background: #0d47a1;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 35, 126, 0.2);
            color: white;
        }

        .btn-edit {
            background: #2196f3;
            color: white;
        }

        .btn-edit:hover {
            background: #1976d2;
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 4px 12px rgba(33, 150, 243, 0.2);
        }

        .btn-delete {
            background: #ff5252;
            color: white;
        }

        .btn-delete:hover {
            background: #ff1744;
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 4px 12px rgba(255, 82, 82, 0.2);
        }

        /* Success Message */
        .alert {
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 20px;
            border: none;
        }

        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border-left: 4px solid #2e7d32;
        }

        /* Hover Effects */
        .table tbody tr {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(26, 35, 126, 0.02);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
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

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1><i class="fas fa-user-graduate"></i> Manage Alumni</h1>
  </div>
  </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Stats Card -->
        <div class="stats-card">
            <h3><?php echo $alumniCount; ?></h3>
            <p>Total Alumni Records</p>
        </div>

        <?php if(isset($message)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="row">
        <!-- Add Alumni Form -->
            <div class="col-md-12">
                <div class="form-container">
                    <h3><i class="fas fa-plus-circle"></i> Add New Alumni</h3>
                    <form action="add-alumni-process.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
            <div class="form-group">
                                    <label><i class="fas fa-user"></i> Full Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
            </div>
                            <div class="col-md-6">
            <div class="form-group">
                                    <label><i class="fas fa-graduation-cap"></i> Qualification</label>
                                    <input type="text" class="form-control" name="qualification" required>
                                </div>
                            </div>
            </div>
                        <div class="row">
                            <div class="col-md-6">
            <div class="form-group">
                                    <label><i class="fas fa-building"></i> Current Company</label>
                                    <input type="text" class="form-control" name="current_company" required>
                                </div>
            </div>
                            <div class="col-md-6">
            <div class="form-group">
                                    <label><i class="fas fa-envelope"></i> Contact Email</label>
                                    <input type="email" class="form-control" name="contact_email" required>
                                </div>
                            </div>
            </div>
                        <div class="row">
                            <div class="col-md-6">
            <div class="form-group">
                                    <label><i class="fas fa-phone"></i> Phone Number</label>
                                    <input type="text" class="form-control" name="phone" required>
                                </div>
            </div>
                            <div class="col-md-6">
            <div class="form-group">
                                    <label><i class="fas fa-calendar"></i> Passout Year</label>
                                    <input type="number" class="form-control" name="passout_year" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-submit">
                            <i class="fas fa-plus"></i> Add Alumni
                        </button>
                    </form>
                </div>
            </div>

            <!-- Alumni List -->
            <div class="col-md-12">
                <div class="table-container">
                    <table id="alumniTable" class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Qualification</th>
                    <th>Current Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                    <th>Passout Year</th>
                                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { ?>
                    <tr>
                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['qualification']); ?></td>
                                    <td><?php echo htmlspecialchars($row['current_company']); ?></td>
                                    <td><?php echo htmlspecialchars($row['contact_email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                    <td><?php echo htmlspecialchars($row['passout_year']); ?></td>
                                    <td>
                                        <a href="edit-alumni.php?id=<?php echo $row['id']; ?>" 
                                           class="btn btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="add-alumini.php?delete=<?php echo $row['id']; ?>" 
                                           class="btn btn-delete"
                                           onclick="return confirm('Are you sure you want to delete this alumni?');">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                        </td>
                    </tr>
                            <?php } } ?>
            </tbody>
        </table>
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
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#alumniTable').DataTable({
                "pageLength": 10,
                "order": [[0, "asc"]],
                "language": {
                    "search": "<i class='fas fa-search'></i> Search:",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ alumni",
                    "infoEmpty": "Showing 0 to 0 of 0 alumni",
                    "infoFiltered": "(filtered from _MAX_ total alumni)"
                }
            });

            // Fade out success message after 3 seconds
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 3000);
        });
    </script>
</body>
</html>
