<?php
require_once 'koneksi.php';

$_nama = $_POST['nama'];
$_tmp_lahir = $_POST['tmp_lahir'];
$_gender = $_POST['gender'];
$_tgl_lahir = $_POST['tgl_lahir'];
$_kategori = $_POST['kategori'];
$_telpon = $_POST['telpon'];
$_alamat = $_POST['alamat'];
$_unit_kerja = $_POST['unit_kerja'];
$_proses = $_POST['proses'];

$data = [$_nama, $_tmp_lahir, $_gender, $_tgl_lahir,
 $_kategori,$_telpon, $_alamat, $_unit_kerja];

if($_proses == 'tambah') {
$sql = "INSERT INTO dokter (nama, tmp_lahir, gender,  tgl_lahir, kategori,telpon, alamat, unit_kerja_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $dbh->prepare($sql);
$stmt->execute($data);

}elseif($_proses == 'edit') {
    $dokter = $_POST['id'];
    $data[] = $dokter;
    $sql = "UPDATE dokter SET nama=?, tmp_lahir=?, gender=?, tgl_lahir=?,telphon=?, kategori=?, alamat=?, unit_kerja_id=?, WHERE id_dokter=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
} else {
    $id = $_GET['id'];
    $sql = "DELETE FROM dokter WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
}
header('Location: data_dokter.php');
