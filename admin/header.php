<?php
include "checksession.php";
include 'connection.php';
$currentScript = basename($_SERVER['PHP_SELF']);
$title = "Default Title";
if ($currentScript == "product.php") {
    $title = "Products";
} elseif ($currentScript == "therpy.php") {
    $title = "Therpy";
} elseif ($currentScript == "profile.php") {
    $title = "Profile";
} elseif ($currentScript == "query.php") {
    $title = "Query";
}
function highlightWords($text, $word) {
    return preg_replace('/' . preg_quote($word, '/') . '/i', '<span style="background-color: red; color:white">$0</span>', $text);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>
        <?php echo $title; ?>
    </title>
    <style>
        .dropdown-toggle::after {display: none;}
        .navbar-custom {border: 1px solid black}
        .navbar-custom h1 {margin: 0;}
        .ms-auto {margin-left: auto;}
        .form-control:focus {box-shadow: none;}
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h1>
                    <?php echo $title; ?>
                </h1>
            </a>
            <div class="d-flex">
                <div class="dropdown">
                    <button class="btn btn-outline-danger dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php if(isset($_SESSION['username'])) { ?>
                        Hi,
                        <?php echo $_SESSION['username']; ?>
                        <?php } else { ?>
                        Username not set
                        <?php } ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="log_out.php">Log out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">
                        <i class="bi bi-box-arrow-in-right"></i> Logout
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to log out?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <a href="log_out.php" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/07d6f4b411.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>