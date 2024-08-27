<?php
$currentScript = basename($_SERVER['PHP_SELF']);
$title = "Default Title";
if ($currentScript == "index.php") {
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
    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="conatiner">
        <nav style="border-radius: 0px 0px 0px 107px;
        -webkit-border-radius: 0px 0px 0px 107px;
        -moz-border-radius: 0px 0px 0px 107px; background-color:#000; height:200px ">
    <h1 style="padding:50px 25px" class="text-white"><?php echo $title; ?></h1>
    </nav>
    </div>
</body>
</html>