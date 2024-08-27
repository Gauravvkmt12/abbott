<?php
include "connection.php";
include "header.php";

// Alert messages for update success/error
if (isset($_GET['update'])) {
    if ($_GET['update'] == 'success') {
        echo "<div class='alert alert-success mt-2' role='alert'>Product updated successfully!</div>";
    } elseif ($_GET['update'] == 'error') {
        echo "<div class='alert alert-danger mt-2' role='alert'>There was an error updating the product. Please try again.</div>";
    }
}

// Get search query if available
$search_query = "";
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $search_query = $_GET['query'];
}

// Check if 'rows_per_page' is set in the URL, else default to 10
$rowsPerPage = isset($_GET['rows_per_page']) ? (int)$_GET['rows_per_page'] : 10;

// Current page and search query handling (assuming they are also from the query string)
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$search_query = isset($_GET['query']) ? $_GET['query'] : '';
// SQL query to get the total number of rows (filtered by search if applicable)
$sqlTotalRows = "SELECT COUNT(*) AS total FROM product p
                 LEFT JOIN therpy t ON p.THERAPY = t.id";

if (!empty($search_query)) {
    $sqlTotalRows .= " WHERE p.product_name LIKE '%$search_query%' 
                        OR p.Business LIKE '%$search_query%'
                        OR p.MOLECULE LIKE '%$search_query%'
                        OR p.FORM LIKE '%$search_query%'
                        OR p.STRENGTH LIKE '%$search_query%'
                        OR p.BUSINESS_AREAS LIKE '%$search_query%'
                        OR t.therpy_name LIKE '%$search_query%'";
}

$resultTotalRows = $conn->query($sqlTotalRows);
$totalRows = $resultTotalRows->fetch_assoc()["total"];
$totalPages = ceil($totalRows / $rowsPerPage);

// Get the current page
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the limit for the SQL query
$startLimit = ($currentPage - 1) * $rowsPerPage;

// SQL query to fetch data (filtered by search and paginated)
$sql = "SELECT p.*, t.therpy_name 
        FROM product p
        LEFT JOIN therpy t ON p.THERAPY = t.id";

if (!empty($search_query)) {
    $sql .= " WHERE p.product_name LIKE '%$search_query%' 
              OR p.Business LIKE '%$search_query%' 
              OR p.MOLECULE LIKE '%$search_query%' 
              OR p.FORM LIKE '%$search_query%' 
              OR p.STRENGTH LIKE '%$search_query%' 
              OR p.BUSINESS_AREAS LIKE '%$search_query%' 
              OR t.therpy_name LIKE '%$search_query%'";
}

