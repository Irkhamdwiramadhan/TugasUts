<?php
require_once 'koneksi.php';
$id_periksa = $_GET['id'];
if($id_periksa){
    $query = "SELECT * FROM periksa WHERE id=?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$id_periksa]);
    $periksa = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Create Data Periksa</title>
</head>

<body>
    <H1>Data Periksa</H1>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <form method="POST" action="proses_periksa.php">
        <div class="form-group row">
            <label for="tanggal" class="col-4 col-form-label">tanggal</label>
            <div class="col-8">
                <input id="tanggal" name="tanggal" type="date" class="form-control"value="<?= $periksa['tanggal']?>" >
            </div>
        </div>
        <div class="form-group row">
            <label for="berat" class="col-4 col-form-label">Berat</label>
            <div class="col-8">
                <input id="berat" name="berat" type="text" class="form-control" value="<?= $periksa['berat']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="tinggi" class="col-4 col-form-label">Tinggi</label>
            <div class="col-8">
                <input id="tinggi" name="tinggi" type="text" required="required" class="form-control" value="<?= $periksa['tinggi']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="tensi" class="col-4 col-form-label">Tensi</label>
            <div class="col-8">
                <input id="tensi" name="tensi" type="text" class="form-control" value="<?= $periksa['tensi']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="keterangan" class="col-4 col-form-label">keterangan</label>
            <div class="col-8">
                <textarea id="keterangan" name="keterangan" cols="40" rows="5" class="form-control" value="<?= $periksa['keterangan']?>"></textarea>
            </div>
        </div>
    
        <!-- Form input untuk data periksa -->
        <!-- ... -->

        <!-- Dropdown untuk periksa -->
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
        
        <?php if($id_periksa){ ?>
           <input type="hidden" name="id" value="<?= $id_periksa; ?>">
       <?php } ?>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="proses" type="submit" class="btn btn-primary" value="edit">Update Data</button>
            </div>
        </div>
    </form>

</body>

</html>