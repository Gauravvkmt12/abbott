<?php
include "connection.php";
// Fetch therapy names and IDs from the database
$sql = "SELECT id, therpy_name FROM therpy"; 
$result = $conn->query($sql);
$therapies = array();
if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $therapies[] = array("id" => $row["id"], "name" => $row["therpy_name"]);
        }
    } else {
        echo "No therapies found";
    }
}
// Fetch all products or filter by therapy if selected
$products = array();
if (isset($_GET['therapy_id'])) {
    $therapy_id = $_GET['therapy_id'];
    $query = "SELECT product.*, therpy.therpy_name FROM product JOIN therpy ON product.THERAPY = therpy.id WHERE product.THERAPY = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $therapy_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
} else {
    $query = "SELECT product.*, therpy.therpy_name FROM product JOIN therpy ON product.THERAPY = therpy.id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/index.css">
    <style>
    
    </style>
</head>
<body>
<?php
    include "nav.php";
?>
<div class="conatiner mx-3 bg-white">
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item mt-2"><a href="index.php" class="text-decoration-none text-secondary">HOME</a></li>
    <li class="breadcrumb-item mt-2"><a href="product.php" class="text-decoration-none text-secondary">PRODUCTS</a></li>
    <li class="breadcrumb-item mt-2 active" id="activ" aria-current="page">THERPY ARES</li>
  </ol>
</nav>

    <?php
    include "titlesection.php";
    ?>
    <div class="conatiner bg-white mx-3">
    <div class="row">
            <div class="col-md-7">
                <div class="row justify-content-between mt-4" style="margin-left:5%;">
                    <div class="col-6 col-md-3 mb-2 mb-md-0">
                        <a href="therpy.php" class="btn btn-primary w-100">THERAPY</a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="product.php" class="btn btn-primary w-100">PRODUCT</a>
                    </div>
                </div>
                <hr>
                <div class="col ms-md-auto">
                <div class="mobile-only">
    <div class="row">
        <div class="col">
            <!-- Content to be shown only on screens below 968px -->
            <div class="scrollable-content">
                <div class="row">
                    <div class="col mb-3 mb-md-0">
                        <h5 class="filter-title">FILTER "<span id="selectedTherapy"><?= isset($_GET['therapy_name']) ? htmlspecialchars($_GET['therapy_name']) : '' ?></span>"</h5>
                        <div class="therpy-gri">
                            <?php foreach ($therapies as $therapy): ?>
                                <div class='therapy-name'>
                                    <a href='therpy.php?therapy_id=<?= $therapy["id"] ?>&therapy_name=<?= urlencode($therapy["name"]) ?>'>
                                        <?= htmlspecialchars($therapy["name"]) ?>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
                <div id="product-list">
                    <?php if (!empty($products)): ?>
                        <div class="accordion" id="accordionExample">
                            <?php foreach ($products as $index => $product): ?>
                                <?php $uncol_value = $product['uncol']; ?>
                                <?php if ($uncol_value == 1): ?>
                                    <div class="accordion-item mb-3"  style="margin-left:7%;">
                                        <h2 class="accordion-header" id="heading<?= $index + 1 ?>">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index + 1 ?>" aria-expanded="true" aria-controls="collapse<?= $index + 1 ?>">
                                                <?= htmlspecialchars($product['product_name']) ?>
                                            </button>
                                        </h2>
                                        <div id="collapse<?= $index + 1 ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                            <b>PRODUCT DESCRPTION:</b><?= htmlspecialchars($product['product_descrption']) ?><br>
                                                <b>BUSINESS:</b> <?= htmlspecialchars($product['Business']) ?><br>
                                                <b>MOLECULE:</b> <?= htmlspecialchars($product['MOLECULE']) ?><br>
                                                <b>FORM:</b> <?= htmlspecialchars($product['FORM']) ?><br>
                                                <b>STRENGTH:</b> <?= htmlspecialchars($product['STRENGTH']) ?><br>
                                                <b>BUSINESS AREAS:</b> <?= htmlspecialchars($product['BUSINESS_AREAS']) ?><br>
                                                <b>THERAPY AREAS:</b> <?= htmlspecialchars($product['therpy_name']) ?><br>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading<?= $index + 1 ?>">
                                            <button class="accordion-button" type="button" onclick="window.location.href='<?= htmlspecialchars($product['product_link']) ?>'">
                                                <?= htmlspecialchars($product['product_name']) ?>
                                            </button>
                                        </h2>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p style="margin-left:7%;">No products found.</p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="col-md-4 ms-md-auto">
            <div class="laptop-only mt-4"style="margin-left:5%;">
                <div class="row">
                    <div class="col-md-8 mb-3 mb-md-0">
                        <h5 class="filter-title">FILTER "<span id="selectedTherapy"><?= isset($_GET['therapy_name']) ? htmlspecialchars($_GET['therapy_name']) : '' ?></span>"</h5>
                        <div class="therpy-gri">
                            <?php foreach ($therapies as $therapy): ?>
                                <div class='therapy-name'>
                                    <a href='therpy.php?therapy_id=<?= $therapy["id"] ?>&therapy_name=<?= urlencode($therapy["name"]) ?>'>
                                        <?= htmlspecialchars($therapy["name"]) ?>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div></div>
    <?php include "footer.php"; ?>
</body>
</html>
