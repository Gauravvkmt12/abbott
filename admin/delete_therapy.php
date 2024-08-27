<?php
// Include the connection file
include "connection.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the therapy ID from the form
    $therapyId = $_POST['id'];

    // Check if the therapy ID is present in the product table
    $checkSql = "SELECT COUNT(*) AS total FROM product WHERE THERAPY = ?";
    if ($stmtCheck = $conn->prepare($checkSql)) {
        $stmtCheck->bind_param("i", $therapyId);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();
        $count = $result->fetch_assoc()["total"];
        $stmtCheck->close();

        if ($count > 0) {
            // Therapy is present in the product table, show an error message
            echo "<script>
                    alert('This therapy is present in the product table and cannot be deleted.');
                    window.location.href = 'therpy.php';
                  </script>";
        } else {
            // Therapy is not present in the product table, proceed with deletion
            $deleteSql = "DELETE FROM therpy WHERE id = ?";
            if ($stmtDelete = $conn->prepare($deleteSql)) {
                $stmtDelete->bind_param("i", $therapyId);
                if ($stmtDelete->execute()) {
                    echo "<script>
                            alert('Therapy deleted successfully.');
                            window.location.href = 'therpy.php';
                          </script>";
                } else {
                    echo "<script>
                            alert('Error deleting therapy.');
                            window.location.href = 'therpy.php';
                          </script>";
                }
                $stmtDelete->close();
            } else {
                // Error preparing delete statement
                echo "<script>
                        alert('Error preparing delete statement.');
                        window.location.href = 'therpy.php';
                      </script>";
            }
        }
    } else {
        // Error preparing check statement
        echo "<script>
                alert('Error preparing check statement.');
                window.location.href = 'therpy.php';
              </script>";
    }
}
$conn->close();
?>
