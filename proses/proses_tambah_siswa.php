<?php
include "../koneksi.php";

$nama=  $_POST['nama'];
$username=  $_POST['username'];
$password=  $_POST['password'];
$jkelamin=  $_POST['jkel'];
$kelas=  $_POST['kelas'];
$ortu=  $_POST['ortu'];

$sql = mysqli_query($db, "insert into siswa values ('','$nama','$username','$password','$jkelamin','$kelas','$ortu')");

if ($sql) {
    echo "<script>alert('Data Berhasil Disimpan'); window.location = '../tambah_siswa.php';</script>";
} else {
    echo "<script>alert('Data Gagal Disimpan'); window.location = '../tambah_siswa.php';</script>";
}
?>