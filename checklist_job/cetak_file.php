<?php
session_start();
require "fpdf/fpdf.php";
require "function.php";

setlocale(LC_ALL, 'id_ID');

$pdf = new FPDF('P', 'mm', array(210, 330));

$table = trim(substr($_SESSION['username'], 0, 6));
$name = $_SESSION['username'];
$pdf->Addpage();
$pdf->SetFont('Arial', 'B', 16);
$query = mysqli_query($con, "SELECT * FROM $table");
$row = mysqli_fetch_assoc($query);

$bln = $row['date_task'];
$bulan = strtoupper(date('F', strtotime("$bln")));
$pdf->Cell(190, 10, 'DAFTAR PEKERJAAN' . ' ' . $bulan, 0, 1, 'C');
$pdf->Ln(3);

$pdf->SetFont('courier', 'B', 10);
$pdf->Cell(12, 7, 'NO', 1, 0, 'C');
$pdf->Cell(113, 7, 'NAMA PEKERJAAN', 1, 0, 'C');
$pdf->Cell(30, 7, 'STATUS', 1, 0, 'C');
$pdf->Cell(35, 7, 'TGL SELESAI', 1, 1, 'C');

$bln = $row['date_task'];
$bulan = strtoupper(date('F', strtotime("$bln")));
$blns = $row['bulan'];
$query = mysqli_query($con, "SELECT * FROM $table WHERE status_task ='Selesai' AND bulan = '$blns'");

$no = 1;
while ($row = mysqli_fetch_assoc($query)) {
    $tanggal = date('d F Y', strtotime($row['date_task']));
    $pdf->Cell(12, 7, $no++, 1, 0, 'C');
    $pdf->Cell(113, 7, $row['name_task'], 1, 0, 'L');
    $pdf->Cell(30, 7, $row['status_task'], 1, 0, 'C');
    $pdf->Cell(35, 7, $tanggal, 1, 1, 'L');
}

$pdf->SetFont('courier', 'B', 10);
$pdf->Ln(5);
$pdf->Cell(80, 7, '', 0, 0, 'C');
$pdf->Cell(30, 7, '', 0, 0, 'C');
$pdf->Cell(70, 7, 'Bondowoso,' . ' ' . date('d F Y'), 0, 1, 'C');
$pdf->Cell(80, 7, '', 0, 0, 'C');
$pdf->Cell(30, 7, '', 0, 0, 'C');
$pdf->Cell(70, 7, 'Dibuat Oleh', 0, 1, 'C');
$pdf->Cell(30, 7, '', 0, 0, 'C');
$pdf->Ln(10);
$pdf->Cell(80, 7, '', 0, 0, 'C');
$pdf->Cell(30, 7, '', 0, 0, 'C');
$pdf->Cell(70, 3, $name, 0, 1, 'C');

$pdf->Output();
