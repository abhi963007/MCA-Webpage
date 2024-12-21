<?php
// Start session
session_start();

// Include database connection
require_once("../db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $qualification = $_POST['qualification'];
    $current_company = $_POST['current_company'];
    $contact_email = $_POST['contact_email'];
    $phone = $_POST['phone'];
    $passout_year = $_POST['passout_year'];

    // Update the alumni details in the database
    $sql = "UPDATE alumni 
            SET name = '$name', qualification = '$qualification', current_company = '$current_company', contact_email = '$contact_email', phone = '$phone', passout_year = '$passout_year' 
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Alumni details updated successfully!";
        header("Location: add-alumini.php");
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
