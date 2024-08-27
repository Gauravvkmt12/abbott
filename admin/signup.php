<?php
include "connection.php"; // Ensure this file includes the correct connection setup

$alert = "";
$regi = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'], $_POST['password'], $_POST['name'], $_POST['email'])) {
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $password = md5($pass); // Note: md5 is not recommended for password hashing; consider using password_hash()
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Validation
        if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
            $alert = "Only letters and white space allowed for username";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $alert = "Invalid email format";
        } else {
            // Check if username already exists
            $sql = "SELECT * FROM user WHERE Username = '$username'";
            $result = $conn->query($sql);

            if ($result === false) {
                // Error in SQL query
                $alert = "Error executing query: " . $conn->error;
            } elseif ($result->num_rows > 0) {
                $alert = "This username already exists";
            } else {
                // Insert new user
                $sql_insert = "INSERT INTO user (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";
                if ($conn->query($sql_insert) === TRUE) {
                    $regi = "Registered successfully";
                } else {
                    $alert = "Error inserting data: " . $conn->error;
                }
            }
        }
    } else {
        $alert = "All fields are required";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #dc3545;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 100%;
            width: 400px;
        }

        .inputForm {
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1.5px solid #ecedec;
            padding: 10px;
            border-radius: 5px;
        }

        .inputForm input {
            border: none;
            outline: none;
            background: transparent;
            width: 100%;
        }

        .inputForm svg {
            flex-shrink: 0;
        }

        .button-submit {
            background-color: #151717;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 15px;
            font-weight: 500;
            border-radius: 10px;
            transition: 0.5s ease;
            
        }

        .button-submit:hover {
            background-color: #c82333;
        }

        .flex-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .span {
            color: #dc3545;
            text-decoration: none;
        }

        .span:hover {
            text-decoration: underline;
        }

        /* Modal Styling */
        .modal-body .inputForm {
            margin-bottom: 10px;
        }
        .p {
    text-align: center;
    color: black;
    font-size: 14px;
    margin: 5px 0;
  }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center">
  <div class="row">
    <div class="col-lg-12">
      <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h2 class="text-center mb-4">Register</h2>
        <?php if(!empty($alert)): ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $alert; ?>
            </div>
          <?php endif; ?>
          <?php if(!empty($regi)): ?>
            <div class="alert alert-success" role="alert">
              <?php echo $regi; ?>
            </div>
          <?php endif; ?>
            
        <div class="inputForm">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          </svg>
          <input placeholder="Enter your Name" class="input" name="name" type="text">
        </div>
        
        <div class="inputForm">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          </svg>
          <input placeholder="Enter your Username" class="input" name="username" type="text">
        </div>

        <div class="inputForm">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" height="20"><g data-name="Layer 3" id="Layer_3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
          <input placeholder="Enter your Email" class="input" name="email"  type="email">
        </div>

        <div class="inputForm">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="-64 0 512 512" height="20"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>  
          <input placeholder="Enter your Password" name="password" class="input" type="password">
        </div>
        <button class="button-submit">Register</button>
        <p class="p">Already have an account? <a href="index.php" class="span">Sign In</a>
      </form>
    </div>
  </div>
</div>

<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="change_password.php" method="POST" id="forgotPasswordForm">
          <div class="inputForm">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
            <input placeholder="Enter your Username" class="input" name="username" type="text">
          </div>

          <div class="inputForm">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" height="20"><g data-name="Layer 3" id="Layer_3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
            <input placeholder="Enter your Email" class="input" name="email" type="email">
          </div>

          <button type="submit" class="button-submit">Send Reset Link</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
