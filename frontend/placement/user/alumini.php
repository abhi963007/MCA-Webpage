<?php
session_start();
if(empty($_SESSION['id_user'])) {
    header("Location: ../index.php");
    exit();
}
require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>

<font face="calibri">
    
<section>
    <div class="container">
        <div class="row">
            <header>
                <nav class="navbar navbar-default" style="margin-bottom: 0; height: 80px; background-color: white; border-color: transparent;">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" style="font-size: 24px; color: #053a5a; line-height: 42px;" href="../index.php">CAREERLINK</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li style="padding-right: 25px;"><a href="dashboard.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Dashboard</a></li>
                                <li style="padding-right: 25px;"><a href="../logout.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
    </div>
</section>

<div style="background-color: #053a5a; height: 80px;">
    <p style="font-size: 34px; color: white; text-align: center; line-height: 75px;">Alumni Details</p>
</div>

<br>

<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Qualification</th>
                <th>Current Company</th>
                <th>Contact Email</th>
                <th>Phone Number</th>
                <th>Pass Out Year</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM alumni";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['qualification']}</td>
                            <td>{$row['current_company']}</td>
                            <td>{$row['contact_email']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['passout_year']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No alumni data found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<footer id="footer" style="background-color: #053a5a; height: 80px;">
    <p style="color:white; font-size: 20px; line-height: 80px; text-align: center;"> 
      Copyright &copy; 2024-2025 <a href="index.php" style="color:white;">CAREERLINK.COM</a>
    </p>
</footer>

<!-- jQuery and Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

</font>
</body>
</html>
