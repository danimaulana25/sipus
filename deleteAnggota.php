<?php require_once("./config/functions.php"); ?>
<?php
include './config/koneksi.php';
$DeleteFromURL = $_GET['Delete'];

mysqli_query(
	$connection,
	"DELETE FROM anggota
	WHERE id_anggota='$DeleteFromURL'"
);
if ($DeleteFromURL) {
	$_SESSION["SuccessMessage"] = "Data Anggota berhasil dihapus";
	Redirect_to("dataAnggota.php");
} else {
	$_SESSION["ErrorMessage"] = "hapus Gagal, Coba Lagi!";
	Redirect_to("dataAnggota.php");
}

header("location:dataAnggota.php");
