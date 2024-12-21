<?php
session_start();
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Jobs - CareerLink</title>
    <meta name="description" content="Search and find your dream job at CareerLink - Browse thousands of job opportunities">
    <meta name="keywords" content="job search, careers, employment, job listings">

    <!-- Favicon and Fonts -->
    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
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
            background: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
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
            padding: 15px 20px;
            transition: all 0.3s ease;
        }

        .navbar-nav > li > a:hover {
            color: #FF5722 !important;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #1a237e, #0d47a1);
            padding: 60px 0;
            text-align: center;
            color: white;
            margin-bottom: 50px;
        }

        .hero-section h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .hero-section p {
            font-size: 20px;
            opacity: 0.9;
        }

        /* Search Form */
        .search-container {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-top: -100px;
            position: relative;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            transition: all 0.3s ease;
        }

        .search-container:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 500;
            color: #333;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group label i {
            color: #1a237e;
        }

        .form-control {
            height: 50px;
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            padding: 10px 15px;
            font-size: 15px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            border-color: #1a237e;
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(26, 35, 126, 0.1);
        }

        /* Enhanced Search Button */
        .search-btn-container {
            display: flex;
            align-items: flex-end;
            height: 100%;
        }

        .search-btn {
            background: linear-gradient(45deg, #1a237e, #0d47a1);
            color: white;
            border: none;
            padding: 0 30px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            height: 50px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 35, 126, 0.3);
            background: linear-gradient(45deg, #0d47a1, #1a237e);
        }

        .search-btn:active {
            transform: translateY(1px);
        }

        .search-btn i {
            font-size: 18px;
        }

        /* Loading State */
        .search-btn.loading {
            position: relative;
            pointer-events: none;
            opacity: 0.8;
        }

        .search-btn.loading:after {
            content: '';
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-top: 2px solid transparent;
            border-radius: 50%;
            position: absolute;
            right: 15px;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Results Table */
        .results-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
            overflow: hidden;
        }

        .table {
            margin-top: 20px;
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

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: #f8f9fa;
            transform: scale(1.01);
        }

        .action-btn {
            background: linear-gradient(45deg, #1a237e, #0d47a1);
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .action-btn i {
            font-size: 14px;
        }

        /* DataTables Customization */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 20px;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #1a237e;
            color: white !important;
            border: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #0d47a1;
            color: white !important;
            border: none;
        }

        /* Footer */
        footer {
            background: #1a237e;
            color: white;
            padding: 30px 0;
            margin-top: 50px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .social-icons img {
            width: 30px;
            transition: transform 0.3s ease;
        }

        .social-icons img:hover {
            transform: translateY(-5px);
        }

        /* Responsive Improvements */
        @media (max-width: 768px) {
            .search-container {
                margin-top: -50px;
                padding: 20px;
                margin-left: 15px;
                margin-right: 15px;
            }

            .hero-section {
                padding: 40px 0;
            }

            .hero-section h1 {
                font-size: 32px;
            }

            .hero-section p {
                font-size: 16px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .search-btn {
                margin-top: 15px;
            }
        }
    </style>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-default">
  <div class="container">
        <div class="navbar-header">
                <a class="navbar-brand" href="index.php">CAREERLINK</a>
        </div>
          <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])): ?>
            <li><a href="user/dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
                <?php elseif(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])): ?>
            <li><a href="company/dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="search.php">Search Jobs</a></li>
                    <li><a href="mainregister.php">Register</a></li>
                    <li><a href="mainlogin.php">Login</a></li>
                <?php endif; ?>
          </ul>
      </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <h1>Find Your Dream Job</h1>
            <p>Search through thousands of job opportunities</p>
  </div>
  </div>

    <!-- Search Form -->
    <div class="container">
        <div class="search-container">
            <form id="myForm" class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>
                            <i class="fas fa-briefcase"></i>
                            Experience Level
                        </label>
                        <select id="experience" class="form-control" required>
                            <option value="">Select Experience</option>
            <?php 
              $sql = "SELECT DISTINCT(experience) FROM job_post WHERE experience IS NOT NULL ORDER BY experience";
              $result = $conn->query($sql);
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='".htmlspecialchars($row['experience'])."'>".htmlspecialchars($row['experience'])."</option>";
                }
              }
            ?>
          </select>
        </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>
                            <i class="fas fa-graduation-cap"></i>
                            Qualification
                        </label>
                        <select id="qualification" class="form-control" required>
                            <option value="">Select Qualification</option>
            <?php 
                            $sql = "SELECT DISTINCT(qualification) FROM job_post WHERE qualification IS NOT NULL ORDER BY qualification";
              $result = $conn->query($sql);
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='".htmlspecialchars($row['qualification'])."'>".htmlspecialchars($row['qualification'])."</option>";
                }
              }
            ?>
          </select>
        </div>
                </div>
                <div class="col-md-2">
                    <div class="search-btn-container">
                        <button type="submit" class="search-btn">
                            <i class="fas fa-search"></i>
                            <span>Search</span>
                        </button>
                    </div>
                </div>
        </form>
        </div>

        <!-- Results Table -->
        <div class="results-container">
            <table id="myTable" class="table table-hover">
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Description</th>
                        <th>Min Salary</th>
                        <th>Max Salary</th>
                <th>Experience</th>
                <th>Qualification</th>
                <th>Action</th>
                    </tr>
              </thead>
                <tbody></tbody>
            </table>
          </div>
        </div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>&copy; 2024-2025 <a href="index.php" style="color: white;">CAREERLINK.COM</a></p>
            <div class="social-icons">
                <a href="#"><img src="img/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="img/twitter.png" alt="Twitter"></a>
                <a href="#"><img src="img/youtube.png" alt="YouTube"></a>
    </div>
  </div>
  </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
    $(function() {
            // Initialize DataTable with improved configuration
            var searchTable = $('#myTable').DataTable({
                "autoWidth": false,
                "processing": true,
                "serverSide": false,
                "ajax": {
                    "url": "refresh_job_search.php",
                    "dataSrc": "",
                    "data": function(d) {
            d.experience = $("#experience").val();
            d.qualification = $("#qualification").val();
                    }
                },
                "columns": [
                    { 
                        "width": "15%",
                        "render": function(data, type, row) {
                            return '<strong>' + data + '</strong>';
                        }
                    },
                    { "width": "25%" },
                    { 
                        "width": "10%",
                        "render": function(data, type, row) {
                            return '₹' + data;
                        }
                    },
                    { 
                        "width": "10%",
                        "render": function(data, type, row) {
                            return '₹' + data;
                        }
                    },
                    { "width": "10%" },
                    { "width": "15%" },
                    { 
                        "width": "15%",
                        "render": function(data, type, row) {
                            return '<a href="' + data + '" class="action-btn"><i class="fas fa-external-link-alt"></i> View Details</a>';
                        }
                    }
                ],
                "language": {
                    "search": "<i class='fas fa-search'></i> Quick Search:",
                    "lengthMenu": "Show _MENU_ jobs",
                    "zeroRecords": "<i class='fas fa-info-circle'></i> No matching jobs found",
                    "info": "Showing _START_ to _END_ of _TOTAL_ jobs",
                    "infoEmpty": "No jobs available",
                    "infoFiltered": "(filtered from _MAX_ total jobs)",
                    "processing": '<i class="fas fa-spinner fa-spin"></i> Loading...'
                },
                "dom": '<"top"lf>rt<"bottom"ip><"clear">',
                "pageLength": 10,
                "order": [[0, "desc"]]
            });

            // Handle form submission with loading state
      $("#myForm").on("submit", function(e) {
        e.preventDefault();
                const btn = $(this).find('.search-btn');
                btn.addClass('loading');
                
                searchTable.ajax.reload(function() {
                    btn.removeClass('loading');
                }, false);
            });

            // Add responsive handling
            $(window).on('resize', function() {
                searchTable.columns.adjust();
            });
    });
  </script>
  </body>
</html>