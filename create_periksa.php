<?php
require_once 'koneksi.php';
$query = "SELECT * FROM pasien";
$hasilPasien = $dbh->query($query);

// Query untuk mendapatkan daftar dokter
$queryDokter = "SELECT * FROM dokter";
$hasilDokter = $dbh->query($queryDokter);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Create Data Periksa</title>
</head>

<body>
    <H1>Data Pasien Puskesmas Depok</H1>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <form method="POST" action="proses_periksa.php">
        <div class="form-group row">
            <label for="tanggal" class="col-4 col-form-label">tanggal</label>
            <div class="col-8">
                <input id="tanggal" name="tanggal" type="date" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="berat" class="col-4 col-form-label">Berat</label>
            <div class="col-8">
                <input id="berat" name="berat" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="tinggi" class="col-4 col-form-label">Tinggi</label>
            <div class="col-8">
                <input id="tinggi" name="tinggi" type="text" required="required" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="tensi" class="col-4 col-form-label">Tensi</label>
            <div class="col-8">
                <input id="tensi" name="tensi" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="keterangan" class="col-4 col-form-label">keterangan</label>
            <div class="col-8">
                <textarea id="keterangan" name="keterangan" cols="40" rows="5" class="form-control"></textarea>
            </div>
        </div>
    
        <!-- Form input untuk data periksa -->
        <!-- ... -->

        <!-- Dropdown untuk pasien -->
        <div class="form-group row">
            <label class="col-4">Pasien</label>
            <div class="col-8">
                <select id="pasien" name="pasien" class="custom-select">
                    <?php foreach ($hasilPasien as $pasien) { ?>
                        <option value="<?= $pasien['id_pasien']; ?>"><?= $pasien['id_pasien']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <!-- Dropdown untuk dokter -->
        <div class="form-group row">
            <label class="col-4">Dokter</label>
            <div class="col-8">
                <select id="dokter" name="dokter" class="custom-select">
                    <?php foreach ($hasilDokter as $dokter) { ?>
                        <option value="<?= $dokter['id']; ?>"><?= $dokter['id']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="proses" type="submit" class="btn btn-primary" value="tambah">Submit</button>
            </div>
        </div>
    </form>

</body>

</html>