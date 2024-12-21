<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle; ?> - CareerLink Admin</title>

    <!-- Favicon and Fonts -->
    <link rel="icon" href="../img/favicon.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Admin Styles -->
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

        /* Header Banner */
        .header-banner {
            background: linear-gradient(135deg, #1a237e, #0d47a1);
            padding: 30px 0;
            color: white;
            margin-bottom: 30px;
        }

        .header-banner h1 {
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

        .admin-menu .list-group-item:hover {
            background: #f8f9fa;
            color: #1a237e;
        }

        .admin-menu .list-group-item.active {
            background: #1a237e;
            color: white;
        }

        /* Content Card */
        .content-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 30px;
        }

        /* Tables */
        .table {
            margin-bottom: 0;
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
        }

        /* Buttons */
        .btn-primary {
            background: #1a237e;
            border-color: #1a237e;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #0d47a1;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 35, 126, 0.2);
        }

        /* Forms */
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

        /* Footer */
        footer {
            background: #1a237e;
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }

        .social-icons {
            margin-top: 15px;
        }

        .social-icons img {
            width: 30px;
            height: 30px;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        .social-icons img:hover {
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
</body>
</html> 