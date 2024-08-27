<?php
// Include database connection
include 'connection.php';

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO form_submissions (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if ($stmt->execute()) {
    // Redirect to thank you page
    header("Location: thankyou.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
