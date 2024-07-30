<?php
include "connection.php";
$query = "SELECT p.*, t.therpy_name 
          FROM product p 
          LEFT JOIN therpy t ON p.THERAPY = t.id";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Error executing the query: ' . mysqli_error($conn));
}
$products = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/product.css">
</head>
<body>
<?php
    include "nav.php";
?>
<div class="conatiner mx-2 bg-white">
<nav aria-label="breadcrumb"style="height:auto;">
<ol class="breadcrumb">
<li class="breadcrumb-item mt-2 mb-2"><a href="index.php" class="text-secondary text-decoration-none">HOME</a></li>
<li class="breadcrumb-item mt-2 mb-2 active" id="activ">PRODUCTS</li>
</ol>
</nav>
<?php 
include "titlesection.php";
?>
<div class="conatiner bg-white mx-2">
    <div class="row">
        <div class="col-lg-6">
            <div class="row mt-4"  style="margin-left:5%;">
                <div class="col mb-2 text-start">
                    <a href="product.php" class="btn btn-primary">ALL PRODUCT</a>
                </div>
                <div class="col text-end">
                    <a href="therpy.php" class="btn btn-primary">ALL THERAPY</a>
                </div>
                 <hr class="mt-4">
                
            </div>
            <div class="col ms-md-auto">
                <div class="mobile-only mt-4">
                    <div class="scrollable">
                        <div class="row">
                            <div class="col mb-3 mb-md-0">
                                <h5 class="filter-title">FILTER "<span id="selectedTherapy"></span>"</h5>
                                <div class="mobile-only mt-4">
                                    <div class="scrollable">
                                        <div class="alphabet-grid">
                                            <div class="hash">#
                                            </div>
                                                <div>A</div>
                                                <div>B</div>
                                                <div>C</div>
                                                <div>D</div>
                                                <div>E</div>
                                                <div>F</div>
                                                <div>G</div>
                                                <div>H</div>
                                                <div>I</div>
                                                <div>J</div>                      
                                                <div>K</div>
                                                <div>L</div>
                                                <div>M</div>
                                                <div>N</div>
                                                <div>O</div>
                                                <div>P</div>
                                                <div>Q</div>
                                                <div>R</div>
                                                <div>S</div>
                                                <div>T</div>
                                                <div>U</div>
                                                <div>V</div>
                                                <div>W</div>
                                                <div>X</div>
                                                <div>Y</div>
                                                <div>Z</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row mt-2" id="product-list">
                <?php
                function generateAccordion($products) {
                    $html = '<div class="accordion" id="accordionExample"  style="margin-left:1%;">';
                    $counter = 1;
                    foreach ($products as $row) {
                        $uncol_value = $row['uncol'];
                        if ($uncol_value == 1) {
                            $html .= '<div class="accordion-item mb-4" >';
                            $html .= '<h2 class="accordion-header" id="heading' . $counter . '">';
                            $html .= '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $counter . '" aria-expanded="true" aria-controls="collapse' . $counter . '">';
                            $html .= htmlspecialchars($row['product_name']); // Sanitize output
                            $html .= '</button>';
                            $html .= '</h2>';
                            $html .= '<div id="collapse' . $counter . '" class="accordion-collapse collapse" data-bs-parent="#accordionExample">';
                            $html .= '<div class="accordion-body">';
                            $html .= '<b>PRODUCT DESCRPTION:</b>' .htmlspecialchars($row['product_descrption']) . '<br>';
                            $html .= '<b>BUSINESS:</b> ' . htmlspecialchars($row['Business']) . '<br>';
                            $html .= '<b>MOLECULE:</b> ' . htmlspecialchars($row['MOLECULE']) . '<br>';
                            $html .= '<b>FORM:</b> ' . htmlspecialchars($row['FORM']) . '<br>';
                            $html .= '<b>STRENGTH:</b> ' . htmlspecialchars($row['STRENGTH']) . '<br>';
                            $html .= '<b>BUSINESS AREAS:</b> ' . htmlspecialchars($row['BUSINESS_AREAS']) . '<br>';
                            $html .= '<b>THERAPY AREAS:</b> ' . htmlspecialchars($row['therpy_name']) . '<br>'; 
                            $html .= '</div>';
                            $html .= '</div>';
                            $html .= '</div>';
                            $counter++;
                        } elseif ($uncol_value == 0) {
                            $html .= '<div id="h">';
                            $html .= '<div class="accordion-item mb-4">';
                            $html .= '<h2 class="accordion-header" id="heading' . $counter . '">';
                            $html .= '<button class="accordion-button" type="button" onclick="window.open(\''. htmlspecialchars($row['product_link']) .'\', \'_blank\');">';
                            $html .= htmlspecialchars($row['product_name']); // Sanitize output
                            $html .= '</button>';
                            $html .= '</h2>';
                            $html .= '</div>';
                            $html .= '</div>';
                            $counter++;
                        }
                    }
                    $html .= '</div>';
                    return $html;
                }

                echo generateAccordion($products);
                ?>
                </div>
            </div>
            <div class="col ms-md-auto">
            <div class="laptop-only mt-4 mb-4" style="margin-left: 10%;">    
                <div class="row">
                    <div class="col-lg-8 md-8 mb-3 mb-md-0">
                        <h5 class="filter-title">FILTER " "</h5>
                        <div class="alphabet-grid">
                            <div class="hash">#</div>
                            <div>A</div>
                            <div>B</div>
                            <div>C</div>
                            <div>D</div>
                            <div>E</div>
                            <div>F</div>
                            <div>G</div>
                            <div>H</div>
                            <div>I</div>
                            <div>J</div>
                            <div>K</div>
                            <div>L</div>
                            <div>M</div>
                            <div>N</div>
                            <div>O</div>
                            <div>P</div>
                            <div>Q</div>
                            <div>R</div>
                            <div>S</div>
                            <div>T</div>
                            <div>U</div>
                            <div>V</div>
                            <div>W</div>
                            <div>X</div>
                            <div>Y</div>
                            <div>Z</div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div><?php include "footer.php";?>
