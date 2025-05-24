<?php
include "../koneksi.php";

$nama = $_POST['nama'];
$poin = $_POST['poin'];
$status = $_POST['status'];

$sql = mysqli_query($db, "INSERT INTO jenis_pelanggaran VALUES ('', '$nama', '$poin', '$status')");
if ($sql) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = '../tambah_jenis_pelanggaran.php';</script>";
} else {
    echo "<script>alert('Data Gagal Disimpan'); window.location = '../tambah_jenis_pelanggaran.php';</script>";
}



?>