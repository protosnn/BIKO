<?php
include '../koneksi.php';
// Ambil data dari form
$siswa_id = $_POST['siswa_id'];
$keluhan = $_POST['keluhan'];

$sql = mysqli_query($db, "update konsultasi set siswa_id='$siswa_id', keluhan='$keluhan' where id_konsultasi='$_POST[id_konsultasi]'");
if ($sql) {
    echo "<script>alert('Data Berhasil Diupdate'); window.location = '../data_konsultasi.php';</script>";
} else {
    echo "<script>alert('Data Gagal Diupdate'); window.location = '../data_konsultasi.php';</script>";
};
?>