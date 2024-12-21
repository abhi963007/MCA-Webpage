<?php
// Start the session (if not already started)
session_start();

// Include the database connection file
require_once("../db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form inputs
    $name = $_POST['name'];
    $qualification = $_POST['qualification'];
    $current_company = $_POST['current_company'];
    $contact_email = $_POST['contact_email'];
    $phone = $_POST['phone'];
    $passout_year = $_POST['passout_year'];

    // Prepare and execute the insert query
    $sql = "INSERT INTO alumni (name, qualification, current_company, contact_email, phone, passout_year) 
            VALUES ('$name', '$qualification', '$current_company', '$contact_email', '$phone', '$passout_year')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Alumni added successfully!";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();

    // Redirect back to the add-alumni page with the message
    header("Location: add-alumini.php");
    exit();
}
?>
