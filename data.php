<?php
include './config/koneksi.php';
?>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Anggota</th>
        <th>Jenis Kelamin</th>
        <th>Kelas</th>
        <th>Alamat</th>
    </tr>
    <?php
    $connection;
    $Query = "SELECT * FROM anggota";
    $Execute = mysqli_query($connection, $Query);
    $no = 1;
    while ($d = mysqli_fetch_array($Execute)) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama_anggota']; ?></td>
            <td><?php echo $d['jenis_kelamin']; ?></td>
            <td><?php echo $d['kelas']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
        </tr>
    <?php
    }
    ?>
</table>