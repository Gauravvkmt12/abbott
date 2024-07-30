<?php
// Database connection
include "connection.php";

// Initialize variables
$alert = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    // Sanitize input
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to fetch user data
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Fetch the result row
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password']; // Get hashed password from database
            
            // Verify password (MD5 format)
            if (md5($password) === $hashed_password) {
                // Start session and store username
                session_start();
                $_SESSION['username'] = $username;
                header('Location: product.php');
                exit();
            } else {
                $alert = "Invalid username or password";
            }
        } else {
            $alert = "Invalid username or password";
        }
        mysqli_free_result($result);
    } else {
        $alert = "Database query error: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>LOGIN</title>
</head>
<body>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h2 class="text-center mb-4">Login</h2>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
            <?php if(!empty($alert)): ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $alert; ?>
            </div>
          <?php endif; ?>
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
            </div><br>
            <button type="submit" class="btn btn-danger btn-block w-100">Login</button><br></br>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