</div>
</div>

<script>
       document.addEventListener('DOMContentLoaded', function() {
    const alphabetGrids = document.querySelectorAll('.alphabet-grid');
    const filterTitles = document.querySelectorAll('.filter-title');
    const productList = document.getElementById('product-list');
    const noRecordMessage = '<div class="alert alert-warning" role="alert"  style="margin-left:0;">No records found</div>';
    const allProducts = <?php echo json_encode($products); ?>;
    
    alphabetGrids.forEach(alphabetGrid => {
        alphabetGrid.addEventListener('click', function(event) {
            if (event.target.matches('div')) {
                const selectedLetter = event.target.textContent;
                filterTitles.forEach(filterTitle => {
                    filterTitle.textContent = 'FILTER "' + selectedLetter + '"';
                });
                
                const filteredProducts = allProducts.filter(product => {
                    if (selectedLetter === '#') {
                        return true;
                    } else {
                        return product.product_name.startsWith(selectedLetter);
                    }
                }).sort((a, b) => a.product_name.localeCompare(b.product_name));
                
                if (filteredProducts.length === 0) {
                    productList.innerHTML = noRecordMessage;
                } else {
                    productList.innerHTML = generateAccordion(filteredProducts);
                }
            }
        });
    });

    function generateAccordion(products) {
        let html = '<div class="accordion" id="accordionExample">';
        let counter = 1;
        products.forEach(product => {
            const uncol_value = product.uncol;
            if (uncol_value == 1) {
                html += `<div class="accordion-item mb-4" style="margin-left:5%;">
                            <h2 class="accordion-header" id="heading${counter}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${counter}" aria-expanded="true" aria-controls="collapse${counter}">
                                    ${product.product_name}
                                </button>
                            </h2>
                            <div id="collapse${counter}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <b>PRODUCT DESCRIPTION:</b>${product.product_description}<br>
                                    <b>BUSINESS:</b> ${product.Business}<br>
                                    <b>MOLECULE:</b> ${product.MOLECULE}<br>
                                    <b>FORM:</b> ${product.FORM}<br>
                                    <b>STRENGTH:</b> ${product.STRENGTH}<br>
                                    <b>BUSINESS AREAS:</b> ${product.BUSINESS_AREAS}<br>
                                    <b>THERAPY AREAS:</b> ${product.therpy_name}<br>
                                </div>
                            </div>
                        </div>`;
                counter++;
            } else if (uncol_value == 0) {
                html += `   <div id="h">
                            <div class="accordion-item mb-4" style="margin-left:5%;">
                            <h2 class="accordion-header" id="heading${counter}">
                            <a style="text-decoration:none;" href="${product.product_link}" class="accordion-button" target="_blank">
                            ${product.product_name}
                            </a>
                            </h2>
                            </div>
                        </div>`;
                counter++;
            }
        });
        html += '</div>';
        return html;
    }
});
    </script>
</body>
</html>
