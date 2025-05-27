<?php
include "../koneksi.php";

$siswa_id = $_POST['siswa_id'];
$keluhan = $_POST['keluhan'];

$sql = mysqli_query($db, "INSERT INTO konsultasi VALUES ('', '$siswa_id', '$keluhan')");
if ($sql) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = '../tambah_konsultasi.php';</script>";
} else {
    echo "<script>alert('Data Gagal Disimpan'); window.location = '../tambah_konsultasi.php';</script>";
}
?>