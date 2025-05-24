<?php
include "../koneksi.php";

$nama = $_POST['nama_siswa'];
$keluhan = $_POST['keluhan'];

$sql = mysqli_query($db, "INSERT INTO konsultasi VALUES ('', '$nama', '$keluhan')");
if ($sql) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = '../tambah_konsultasi.php';</script>";
} else {
    echo "<script>alert('Data Gagal Disimpan'); window.location = '../tambah_konsultasi.php';</script>";
}
?>