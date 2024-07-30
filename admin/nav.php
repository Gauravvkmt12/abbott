<?php
include "checksession.php";
$currentScript = basename($_SERVER['PHP_SELF']);
$title = "Default Title";
if ($currentScript == "product.php") {
    $title = "PRODUCTS";
} elseif ($currentScript == "therpy.php") {
    $title = "THERAPY";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?php echo $title; ?></title>
    <style>
        .dropdown-toggle::after {display: none;}
        .navbar-custom {border-radius: 10px 10px 10px 107px;-webkit-border-radius: 10px 10px 10px 107px;-moz-border-radius: 10px 10px 10px 107px;background-color: yellow;height: 250px;display: flex;align-items: center;padding: 20px;}
        .navbar-custom h1 {margin: 0;}
        .ms-auto {margin-left: auto;}
    </style>
</head>
<body>
    <nav class="navbar-custom">
        <div class="d-flex align-items-center w-100">
            <div class="me-auto">
            <h1><?php echo $title; ?></h1>
            </div>
            <div class="dropdown ms-auto">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <h5>Hi!
                    <?php
                        if(isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        } else {
                            echo "Username not set";
                        }
                    ?>
                    </h5>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="log_out.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
