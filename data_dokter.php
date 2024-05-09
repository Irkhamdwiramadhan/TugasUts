<?php
require "navbar.php";
require "sidebar.php";

require_once 'koneksi.php';

$query = "SELECT dokter.*, unit_kerja.nama as nama_unitkerja
            FROM dokter
            LEFT JOIN unit_kerja ON dokter.unit_kerja_id = unit_kerja.id";
$hasil = $dbh->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dokter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body>
    <div class="content-wrapper">
        <div class="container">
            <h2>Data Dokter Puskesmas Depok</h2>
            <a href="create_dokter.php" class="btn btn-primary"> Tambah Data Dokter</a>
            <table class="table table-bordered">
                <tr class="table-warning">
                    <th>no</th>
                    <th>Nama</th>
                    <th>tmp_lahir</th>
                    <th>Gender</th>
                    <th>tgl_lahir</th>
                    <th>kategori</th>
                    <th>telepon</th>
                    <th>alamat</th>
                    <th>unit_kerja</th>
                    <th>Aksi</th>

                </tr>
                <?php
                $no = 1;
                foreach ($hasil as $hasil) { ?>
                    <tr>

                        <td><?= $no++; ?></td>
                        <td><?= $hasil['nama']; ?></td>
                        <td><?= $hasil['tmp_lahir']; ?></td>
                        <td><?= $hasil['gender']; ?></td>
                        <td><?= $hasil['tgl_lahir']; ?></td>
                        <td><?= $hasil['kategori']; ?></td>
                        <td><?= $hasil['telpon']; ?></td>
                        <td><?= $hasil['alamat']; ?></td>
                        <td><?= $hasil['nama_unitkerja']; ?></td>
                        <td>
                            <a href="edit_dokter.php?id=<?= $hasil['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="proses_dokter.php?id=<?= $hasil['id']; ?>" class="btn btn-danger">Hapus</a>
                        </td>


                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>