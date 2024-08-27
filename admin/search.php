<?php
include "connection.php";
$search_query = isset($_GET['query']) ? $_GET['query'] : '';

$items_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

$sql = "SELECT * FROM product 
        WHERE product_name LIKE '%$search_query%' 
        OR id LIKE '%$search_query%'
        OR product_link LIKE '%$search_query%'
        OR THERAPY LIKE '%$search_query%'
        OR product_descrption LIKE '%$search_query%'
        OR Business LIKE '%$search_query%'
        OR MOLECULE LIKE '%$search_query%'
        OR FORM LIKE '%$search_query%'
        OR STRENGTH LIKE '%$search_query%'
        OR BUSINESS_AREAS LIKE '%$search_query%' 
        LIMIT $items_per_page OFFSET $offset";
$result = $conn->query($sql);

// Check for SQL errors
if (!$result) {
    die("Error executing query: " . $conn->error);
}

// Fetch total number of products for pagination
$total_sql = "SELECT COUNT(*) FROM product 
              WHERE product_name LIKE '%$search_query%' 
              OR id LIKE '%$search_query%'
              OR product_link LIKE '%$search_query%'
              OR THERAPY LIKE '%$search_query%'
              OR product_descrption LIKE '%$search_query%'
              OR Business LIKE '%$search_query%'
              OR MOLECULE LIKE '%$search_query%'
              OR FORM LIKE '%$search_query%'
              OR STRENGTH LIKE '%$search_query%'
              OR BUSINESS_AREAS LIKE '%$search_query%'";
$total_result = $conn->query($total_sql);

// Check for SQL errors
if (!$total_result) {
    die("Error executing count query: " . $conn->error);
}

$total_items = $total_result->fetch_row()[0];
$total_pages = ceil($total_items / $items_per_page);

function highlight($text, $query) {
    if ($query !== '') {
        $highlighted = preg_replace('/(' . preg_quote($query) . ')/i', '<span class="highlight">$1</span>', $text);
        return $highlighted;
    }
    return $text;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <style>
        .highlight {
            background-color: yellow;
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }
        .card-title {
            transition: color 0.3s;
        }
        .card:hover .card-title {
            color: #007bff;
        }
        .card-body {
            position: relative;
            overflow: hidden;
        }
        .card-body::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200%;
            height: 200%;
            background: rgba(0, 123, 255, 0.1);
            transform: translate(-50%, -50%) rotate(45deg);
            transition: width 0.3s, height 0.3s;
            border-radius: 50%;
            z-index: 0;
        }
        .card-body:hover::before {
            width: 0;
            height: 0;
        }
        .card-content {
            position: relative;
            z-index: 1;
        }
    </style>-->
</head>
<body>
    <div class="container mt-5">
        

        <div class="row mt-4">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-content">
                                    <h5 class="card-title"><?php echo highlight(htmlspecialchars($row['id']), $search_query); ?></h5>
                                    <p class="card-text"><?php echo highlight(htmlspecialchars($row['product_name']), $search_query); ?></p>
                                    <p class="card-text"><?php echo highlight(htmlspecialchars($row['product_link']), $search_query); ?></p>
                                    <p class="card-text"><?php echo highlight(htmlspecialchars($row['THERAPY']), $search_query); ?></p>
                                    <p class="card-text"><?php echo highlight(htmlspecialchars($row['product_descrption']), $search_query); ?></p>
                                    <p class="card-text"><?php echo highlight(htmlspecialchars($row['Business']), $search_query); ?></p>
                                    <p class="card-text"><?php echo highlight(htmlspecialchars($row['MOLECULE']), $search_query); ?></p>
                                    <p class="card-text"><?php echo highlight(htmlspecialchars($row['FORM']), $search_query); ?></p>
                                    <p class="card-text"><?php echo highlight(htmlspecialchars($row['STRENGTH']), $search_query); ?></p>
                                    <p class="card-text"><?php echo highlight(htmlspecialchars($row['BUSINESS_AREAS']), $search_query); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center">No products found</p>
                </div>
            <?php endif; ?>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-4">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                        <a class="page-link" href="search.php?query=<?php echo urlencode($search_query); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
