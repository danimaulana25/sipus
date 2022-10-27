<?php require_once("./config/koneksi.php"); ?>
<?php require_once("./config/session.php"); ?>
<?php require_once("./config/functions.php"); ?>

<?php
$SearchQueryParameter = $_GET['Print'];
$connection;
$Query = "SELECT * FROM anggota WHERE id_anggota='$SearchQueryParameter'";
$Execute = mysqli_query($connection, $Query);
while ($Data = mysqli_fetch_array($Execute)) {
    $NamaAnggota = $Data["nama_anggota"];
    $Jeniskelamin = $Data["jenis_kelamin"];
    $Kelas = $Data["kelas"];
    $Alamat = $Data["alamat"];
}

?>

<?php
require('./config/fpdf182/fpdf.php');
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(50, 8, 'Nama', 0, 0, 'L');
$pdf->Cell(100, 8, ': ' . $NamaAnggota . '', 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(50, 8, 'Jenis Kelamin', 0, 0, 'L');
$pdf->Cell(100, 8, ': ' . $Jeniskelamin . '', 0, 0, 'L');
$pdf->Cell(50, 8, 'kelas', 0, 0, 'L');
$pdf->Cell(100, 8, ': ' . $Kelas . '', 0, 0, 'L');
$pdf->Cell(50, 8, 'Alamat', 0, 0, 'L');
$pdf->Cell(100, 8, ': ' . $Alamat . '', 0, 0, 'L');
$pdf->Output('D', 'DataAnggota.pdf');
// $pdf = new FPDF('P', 'mm', 'A4');
// $pdf->AddPage();
// $pdf->SetFont('Arial', 'B', 16);
// $pdf->Cell(50, 8, 'Nama', 0, 0, 'L');
// $pdf->Cell(100, 8, ': ' . $NamaAnggota . '', 0, 0, 'L');
// $pdf->Ln();
// $pdf->Cell(50, 8, 'Alamat', 0, 0, 'L');
// $pdf->Cell(100, 8, ': ' . $Alamat . '', 0, 0, 'L');
// $pdf->Ln();
// $pdf->Cell(50, 8, 'Jenis Kelamin', 0, 0, 'L');
// $pdf->Cell(100, 8, ': ' . $Jeniskelamin . '', 0, 0, 'L');
// $pdf->Ln();
// $pdf->Cell(50, 8, 'kelas', 0, 0, 'L');
// $pdf->Cell(100, 8, ': ' . $Kelas . '', 0, 0, 'L');
// $pdf->Output('D', 'Peserta.pdf');
