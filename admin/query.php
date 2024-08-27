<?php
include "connection.php";
include "header.php";

$sql = "SELECT name, email, message, submission_date FROM form_submissions";
$result = $conn->query($sql);
$start_no = 1;
?>
<div class="container mt-5">
    <a onclick="window.history.back()" href="" class="btn btn-outline-dark">Go Back</a>
    <h2>Form Submissions</h2>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th class="text-center bg-dark text-white">S.NO</th>
                <th class="text-center bg-dark text-white">Name</th>
                <th class="text-center bg-dark text-white">Email</th>
                <th class="text-center bg-dark text-white">Message</th>
                <th class="text-center bg-dark text-white">Submission Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="text-center"><?= $start_no++;  ?></td>
                        <td class="text-center"><?= htmlspecialchars($row['name']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($row['email']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($row['message']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($row['submission_date']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No submissions found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>