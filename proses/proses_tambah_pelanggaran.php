<?php
include "../koneksi.php";

$nama = $_POST['nama_siswa'];
$pelapor = $_POST['pelapor'];
$jenis_pelanggaran = $_POST['jenis_pelanggaran'];
$bukti = $_POST['bukti'];

$sql = mysqli_query($db, "INSERT INTO pelanggaran VALUES ('', '$nama', '$pelapor', '$jenis_pelanggaran', '$bukti')");
if ($sql) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = '../tambah_pelanggaran.php';</script>";
} else {
    echo "<script>alert('Data Gagal Disimpan'); window.location = '../tambah_pelanggaran.php';</script>";
}

?>