<?php
// Include the connection file
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $id = $_POST['id'];
    $productName = $_POST['product_name'];
    $productLink = $_POST['product_link'];
    $productDescription = $_POST['product_description'];
    $productBusiness = $_POST['product_business'];
    $productMolecule = $_POST['product_molecule'];
    $productForm = $_POST['product_form'];
    $productStrength = $_POST['product_strength'];
    $productBusinessArea = $_POST['product_businessarea'];
    $productTherapy = $_POST['therapy']; // Ensure the form field name is correct

    // Prepare the SQL statement
    $sql = "UPDATE product SET 
        product_name = ?, 
        product_link = ?, 
        product_descrption = ?, 
        Business = ?, 
        MOLECULE = ?, 
        FORM = ?, 
        STRENGTH = ?, 
        BUSINESS_AREAS = ?, 
        THERAPY = ? 
        WHERE id = ?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", 
        $productName, 
        $productLink, 
        $productDescription, 
        $productBusiness, 
        $productMolecule, 
        $productForm, 
        $productStrength, 
        $productBusinessArea, 
        $productTherapy, 
        $id);

    // Execute the SQL statement
    if ($stmt->execute() === TRUE) {
        // Redirect to the product page with success message
        header("Location: product.php?update=success");
        exit();
    } else {
        // Redirect to the product page with error message
        header("Location: product.php?update=error");
        exit();
    }
} else {
    // Redirect to the product page if accessed directly without POST request
    header("Location: product.php");
    exit();
}

// Close the database connection
$stmt->close();
$conn->close();
?>