<?php require_once("./config/koneksi.php"); ?>
<?php require_once("./config/session.php"); ?>
<?php require_once("./config/functions.php"); ?>
<?php
if (isset($_POST["Submit"])) {
    $Nama = mysqli_real_escape_string($connection, $_POST["nama_anggota"]);
    $Jenis_kelamin = mysqli_real_escape_string($connection, $_POST["jenis_kelamin"]);
    $kelas = mysqli_real_escape_string($connection, $_POST["kelas"]);
    $Alamat = mysqli_real_escape_string($connection, $_POST["alamat"]);
    global $connection;
    $Query = "INSERT INTO anggota(nama_anggota,jenis_kelamin,kelas,alamat)VALUES('$Nama','$Jenis_kelamin','$kelas','$Alamat')";
    $Execute = mysqli_query($connection, $Query);
    if ($Execute) {
        $_SESSION["SuccessMessage"] = "Pendaftaran Berhasil";
        Redirect_to("tambahAnggota.php");
    } else {
        $_SESSION["ErrorMessage"] = "Pendaftaran Gagal, Coba Lagi!";
        Redirect_to("tambahAnggota.php");
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/publicstyles.css">
    <link rel="stylesheet" href="./css/stylesheet.css" type="text/css" charset="utf-8" />
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <!-- Brand -->
        <a class="navbar-brand" href="index.html">
            <h3>SISTEM PERPUSTAKAAN</h3>
        </a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="index.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a>
            </li>
            <li class="nav-item">
                <a href="dataAnggota.php" class="nav-link"><i class="fa fa-dataanggota" aria-hidden="true"></i><span>Data Anggota</span></a>
            </li>
            <li class="nav-item">
                <a href="tambahAnggota.php" class="nav-link"><i class="fa fa-tambahanggota" aria-hidden="true"></i><span>Tambah Anggota</span></a>
            </li>
        </ul>
    </nav><br>
    <div class="container-fluid">
        <H2>Tambah Data Anggota</H2>
        <div>
            <?php echo Message();
            echo SuccessMessage();
            ?>
        </div>
        <form action="tambahAnggota.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <table id="tabel-input">
                    <tr>
                        <td class="label-formulir">Nama Angota</td>
                        <td class="isian-formulir"><input type="text" name="nama_anggota" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="label-formulir">Jenis Kelamin</td>
                        <td class="isian-formulir"><input type="radio" name="jenis_kelamin" value="L" />Laki-Laki</td>
                    </tr>
                    <tr>
                        <td class="label-formulir"></td>
                        <td class="isian-formulir"><input type="radio" name="jenis_kelamin" value="P" />Perempuan</td>
                    </tr>
                    <tr>
                        <td class="label-formulir">Kelas</td>
                        <td class="isian-formulir">
                            <select class="form-control" name="kelas" id="kelas">
                                <option value="">Pilih Salah Satu</option>
                                <option value="10 IPA">10 IPA</option>
                                <option value="10 IPS">10 IPS</option>
                                <option value="11 IPA">11 IPA</option>
                                <option value="11 IPS">11 IPS</option>
                                <option value="12 IPA">12 IPA</option>
                                <option value="12 IPS">12 IPS</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-formulir">Alamat</td>
                        <td class="isian-formulir"><textarea rows="2" cols="40" name="alamat" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td class="label-formulir"></td>
                        <td class="isian-formulir">
                            <input class="btn btn-primary float-left" type="Submit" name="Submit" value="Simpan">
                            <button type="reset" class="btn btn-info float-left ml-1">Reset</button>
                            <a href="index.php"><button type="button" class="btn btn-success float-left ml-1">Kembali</button></a>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>

</body>

</html>