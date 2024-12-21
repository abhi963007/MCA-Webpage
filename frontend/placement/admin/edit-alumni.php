<?php
// Start session
session_start();

// Include database connection
require_once("../db.php");

// Check if the alumni ID is passed through GET method
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch alumni details based on ID
    $sql = "SELECT * FROM alumni WHERE id = '$id'";
    $result = $conn->query($sql);

    // Check if the record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Alumni not found!";
        exit();
    }
} else {
    echo "Invalid Request!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Alumni</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h2>Edit Alumni Details</h2>

    <!-- Edit Alumni Form -->
    <form action="edit-alumni-process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>

        <div class="form-group">
            <label for="qualification">Qualification:</label>
            <input type="text" class="form-control" id="qualification" name="qualification" value="<?php echo $row['qualification']; ?>" required>
        </div>

        <div class="form-group">
            <label for="current_company">Current Company:</label>
            <input type="text" class="form-control" id="current_company" name="current_company" value="<?php echo $row['current_company']; ?>" required>
        </div>

        <div class="form-group">
            <label for="contact_email">Contact Email:</label>
            <input type="email" class="form-control" id="contact_email" name="contact_email" value="<?php echo $row['contact_email']; ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>
        </div>

        <div class="form-group">
            <label for="passout_year">Passout Year:</label>
            <input type="number" class="form-control" id="passout_year" name="passout_year" value="<?php echo $row['passout_year']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Alumni</button>
        <a href="add-alumni.php" class="btn btn-default">Cancel</a>
    </form>
</div>

</body>
</html>
