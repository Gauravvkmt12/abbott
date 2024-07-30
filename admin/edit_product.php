<?php
include "connection.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $product_id = intval($_POST["product_id"]);
    $product_name = mysqli_real_escape_string($conn, $_POST["product_name"]);
    $product_link = mysqli_real_escape_string($conn, $_POST["product_link"]);
    $product_description = mysqli_real_escape_string($conn, $_POST["product_description"]);
    $business = mysqli_real_escape_string($conn, $_POST["business"]);
    $molecule = mysqli_real_escape_string($conn, $_POST["molecule"]);
    $form = mysqli_real_escape_string($conn, $_POST["form"]);
    $strength = mysqli_real_escape_string($conn, $_POST["strength"]);
    $business_areas = mysqli_real_escape_string($conn, $_POST["business_areas"]);
    $therapy = mysqli_real_escape_string($conn, $_POST["therapy"]);

    // Update the product in the database
    $sql = "UPDATE product SET
                product_name = '$product_name',
                product_link = '$product_link',
                product_descrption = '$product_description',
                Business = '$business',
                MOLECULE = '$molecule',
                FORM = '$form',
                STRENGTH = '$strength',
                BUSINESS_AREAS = '$business_areas',
                THERAPY = '$therapy'
                WHERE id = $product_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the product page with a success message
        header("Location: product.php?update=success");
        exit();
    } else {
        // Redirect to the product page with an error message
        header("Location: product.php?update=error");
        exit();
    }
}

// Close the database connection
$conn->close();
?>
