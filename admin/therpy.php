<?php
include "connection.php";
include "header.php";
$pageTitle = "THERAPY";

// Check if 'rows_per_page' is set in the URL, else default to 10
$rowsPerPage = isset($_GET['rows_per_page']) ? (int)$_GET['rows_per_page'] : 10;

// Current page and search query handling (assuming they are also from the query string)
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$search_query = isset($_GET['query']) ? $_GET['query'] : '';

// Retrieve the search query if it exists
$searchQuery = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

// Count total rows considering the search query
$sqlTotalRows = "SELECT COUNT(*) AS total FROM therpy WHERE therpy_name LIKE '%$searchQuery%'";
$resultTotalRows = $conn->query($sqlTotalRows);
$totalRows = $resultTotalRows->fetch_assoc()["total"];
$totalPages = ceil($totalRows / $rowsPerPage);

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

$startLimit = ($currentPage - 1) * $rowsPerPage;

// Select rows considering the search query
$sql = "SELECT id, therpy_name, therpydesciption FROM therpy WHERE therpy_name LIKE '%$searchQuery%' LIMIT $startLimit, $rowsPerPage";
$result = $conn->query($sql);

if (!$result) {
    die("Error fetching data: " . $conn->error);
}

$therapies = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $therapies[] = array("id" => $row["id"], "name" => $row["therpy_name"], "description" => $row["therpydesciption"]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>therapy</title>
</head>
<style>
    .btn:foucs{border:none;}
    .nav-link{font-size:18px}
   .offcanvas-dark {
      background-color: #000; 
      color: #ffffff;
    }
    .offcanvas-dark .dropdown-menu {
      background-color: #000;
    }
    .offcanvas-dark .dropdown-menu:hover .dropdown-item{
        background: #000;
      color: #fff;
    }
    .offcanvas-dark .dropdown-menu .dropdown-item{
        color: #ffffff;
    }
    ..offcanvas-dark .dropdown-menu .dropdown-item:hover{
        color:#000 !important;
    }
    .offcanvas-dark .nav-link {
      color: #ffffff;
    }
    .btn-close .fa-xmark{color:#fff;}
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
            <a class="nav-link text-white" href="#" id="addTherapyBtn">
              Add Therpy
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Search Bar -->
    <div class="search-bar d-flex ms-auto">
      <form class="d-flex ms-auto" role="search" method="GET" action="">
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
                <th class="text-center bg-dark text-white">THERPY NAME</th>
                <th class="text-center bg-dark text-white">THERPY DESCRIPTION</th>
                <th class="text-center bg-dark text-white">EDIT</th>
                <th class="text-center bg-dark text-white">DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($therapies)): ?>
                <?php
                $start_sno = ($currentPage - 1) * $rowsPerPage + 1;
                foreach ($therapies as $therapy) {
                    $highlightedName = $searchQuery ? str_ireplace($searchQuery, "<span class='highlight'>" . htmlspecialchars($searchQuery) . "</span>", htmlspecialchars($therapy["name"])) : htmlspecialchars($therapy["name"]);
                    $highlightedDescription = $searchQuery ? str_ireplace($searchQuery, "<span class='highlight'>" . htmlspecialchars($searchQuery) . "</span>", htmlspecialchars($therapy["description"])) : htmlspecialchars($therapy["description"]);
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $start_sno; ?></td>
                        <td class="text-center"><?php echo $highlightedName; ?></td>
                        <td class="text-center"><?php echo $highlightedDescription; ?></td>
                        <td class="text-center">
                            <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#editTherapyModal" data-id="<?php echo $therapy['id']; ?>" data-name="<?php echo $therapy['name']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        <td class="text-center">
                            <form action="delete_therapy.php" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $therapy['id']; ?>">
                                <button type="submit" class="btn btn-outline-danger deleteBtn"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php
                    $start_sno++;
                }
                ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No therapies found.</td>
                </tr>
            <?php endif; ?>
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
<!-- Modal for Adding Therapy -->
<div class="modal fade" id="addTherapyModal" tabindex="-1" aria-labelledby="addTherapyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTherapyModalLabel">Add Therapy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="add_therapy.php" method="post">
                    <div class="mb-3">
                        <label for="therapyName" class="form-label">Therapy Name</label>
                        <input type="text" class="form-control" id="therapyName" name="therapyName" placeholder="Enter Therapy Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="therapyDescription" class="form-label">Therapy Description</label>
                        <textarea class="form-control" id="therapyDescription" name="therapyDescription" rows="3" placeholder="Enter Therapy Description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Therapy</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Editing Therapy -->
<div class="modal fade" id="editTherapyModal" tabindex="-1" aria-labelledby="editTherapyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTherapyModalLabel">Edit Therapy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editTherapyForm" action="edit_therapy.php" method="post">
                    <input type="hidden" id="editTherapyId" name="id">
                    <div class="mb-3">
                        <label for="editTherapyName" class="form-label">Therapy Name</label>
                        <input type="text" class="form-control" id="editTherapyName" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Therapy</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Get a reference to the button
    const addTherapyBtn = document.getElementById('addTherapyBtn');

    // Add click event listener
    addTherapyBtn.addEventListener('click', function() {
        // Open the modal
        $('#addTherapyModal').modal('show');
    });
     // Fill edit modal with therapy data
     document.addEventListener('DOMContentLoaded', function () {
        var editTherapyModal = document.getElementById('editTherapyModal');
        editTherapyModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var therapyId = button.getAttribute('data-id');
            var therapyName = button.getAttribute('data-name');
            
            document.getElementById('editTherapyId').value = therapyId;
            document.getElementById('editTherapyName').value = therapyName;
        });
    });
    document.querySelectorAll('.deleteBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                const form = btn.closest('.deleteForm');
                const confirmation = confirm('Are you sure you want to delete this therpy?');
                if (confirmation) {
                    form.submit();
                }
            });
        });
</script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>
