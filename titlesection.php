<?php
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
    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="conatiner">
        
        <nav style="border-radius: 11px 10px 10px 107px;
        -webkit-border-radius: 11px 10px 10px 107px;
        -moz-border-radius: 11px 10px 10px 107px; background-color:yellow; height:250px ">
    <h1 style="padding:50px 25px"><?php echo $title; ?></h1>
    </nav>
    </div>
    
</body>
</html>