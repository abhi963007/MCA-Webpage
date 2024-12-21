<?php
//To Handle Session Variables
session_start();
if(empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}
//Including Database Connection
require_once("../db.php");

if(isset($_GET['id'])) {
    $id_company = $_GET['id'];

    // Get company details to display in the form
    $sql = "SELECT * FROM company WHERE id_company='$id_company'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

// If the form is submitted
if(isset($_POST['update'])) {
    $companyname = $_POST['companyname'];
    $headofficecity = $_POST['headofficecity'];
    $contactno = $_POST['contactno'];
    $companytype = $_POST['companytype'];

    $sql = "UPDATE company SET companyname='$companyname', headofficecity='$headofficecity', contactno='$contactno', companytype='$companytype' WHERE id_company='$id_company'";

    if($conn->query($sql) === TRUE) {
        header("Location: company.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Company</title>
</head>
<body>
    <div class="container">
        <h2>Edit Company Details</h2>
        <form method="POST">
            <div class="form-group">
                <label for="companyname">Company Name:</label>
                <input type="text" class="form-control" id="companyname" name="companyname" value="<?php echo $row['companyname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="headofficecity">Head Office City:</label>
                <input type="text" class="form-control" id="headofficecity" name="headofficecity" value="<?php echo $row['headofficecity']; ?>" required>
            </div>
            <div class="form-group">
                <label for="contactno">Contact Number:</label>
                <input type="text" class="form-control" id="contactno" name="contactno" value="<?php echo $row['contactno']; ?>" required>
            </div>
            <div class="form-group">
                <label for="companytype">Company Type:</label>
                <input type="text" class="form-control" id="companytype" name="companytype" value="<?php echo $row['companytype']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
    </div>
</body>
</html>
