<?php
// Include the connection file
include "connection.php";

// Check if product ID is set
if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Delete the product from the database
    $sql = "DELETE FROM product WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    
    if ($stmt->execute()) {
        // Redirect back to the product page
        header("Location: product.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
