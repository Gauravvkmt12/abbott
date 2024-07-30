<?php
include "connection.php";
include "nav.php";
$pageTitle = "THERAPY";
$rowsPerPage = 10;
$sqlTotalRows = "SELECT COUNT(*) AS total FROM therpy";
$resultTotalRows = $conn->query($sqlTotalRows);
$totalRows = $resultTotalRows->fetch_assoc()["total"];
$totalPages = ceil($totalRows / $rowsPerPage);
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}
$startLimit = ($currentPage - 1) * $rowsPerPage;
$sql = "SELECT id, therpy_name, therpydesciption FROM therpy LIMIT $startLimit, $rowsPerPage";
$result = $conn->query($sql);
$result = $conn->query($sql);
if (!$result) {
    die("Error fetching data: " . $conn->error);
}
$therapies = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $therapies[] = array("id" => $row["id"], "name" => $row["therpy_name"], "description" => $row["therpydesciption"]);
    }
} else {
    echo "No therapies found.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>therapy</title>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-7">
            <div class="row justify-content-between">
                <div class="col-6 col-md-3 mb-2 mb-md-0"><a href="#" class="btn btn-primary w-100">THERAPY</a></div>
                <div class="col-6 col-md-3 mb-2 mb-md-0"><a href="product.php" class="btn btn-primary w-100">ALL PRODUCT</a></div>
                <div class="col-6 col-md-3 mb-md-0">
                    <button id="addTherapyBtn" class="btn btn-primary">ADD THERAPY</button>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>

<div class="container table-responsive">
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
            <?php
            $start_sno = ($currentPage - 1) * $rowsPerPage + 1;
            foreach ($therapies as $therapy) {
                ?>
                <tr>
                    <td class="text-center"><?php echo $start_sno; ?></td>
                    <td class="text-center"><?php echo $therapy["name"]; ?></td>
                    <td class="text-center"><?php echo $therapy["description"]; ?></td>
                    <td class="text-center">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTherapyModal" data-id="<?php echo $therapy['id']; ?>" data-name="<?php echo $therapy['name']; ?>">Edit</button>
                    </td>
                    <td class="text-center">
                        <form action="delete_therapy.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $therapy['id']; ?>">
                            <button type="submit" class="btn btn-danger deleteBtn">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
                $start_sno++;
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
