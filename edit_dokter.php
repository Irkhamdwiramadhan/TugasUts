<?php
require_once 'koneksi.php';

// Pastikan ID ada dalam parameter URL sebelum mengambil data dari database
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM dokter WHERE id=?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$id]);
    $dokter = $stmt->fetch();
} else {
    // Redirect atau tampilkan pesan kesalahan jika ID tidak ada dalam parameter URL
    // Contoh: header("Location: error.php");
    exit("ID tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Create Data Dokter</title>
</head>

<body>
    <H1>Data Dokter</H1>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <form method="POST" action="proses_dokter.php">
        <div class="form-group row">
            <label for="nama" class="col-4 col-form-label">nama</label>
            <div class="col-8">
                <input id="nama" name="nama" type="text" class="form-control" value="<?= $dokter['nama']?>">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="tmp_lahir" class="col-4 col-form-label">tmp Lahir</label>
            <div class="col-8">
                <input id="tmp_lahir" name="tmp_lahir" type="text" required="required" class="form-control" value="<?= $dokter['tmp_lahir']?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">gender</label>
            <div class="col-8">
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="gender" id="genderLaki" type="radio" required="required" class="custom-control-input" value="L" <?= ($dokter['gender'] == 'L' ? 'checked' : ''); ?>>
                    <label for="genderLaki" class="custom-control-label">Laki-Laki</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="gender" id="genderPerempuan" type="radio" required="required" class="custom-control-input" value="P" <?= ($dokter['gender'] == 'P' ? 'checked' : ''); ?>>
                    <label for="genderPerempuan" class="custom-control-label">Perempuan</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_lahir" class="col-4 col-form-label">Tanggal lahir</label>
            <div class="col-8">
                <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="<?= $dokter['tgl_lahir']?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">kategori</label>
            <div class="col-8">
                <select name="kategori" id="kategori">
                    <option value="">spesialis</option>
                    <option value="">dokter umum</option>
                    <option value="">internis</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="telpon" class="col-4 col-form-label">telpon</label>
            <div class="col-8">
                <input id="telpon" name="telpon" type="text" class="form-control" value="<?= $dokter['telpon']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-4 col-form-label">Alamat</label>
            <div class="col-8">
                <textarea id="alamat" name="alamat" cols="40" rows="5" class="form-control"><?= $dokter['alamat']?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">unit_kerja</label>
            <div class="col-8">
                <select id="unit_kerja" name="unit_kerja" class="custom-select">
                    <?php foreach ($unit_kerjas as $unit_kerja) { ?>
                        <option value="<?= $unit_kerja['id']; ?>"><?= $unit_kerja['nama']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <?php if($id){ ?>
           <input type="hidden" name="id" value="<?= $id; ?>">
       <?php } ?>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="proses" type="submit" class="btn btn-primary" value="edit">Update Data</button>
            </div>
        </div>
    </form>

</body>

</html>
