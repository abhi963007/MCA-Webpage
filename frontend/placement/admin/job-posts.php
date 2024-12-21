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
    <title>Manage Job Posts - CareerLink Admin</title>

    <!-- Favicon and Fonts -->
    <link rel="icon" href="../img/favicon.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">

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

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #1a237e, #0d47a1);
            padding: 40px 0;
            color: white;
            margin: 0 0 40px;
        }

        .page-header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 600;
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

        /* Job Title Hover Effect */
        .job-title {
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .job-title:hover {
            transform: scale(1.05);
            color: #1a237e;
            font-weight: 500;
            z-index: 1;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .job-title::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle, rgba(26, 35, 126, 0.1) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .job-title:hover::after {
            opacity: 1;
        }

        /* Action Buttons */
        .btn-action {
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

        /* Print Button */
        .print-btn {
            background: #1a237e;
            color: white;
            height: 45px;
            min-width: 180px;
            margin: 25px 0;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
        }

        .print-btn:hover {
            background: #0d47a1;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(26, 35, 126, 0.3);
        }

        /* Admin Menu */
        .admin-menu {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .admin-menu .list-group-item {
            border: none;
            padding: 15px 20px;
            font-size: 16px;
            font-weight: 500;
            color: #333;
            transition: all 0.3s ease;
        }

        .admin-menu .list-group-item.active {
            background: #1a237e;
            color: white;
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
            <h1><i class="fas fa-briefcase"></i> Manage Job Posts</h1>
  </div>
  </div>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
            <!-- Admin Menu -->
            <div class="col-md-3">
                <div class="admin-menu list-group">
                    <a href="dashboard.php" class="list-group-item">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="user.php" class="list-group-item">
                        <i class="fas fa-users"></i> Users
                    </a>
                    <a href="company.php" class="list-group-item">
                        <i class="fas fa-building"></i> Companies
                    </a>
                    <a href="job-posts.php" class="list-group-item active">
                        <i class="fas fa-briefcase"></i> Job Posts
                    </a>
                    <a href="add-alumini.php" class="list-group-item">
                        <i class="fas fa-user-graduate"></i> Alumni
                    </a>
          </div>
        </div>

            <!-- Job Posts Table -->
            <div class="col-md-9">
                <!-- Stats Card -->
        <?php
                $sql = "SELECT COUNT(*) as count FROM job_post";
          $result = $conn->query($sql);
                $jobsCount = $result->fetch_assoc()['count'];
                ?>
                <div class="stats-card">
                    <h3><?php echo $jobsCount; ?></h3>
                    <p>Total Active Job Posts</p>
                </div>

                <!-- Job Posts Table -->
                <div class="table-container">
                    <table id="jobPostsTable" class="table table-hover">
            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Job Title</th>
                                <th>Description</th>
                                <th>Min Salary</th>
                                <th>Max Salary</th>
                                <th>Applications</th>
                                <th>Action</th>
                            </tr>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM job_post";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  $i = 0;
                  while($row = $result->fetch_assoc()) {
                    ?>
                      <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td class="job-title"><?php echo htmlspecialchars($row['jobtitle']); ?></td>
                                        <td class="job-title"><?php echo htmlspecialchars($row['description']); ?></td>
                                        <td><?php echo htmlspecialchars($row['minimumsalary']); ?></td>
                                        <td><?php echo htmlspecialchars($row['maximumsalary']); ?></td>
                        <?php
                                        $sql1 = "SELECT COUNT(id_apply) AS totalNo FROM apply_job_post WHERE id_jobpost='$row[id_jobpost]'";
                          $result1 = $conn->query($sql1);
                                        $row1 = $result1->fetch_assoc();
                            ?>
                             <td><?php echo $row1['totalNo']; ?></td>
                                        <td>
                                            <a href="delete-job-post.php?id=<?php echo $row['id_jobpost']; ?>" 
                                               class="btn btn-action btn-delete"
                                               onclick="return confirm('Are you sure you want to delete this job post?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                      </tr>
                    <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>

                <!-- Print Button -->
                <div class="text-center">
                    <button onclick="printDiv('jobPostsTable')" class="print-btn">
                        <i class="fas fa-print"></i> Print Job Posts
                    </button>
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
            $('#jobPostsTable').DataTable({
                "pageLength": 10,
                "order": [[0, "asc"]],
                "language": {
                    "search": "<i class='fas fa-search'></i> Search:",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ job posts",
                    "infoEmpty": "Showing 0 to 0 of 0 job posts",
                    "infoFiltered": "(filtered from _MAX_ total job posts)"
                }
            });
        });

        // Print function
function printDiv(divName) {
            var printContents = document.getElementById(divName).outerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
            location.reload();
}
</script>
  </body>
</html>