<?php
$SearchQueryParameter = $_GET['Print'];
include('config/koneksi.php');
require('./vendor/autoload.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$data_anggota = mysqli_query($connection, "SELECT * FROM anggota");
$kodeHtml = '<style>th,td {
        padding : 5px; } </style>
    <table class="table table-striped" border=1>
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Id Anggota</th>
        <th scope="col">Nama Anggota</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Kelas</th>
        <th scope="col">Alamat</th>
    </tr>
    </thead>';
$number = 1;
$kodeHtml .= "<tbody>";
while ($a = mysqli_fetch_array($data_anggota)) {
    $kodeHtml .= "<tr>
                <td>" . $number++ . "</td>
                <td>" . $a['id_anggota'] . "</td>
                <td>" . $a['nama_anggota'] . "</td>
                <td>" . $a['jenis_kelamin'] . "</td>
                <td>" . $a['kelas'] . "</td>
                <td>" . $a['alamat'] . "</td>
                </tr>";
}
$kodeHtml .= "</tbody>";
$kodeHtml .= "</table>";
// print_r($kodeHtml);
// exit;
$dompdf->loadHtml($kodeHtml);
$dompdf->setPaper('A4', 'landscape');

$dompdf->render();
$dompdf->stream();
// $dompdf->stream('Data Anggota Perpustakaan.pdf');
