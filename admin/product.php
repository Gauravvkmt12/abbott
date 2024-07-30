<?php
include "connection.php";
include "nav.php";
if (isset($_GET['update'])) {
    if ($_GET['update'] == 'success') {
        echo "<div class='alert alert-success' role='alert'>Product updated successfully!</div>";
    } elseif ($_GET['update'] == 'error') {
        echo "<div class='alert alert-danger' role='alert'>There was an error updating the product. Please try again.</div>";
    }
}
$rowsPerPage = 10;
$sqlTotalRows = "SELECT COUNT(*) AS total FROM product";
$resultTotalRows = $conn->query($sqlTotalRows);
$totalRows = $resultTotalRows->fetch_assoc()["total"];
$totalPages = ceil($totalRows / $rowsPerPage);
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}
$startLimit = ($currentPage - 1) * $rowsPerPage;
$sql = "SELECT p.*, t.therpy_name 
        FROM product p
        LEFT JOIN therpy t ON p.THERAPY = t.id 
        LIMIT $startLimit, $rowsPerPage";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
<div class="container mt-2">
        <div class="row">
            <div class="col-md-10">
                <div class="row justify-content-between">
                    <div class="col-6 col-md-3 mb-2 mb-md-0"><a href="therpy.php" class="btn btn-primary w-100">THERAPY</a></div>
                    <div class="col-6 col-md-3 mb-2 mb-md-0"><a href="product.php" class="btn btn-primary w-100">ALL PRODUCT</a></div>
                    <div class="col-6 col-md-3">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              ADD PRODUCT
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#linkModal">USING LINK</a></li>
                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#descriptionModal">USING DESCRIPTION</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
            </div>            
        </div>
    </div>

    <div class="container-fluid table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead>
        <tr class="">
            <th class="text-center bg-dark text-white">S.NO.</th>
            <th class="text-center bg-dark text-white">PRODUCT NAME</th>
            <th class="text-center bg-dark text-white">PRODUCT LINK</th>
            <th class="text-center bg-dark text-white">PRODUCT DESCRIPTION</th>
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
                <td class="text-center" id="custom-td"><?php echo $row["product_name"]; ?></td>
                <td class="text-center" style="width: 25px;"><a style="text-decoration:none" href="<?php echo $row["product_link"]; ?>"><?php echo $row["product_link"]; ?></a></td>
                <td class="text-center"><?php echo $row["product_descrption"]; ?></td>
                <td class="text-center" id="custom-td"><?php echo $row["Business"]; ?></td>
                <td class="text-center" id="custom-td"><?php echo $row["MOLECULE"]; ?></td>
                <td class="text-center" id="custom-td"><?php echo $row["FORM"]; ?></td>
                <td class="text-center" id="custom-td"><?php echo $row["STRENGTH"]; ?></td>
                <td class="text-center" id="custom-td"><?php echo $row["BUSINESS_AREAS"]; ?></td>
                <td class="text-center" id="custom-td"><?php echo $row["therpy_name"]; ?></td>
                <td>
                <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#exampleModal" 
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
                Edit
                </button>
                </td>
                
                <td>
                        <form action="delete_product.php" method="post" class="deleteForm">
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                            <button type="button" class="btn btn-danger deleteBtn">Delete</button>
                        </form>
                    </td>
            </tr>
            <?php
            $start_sno++;
        }}
        else {
            echo "<tr><td colspan='12' class='text-center'>No products found</td></tr>";
        }
        ?>
        </tbody>
    </table>
    </div>
    
 <!-- Pagination -->
 <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php if ($currentPage > 1) : ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $currentPage - 1; ?>">Previous</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php echo ($currentPage == $i) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages) : ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $currentPage + 1; ?>">Next</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

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
                            <label for="THERAPY" class="form-label">THERAPY</label>
                            <select class="form-control" id="therapy" name="THERAPY">Select a Therapy
                            <option value=""></option>
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
            <select class="form-control" id="editTherapy" name="therapy">Select a Therapy
              <option value=""></option>
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