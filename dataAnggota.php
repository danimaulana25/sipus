<?php require_once("./config/koneksi.php"); ?>
<?php require_once("./config/session.php"); ?>
<?php require_once("./config/functions.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Anggota</title>
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
        <!--Container-->
        <H2>Data Anggota</H2>
        <div>
            <?php echo Message();
            echo SuccessMessage();
            ?>
        </div>
        <form action="dataAnggota.php" class="navbar-form navbar-right" style="margin-right: 105px;">
            <div class="form-inline">
                <input type="text" class="form-control mr-sm-2" placeholder="Search" name="Search">
                <button class="btn btn-primary btn-outline-light" name="SearchButton">Go</button>
                <button type="reset" class="btn btn-primary btn-outline-light">Clear</button>
                <a href="export.php"><button type="button" class="btn btn-success float-left ml-1">Export to Excel</button></a>
                <a href="exportpdf.php"><button type="button" class="btn btn-primary float-left ml-1">Export to Pdf</button></a>
            </div><br />
            <?php
            global $connection;
            $data_anggota = mysqli_query($connection, "SELECT * FROM anggota");
            $jumlah_anggota = mysqli_num_rows($data_anggota);
            ?>
            <p>Jumlah Anggota = <b><?php echo $jumlah_anggota; ?> orang</b></p>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Action</th>
                    <!-- <th>Print</th> -->
                </tr>
                <?php
                global $connection;
                if (isset($_GET["SearchButton"])) {
                    $Search = $_GET["Search"];

                    $ViewQuery = "SELECT * FROM anggota WHERE nama_anggota LIKE '%$Search%' OR alamat LIKE '%$Search%' OR jenis_kelamin LIKE '%$Search%' OR kelas LIKE '%$Search%' ORDER BY id_anggota asc";
                }
                //The default query untuk anggota
                else {
                    $ViewQuery = "SELECT * FROM anggota ORDER BY id_anggota asc";
                }
                $Execute = mysqli_query($connection, $ViewQuery);
                $SrNo = 0;
                while ($DataRows = mysqli_fetch_array($Execute)) {
                    $Id = $DataRows["id_anggota"];
                    $Nama = $DataRows["nama_anggota"];
                    $Jeniskelamin = $DataRows["jenis_kelamin"];
                    $Kelas = $DataRows["kelas"];
                    $Alamat = $DataRows["alamat"];
                    $SrNo++;
                ?>
                    <tr>
                        <td><?php echo $SrNo; ?></td>
                        <td><?php echo $Nama; ?></td>
                        <td><?php echo $Jeniskelamin; ?></td>
                        <td><?php echo $Kelas; ?></td>
                        <td><?php
                            if (strlen($Alamat) > 20) {
                                $Alamat = substr($Alamat, 0, 20) . '...';
                            }
                            echo $Alamat; ?></td>
                        <td width="130">
                            <a href="editAnggota.php?Edit=<?php echo $Id; ?>"><span class="btn btn-sm btn-warning">Edit</span></a>
                            <a href="deleteAnggota.php?Delete=<?php echo $Id; ?>"><span onclick="return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="btn btn-sm btn-danger">Delete</span></a>
                        </td>
                        <!-- <td><a href="exportpdf.php?Print"><span class="btn btn-sm btn-primary">Print</span></a></td> -->
                    <?php } ?>
                    </tr>
            </table>
        </div>
    </div>

</body>

</html>