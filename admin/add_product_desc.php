<?php
include "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productname'];
    $productDesc = $_POST['productDescription'];
    $Business = $_POST['Business'];
    $MOLECULE = $_POST['MOLECULE'];
    $FORM = $_POST['FORM'];
    $STRENGTH = $_POST['STRENGTH'];
    $BUSINESSAREAS = $_POST['BUSINESSAREAS'];
    $THERAPYAREAS = $_POST['THERAPY'];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO product (Product_Name, product_descrption, Business, MOLECULE, FORM, STRENGTH, BUSINESS_AREAS, THERAPY,uncol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1)");

    // Check if the statement preparation was successful
    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param("ssssssss", $productName, $productDesc, $Business, $MOLECULE, $FORM, $STRENGTH, $BUSINESSAREAS, $THERAPYAREAS);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to product.php after successful insertion
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
