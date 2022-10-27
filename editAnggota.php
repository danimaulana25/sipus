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
    $EditFromURL = $_GET['Edit'];
    $Query = "UPDATE anggota SET nama_anggota='$Nama',jenis_kelamin='$Jenis_kelamin',kelas='$kelas',alamat='$Alamat' WHERE id_anggota='$EditFromURL'";
    $Execute = mysqli_query($connection, $Query);
    if ($Execute) {
        $_SESSION["SuccessMessage"] = "Anggota berhasil di-edit";
        Redirect_to("dataAnggota.php");
    } else {
        $_SESSION["ErrorMessage"] = "Gagal di-edit, Coba Lagi!";
        Redirect_to("dataAnggota.php");
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Anggota</title>
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
        <div class="row">
            <!--Main Area-->
            <div class="col-sm-10">
                <h1>Update Data Anggota</h1>
                <div>
                    <?php
                    $SearchQueryParameter = $_GET['Edit'];
                    $connection;
                    $Query = "SELECT * FROM anggota WHERE id_anggota='$SearchQueryParameter'";
                    $Execute = mysqli_query($connection, $Query);
                    while ($DataRows = mysqli_fetch_array($Execute)) {
                        $NamaAnggotaUpdated = $DataRows['nama_anggota'];
                        $JenisKelaminUpdated = $DataRows['jenis_kelamin'];
                        $kelasUpdated = $DataRows['kelas'];
                        $AlamatUpdated = $DataRows['alamat'];
                    }

                    ?>
                    <form action="editAnggota.php?Edit=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <label for="nama_anggota">Nama: </label>
                                <input value="<?php echo $NamaAnggotaUpdated ?>" class="form-control" type="text" name="nama_anggota" id="nama_anggota">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin: </label>
                                <?php
                                if ($JenisKelaminUpdated == "L") {
                                    echo "<br/><input type='radio' name='jenis_kelamin' value='L' checked>Laki-Laki<br>
                              <input type='radio' name='jenis_kelamin' value='P'>Perempuan<br/>";
                                } elseif ($JenisKelaminUpdated == "P") {
                                    echo "<br/><input type='radio' name='jenis_kelamin' value='L'>Laki-Laki<br>
                              <input type='radio' name='jenis_kelamin' value='P' checked>Perempuan<br/>";
                                } else {
                                    echo "<br/><input type='radio' name='jenis_kelamin' value='L'>Laki-Laki<br>
                              <input type='radio' name='jenis_kelamin' value='P'>Perempuan<br/>";
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas: </label>
                                <select class="form-control" name="kelas" id="kelas">
                                    <option value="<?php echo $kelasUpdated ?>"><?php echo $kelasUpdated ?></option>
                                    <option value="10 IPA">10 IPA</option>
                                    <option value="10 IPS">10 IPS</option>
                                    <option value="11 IPA">11 IPA</option>
                                    <option value="11 IPS">11 IPS</option>
                                    <option value="12 IPA">12 IPA</option>
                                    <option value="12 IPS">12 IPS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat: </label>
                                <textarea class="form-control" name="alamat" id="alamat"><?php echo $AlamatUpdated; ?></textarea>
                            </div>
                </div>
                <input class="btn btn-success btn-block" type="Submit" name="Submit" value="Edit Anggota">
                </fieldset>
                <br>
                </form>
            </div>
        </div>
    </div>
    <!--Ending of Row-->
</body>

</body>

</html>