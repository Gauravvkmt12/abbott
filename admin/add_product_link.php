<?php
include "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $productLink = $_POST['productLink'];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO product (Product_Name, Product_Link, uncol) VALUES (?, ?, 0)");

    // Check if the statement preparation was successful
    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param("ss", $productName, $productLink);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to demo.php after successful insertion
        header("Location: product.php");
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