$sql .= " LIMIT $startLimit, $rowsPerPage";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<style>
   .nav-link{font-size:18px}
   .offcanvas-dark {background-color: #000; color: #ffffff;}
    .offcanvas-dark .dropdown-menu {background-color: #000;}
    .offcanvas-dark .dropdown-menu:hover .dropdown-item{background: #000;color: #fff;}
    .offcanvas-dark .dropdown-menu .dropdown-item{color: #ffffff;}
    .offcanvas-dark .dropdown-menu .dropdown-item:hover{color:#fff !important;}
    .offcanvas-dark .nav-link {color: #ffffff;}
    .btn-close .fa-xmark{color:#fff;}
    .nav-link i {font-size: 24px;color: #fff;}
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container-fluid">
    <!-- Toggler button for offcanvas menu -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-start offcanvas-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="therpy.php">Therapy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="product.php">Product</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="offcanvasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Add Product <i class="fa-solid fa-chevron-down"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasDropdown">
              <li><a class="dropdown-item text-white" href="#" data-bs-toggle="modal" data-bs-target="#linkModal">USING LINK</a></li>
              <li><a class="dropdown-item text-white" href="#" data-bs-toggle="modal" data-bs-target="#descriptionModal">USING DESCRIPTION</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="query.php" class="nav-link">User Queries</a>
          </li>
          <li class="nav-item">
          <a href="download_excel.php" class="nav-link" id="download-excel" title="Download Excel">
            <i class="fas fa-file-excel"></i>
          </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Search Bar -->
    <div class="search-bar d-flex ms-auto">
      <form class="d-flex" role="search" method="GET" action="">
        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search" value="<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>">
        <button class="btn btn-outline-dark" type="submit">Search</button>
      </form>
    </div>

    
  </div>
</nav>


    <div class="container-fluid table-responsive mt-2">
    <table class="table table-striped table-hover table-bordered">
        <thead>
        <tr class="">
            <th class="text-center bg-dark text-white">S.NO.</th>
            <th class="text-center bg-dark text-white">PRODUCT NAME</th>
            <th class="text-center bg-dark text-white">BUSINESS</th>
            <th class="text-center bg-dark text-white">MOLECULE</th>
            <th class="text-center bg-dark text-white">FORM</th>
            <th class="text-center bg-dark text-white">STRENGTH</th>
            <th class="text-center bg-dark text-white">BUSINESS AREAS</th>
            <th class="text-center bg-dark text-white">THERAPY</th>
            <th class="text-center bg-dark text-white">Edit</th>
            <th class="text-center bg-dark text-white">Delete</th>
        </tr>
        </thead>
        <tbody>
    <?php
    $start_sno = ($currentPage - 1) * $rowsPerPage + 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
             <tr>
                <td class="text-center" id="custom-td"><?php echo $start_sno; ?></td>
                <td class="text-center" id="custom-td"><?php echo highlightWords($row["product_name"], $search_query); ?></td>
                <td class="text-center" id="custom-td"><?php echo highlightWords($row["Business"], $search_query); ?></td>
                <td class="text-center" id="custom-td"><?php echo highlightWords($row["MOLECULE"], $search_query); ?></td>
                <td class="text-center" id="custom-td"><?php echo highlightWords($row["FORM"], $search_query); ?></td>
                <td class="text-center" id="custom-td"><?php echo highlightWords($row["STRENGTH"], $search_query); ?></td>
                <td class="text-center" id="custom-td"><?php echo highlightWords($row["BUSINESS_AREAS"], $search_query); ?></td>
                <td class="text-center" id="custom-td"><?php echo highlightWords($row["therpy_name"], $search_query); ?></td>
                <td>
                    <button type="button" class="btn btn-outline-dark editBtn" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        data-id="<?php echo $row['id']; ?>" 
                        data-name="<?php echo $row['product_name']; ?>"
                        data-link="<?php echo $row['product_link']; ?>"
                        data-description="<?php echo $row['product_descrption']; ?>"
                        data-business="<?php echo $row['Business']; ?>"
                        data-molecule="<?php echo $row['MOLECULE']; ?>"
                        data-form="<?php echo $row['FORM']; ?>"
                        data-strength="<?php echo $row['STRENGTH']; ?>"
                        data-business-areas="<?php echo $row['BUSINESS_AREAS']; ?>"
                        data-therapy="<?php echo $row['THERAPY']; ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </td>
                
                <td>
                    <form action="delete_product.php" method="post" class="deleteForm">
                        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                        <button type="button" class="btn  btn-outline-danger deleteBtn"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php
            $start_sno++;
        }
    } else {
        echo "<tr><td colspan='12' class='text-center'>No products found</td></tr>";
    }
    ?>
</tbody>
    </table>
    </div>
    

<div class="container mt-2">

    <div class="row align-items-center">
        
        <!-- Pagination Centered -->
        <div class="col-lg-6 col-md-12 d-flex justify-content-lg-end justify-content-md-center mb-3">
            <nav aria-label="Page navigation">
                <ul class="pagination mb-0">
                    <?php
                    for ($i = 1; $i <= $totalPages; $i++) {
                        $activeClass = ($i == $currentPage) ? 'active' : '';
                        echo "<li class='page-item $activeClass'><a class='page-link' href='?page=$i&rows_per_page=$rowsPerPage&query=$search_query'>$i</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <!-- Rows per Page Dropdown on the Right -->
        <div class="col-lg-6 col-sm-12 text-end d-flex justify-content-lg-end justify-content-md-center mb-3">
            <form method="GET" action="">
                <label for="rowsPerPage">Rows per page:</label>
                <select name="rows_per_page" id="rowsPerPage" class="form-select d-inline-block w-auto" onchange="this.form.submit()">
                    <option value="5" <?php if ($rowsPerPage == 5) echo 'selected'; ?>>5</option>
                    <option value="10" <?php if ($rowsPerPage == 10) echo 'selected'; ?>>10</option>
                    <option value="25" <?php if ($rowsPerPage == 25) echo 'selected'; ?>>25</option>
                    <option value="50" <?php if ($rowsPerPage == 50) echo 'selected'; ?>>50</option>
                </select>
                <input type="hidden" name="page" value="<?php echo $currentPage; ?>">
                <input type="hidden" name="query" value="<?php echo $search_query; ?>">
            </form>
        </div>
    </div>
</div>

<?php include "footer.php" ?>

    <!-- Modal for USING LINK -->
    <div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="linkModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="linkModalLabel">Add Product Using Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_product_link.php" method="post">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product Name">
                        </div>
                        <div class="mb-3">
                            <label for="productLink" class="form-label">Product Link</label>
                            <input type="url" class="form-control" id="productLink" name="productLink" placeholder="Enter product link">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for USING DESCRIPTION -->
    <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionModalLabel">Add Product Using Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action = "add_product_desc.php" method = "post">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="productname" placeholder="Enter Product Name">
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Product Description</label>
                            <textarea class="form-control" id="productDescription" name="productDescription" rows="3" placeholder="Enter product description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Business" class="form-label">Business</label>
                            <input type="text" class="form-control" id="Business" name="Business" placeholder="Enter Business">
                        </div>
                        <div class="mb-3">
                            <label for="MOLECULE" class="form-label">MOLECULE</label>
                            <input type="text" class="form-control" id="MOLECULE" name="MOLECULE" placeholder="Enter MOLECULE">
                        </div>
                        <div class="mb-3">
                            <label for="FORM" class="form-label">FORM</label>
                            <input type="text" class="form-control" id="FORM" name="FORM" placeholder="Enter FORM">
                        </div>
                        <div class="mb-3">
                            <label for="STRENGTH" class="form-label">STRENGTH</label>
                            <input type="text" class="form-control" id="STRENGTH" name="STRENGTH" placeholder="Enter STRENGTH">
                        </div>
                        <div class="mb-3">
                            <label for="BUSINESS AREAS" class="form-label">BUSINESS AREAS</label>
                            <input type="text" class="form-control" id="BUSINESSAREAS" name="BUSINESSAREAS" placeholder="Enter BUSINESS AREAS" >
                        </div>
                        <div class="mb-3">
                            <label for="THERAPY" class="form-label">THERAPY </label>
                            <select class="form-control" id="therapy" name="THERAPY">
                            <option value="">Select a Therapy</option>
                            <?php
                            include "connection.php";
                            $sql = "SELECT id, therpy_name FROM therpy"; // Assuming there's an 'id' column for therapy ID
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["therpy_name"] . "</option>";
                            }
                            }
                            $conn->close();
                            ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Modal for Editing Product -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editProductForm" action="update_product.php" method="post">
        <div class="modal-body">
          <input type="hidden" id="editProductId" name="id">
          <div class="mb-3">
            <label for="editProductName" class="form-label">Product Name:</label>
            <input type="text" class="form-control" id="editProductName" name="product_name">
          </div>
          <div class="mb-3">
            <label for="editProductLink" class="form-label">Product Link:</label>
            <input type="text" class="form-control" id="editProductLink" name="product_link">
          </div>
          <div class="mb-3">
            <label for="editProductDescription" class="form-label">Product Description:</label>
            <textarea class="form-control" id="editProductDescription" name="product_description" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="editBusiness" class="form-label">Business:</label>
            <input type="text" class="form-control" id="editBusiness" name="product_business">
          </div>
          <div class="mb-3">
            <label for="editMolecule" class="form-label">Molecule:</label>
            <input type="text" class="form-control" id="editMolecule" name="product_molecule">
          </div>
          <div class="mb-3">
            <label for="editForm" class="form-label">Form:</label>
            <input type="text" class="form-control" id="editForm" name="product_form">
          </div>
          <div class="mb-3">
            <label for="editStrength" class="form-label">Strength:</label>
            <input type="text" class="form-control" id="editStrength" name="product_strength">
          </div>
          <div class="mb-3">
            <label for="editBusinessAreas" class="form-label">Business Areas:</label>
            <input type="text" class="form-control" id="editBusinessAreas" name="product_businessarea">
          </div>
          <div class="mb-3">
            <label for="editTherapy" class="form-label">Therapy:</label>
            <select class="form-control" id="editTherapy" name="therapy">
              <option value="">Select a Therapy</option>
              <?php
              include "connection.php";
              $sql = "SELECT id, therpy_name FROM therpy"; // Assuming there's an 'id' column for therapy ID
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row["id"] . "'>" . $row["therpy_name"] . "</option>";
                  }
              }
              $conn->close();
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  document.querySelectorAll('.editBtn').forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.getAttribute('data-id');
      const productName = btn.getAttribute('data-name');
      const productLink = btn.getAttribute('data-link');
      const productDescription = btn.getAttribute('data-description');
      const business = btn.getAttribute('data-business');
      const molecule = btn.getAttribute('data-molecule');
      const form = btn.getAttribute('data-form');
      const strength = btn.getAttribute('data-strength');
      const businessAreas = btn.getAttribute('data-business-areas');
      const therapy = btn.getAttribute('data-therapy');

      document.getElementById('editProductId').value = id;
      document.getElementById('editProductName').value = productName;
      document.getElementById('editProductLink').value = productLink;
      document.getElementById('editProductDescription').value = productDescription;
      document.getElementById('editBusiness').value = business;
      document.getElementById('editMolecule').value = molecule;
      document.getElementById('editForm').value = form;
      document.getElementById('editStrength').value = strength;
      document.getElementById('editBusinessAreas').value = businessAreas;
      document.getElementById('editTherapy').value = therapy;
    });
  });
  document.querySelectorAll('.deleteBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                const form = btn.closest('.deleteForm');
                const confirmation = confirm('Are you sure you want to delete this product?');
                if (confirmation) {
                    form.submit();
                }
            });
        });
</script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>