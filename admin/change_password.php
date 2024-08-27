<?php
include "connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $password_md5 = md5($password);
    $sql = "SELECT * FROM user WHERE username = ? AND Email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    } else {
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $update_sql = "UPDATE user SET Password = ? WHERE Username = ? AND Email = ?";
            $stmt_update = $conn->prepare($update_sql);
            if (!$stmt_update) {
                echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            } else {
                $stmt_update->bind_param("sss", $password_md5, $username, $email);
                
                if ($stmt_update->execute()) {
                    echo "Password updated successfully.";
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Error updating password: " . $conn->error;
                }
                $stmt_update->close();
            }
        } else {
            echo "User does not exist.";
        }
        $stmt->close();
    }
    $conn->close();
}
?>