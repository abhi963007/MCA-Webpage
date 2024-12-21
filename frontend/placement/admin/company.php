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
    <title>Manage Companies - CareerLink Admin</title>

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

        /* Standardized Button Styles */
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
            padding: 0 15px;
        }

        .btn i {
            margin-right: 8px;
            font-size: 14px;
        }

        /* Action Buttons */
        .btn-action {
            height: 38px;
            min-width: 100px;
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

        /* Print Button */
        .print-btn {
            background: #1a237e;
            color: white;
            height: 45px;
            min-width: 180px;
            margin-top: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(26, 35, 126, 0.2);
        }

        .print-btn:hover {
            background: #0d47a1;
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 6px 15px rgba(26, 35, 126, 0.3);
        }

        /* Table Container Optimization */
        .table-container {
            margin-bottom: 20px;
            overflow-x: auto;
        }

        /* DataTables Optimization */
        .dataTables_wrapper .dataTables_filter input {
            height: 38px;
            border-radius: 6px;
            border: 2px solid #e0e0e0;
            padding: 8px 12px;
            font-size: 14px;
        }

        .dataTables_wrapper .dataTables_length select {
            height: 38px;
            border-radius: 6px;
            border: 2px solid #e0e0e0;
            padding: 8px 12px;
            font-size: 14px;
        }

        /* Stats Card Optimization */
        .stats-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 30px;
        }

        .stats-card h3 {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .stats-card p {
            font-size: 18px;
            margin: 0;
        }

        /* Responsive Optimizations */
        @media (max-width: 768px) {
            .btn-action {
                min-width: 90px;
                margin: 2px;
            }

            .table-container {
                margin: 0 -15px;
                border-radius: 0;
            }

            .stats-card h3 {
                font-size: 36px;
            }

            .print-btn {
                min-width: 160px;
            }
        }

        /* Table Row Hover Effect */
        .table-hover > tbody > tr:hover {
            background-color: #f5f7fb;
            transition: background-color 0.2s ease;
        }

        /* DataTable Pagination Optimization */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 8px 14px;
            margin: 0 2px;
            border-radius: 6px;
            border: none !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #1a237e !important;
            color: white !important;
            border: none !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #e8eaf6 !important;
            color: #1a237e !important;
            border: none !important;
        }

        /* Table Cell Hover Effects */
        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        /* Company Name Column Hover Effect */
        .table tbody td.company-name {
            position: relative;
            cursor: pointer;
        }

        .table tbody td.company-name:hover {
            transform: scale(1.05);
            color: #1a237e;
            font-weight: 500;
            z-index: 1;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Add subtle glow effect on hover */
        .table tbody td.company-name::after {
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

        .table tbody td.company-name:hover::after {
            opacity: 1;
        }

        /* Add smooth transition for all table cells */
        .table tbody tr {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Optional: Add subtle row highlight */
        .table tbody tr:hover {
            background-color: rgba(26, 35, 126, 0.02);
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
            <h1><i class="fas fa-building"></i> Manage Companies</h1>
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
                    <a href="company.php" class="list-group-item active">
                        <i class="fas fa-building"></i> Companies
                    </a>
                    <a href="job-posts.php" class="list-group-item">
                        <i class="fas fa-briefcase"></i> Job Posts
                    </a>
                    <a href="add-alumini.php" class="list-group-item">
                        <i class="fas fa-user-graduate"></i> Alumni
                    </a>
          </div>
        </div>

            <!-- Companies Table -->
            <div class="col-md-9">
                <!-- Stats Card -->
          <?php
                $sql = "SELECT COUNT(*) as count FROM company";
            $result = $conn->query($sql);
                $companiesCount = $result->fetch_assoc()['count'];
                ?>
                <div class="stats-card">
                    <h3><?php echo $companiesCount; ?></h3>
                    <p>Total Registered Companies</p>
                </div>

                <!-- Companies Table -->
                <div class="table-container">
                    <table id="companiesTable" class="table table-hover">
            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Company Name</th>
                                <th>Head Office</th>
                                <th>Contact</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM company";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  $i = 0;
                  while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td class="company-name"><?php echo htmlspecialchars($row['companyname']); ?></td>
                                        <td class="company-name"><?php echo htmlspecialchars($row['headofficecity']); ?></td>
                                        <td><?php echo htmlspecialchars($row['contactno']); ?></td>
                                        <td class="company-name"><?php echo htmlspecialchars($row['companytype']); ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="edit-company.php?id=<?php echo $row['id_company']; ?>" 
                                                   class="btn btn-action btn-edit">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="delete-company.php?id=<?php echo $row['id_company']; ?>" 
                                                   class="btn btn-action btn-delete"
                                                   onclick="return confirm('Are you sure you want to delete this company?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                            </div>
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
                    <button onclick="printDiv('companiesTable')" class="print-btn">
                        <i class="fas fa-print"></i> Print Companies List
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
            $('#companiesTable').DataTable({
                "pageLength": 10,
                "order": [[0, "asc"]],
                "language": {
                    "search": "<i class='fas fa-search'></i> Search:",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ companies",
                    "infoEmpty": "Showing 0 to 0 of 0 companies",
                    "infoFiltered": "(filtered from _MAX_ total companies)"
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
