<?php

include "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $therpy = $_POST['therapyName'];
    $therpydescr = $_POST['therapyDescription'];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO therpy (therpy_name,therpydesciption) VALUES (?, ?)");

    // Check if the statement preparation was successful
    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param("ss", $therpy, $therpydescr);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to demo.php after successful insertion
        header("Location: therpy.php");
        exit();
    } else {
        echo "Error executing the statement: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
