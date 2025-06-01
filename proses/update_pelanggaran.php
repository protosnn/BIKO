<?php
include '../koneksi.php';

$nama = $_POST['nama_siswa'];
$pelapor = $_POST['pelapor'];
$jenis_pelanggaran = $_POST['jenis_pelanggaran'];
$bukti = $_POST['bukti'];

$sql = mysqli_query($db, "update pelanggaran set nama_siswa='$nama', pelapor='$pelapor', jenis_pelanggaran='$jenis_pelanggaran', bukti='$bukti' where id_pelanggaran='$_POST[id_pelanggaran]'");

if ($sql) {
    echo "<script>alert('Data Berhasil Diupdate'); window.location = '../data_pelanggaran.php';</script>";
} else {
    echo "<script>alert('Data Gagal Diupdate'); window.location = '../data_pelanggaran.php';</script>";
};


?>