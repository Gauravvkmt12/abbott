<?php
include "connection.php"; 
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set the header row with column names for the Excel file
$sheet->setCellValue('A1', 'S.NO.');
$sheet->setCellValue('B1', 'PRODUCT NAME');
$sheet->setCellValue('C1', 'PRODUCT LINK');
$sheet->setCellValue('D1', 'THERAPY');
$sheet->setCellValue('E1', 'PRODUCT DESCRIPTION');
$sheet->setCellValue('F1', 'BUSINESS');
$sheet->setCellValue('G1', 'MOLECULE');
$sheet->setCellValue('H1', 'FORM');
$sheet->setCellValue('I1', 'STRENGTH');
$sheet->setCellValue('J1', 'BUSINESS AREAS');

// Starting value for serial number
$start_sno = 1;

// SQL query to fetch the required data from the product table and join with the therpy table
$sql = "SELECT p.product_name, p.product_link, t.therpy_name, p.product_descrption, p.Business, p.MOLECULE, p.FORM, p.STRENGTH, p.BUSINESS_AREAS
        FROM product p
        JOIN therpy t ON p.THERAPY = t.id"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rowNum = 2; // Start from the second row to add data, as the first row contains headers
    while ($row = $result->fetch_assoc()) {
        // Fill the Excel sheet with data
        $sheet->setCellValue('A' . $rowNum, $start_sno);
        $sheet->setCellValue('B' . $rowNum, $row["product_name"]);
        $sheet->setCellValue('C' . $rowNum, $row["product_link"]);
        $sheet->setCellValue('D' . $rowNum, $row["therpy_name"]);
        $sheet->setCellValue('E' . $rowNum, $row["product_descrption"]);
        $sheet->setCellValue('F' . $rowNum, $row["Business"]);
        $sheet->setCellValue('G' . $rowNum, $row["MOLECULE"]);
        $sheet->setCellValue('H' . $rowNum, $row["FORM"]);
        $sheet->setCellValue('I' . $rowNum, $row["STRENGTH"]);
        $sheet->setCellValue('J' . $rowNum, $row["BUSINESS_AREAS"]);

        // Increment serial number and row number
        $start_sno++;
        $rowNum++;
    }
} else {
    $sheet->setCellValue('A2', 'No data found');
}

// Set headers to download the file as an Excel file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="products.xlsx"');
header('Cache-Control: max-age=0');

// Create the Excel file and output it
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit();
?>
