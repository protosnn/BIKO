<?php
include "../koneksi.php";

$nama_siswa = $_POST['nama_siswa'];
$keluhan = $_POST['keluhan'];

$sql = mysqli_query($db, "INSERT INTO konsultasi VALUES ('','$nama_siswa', '$keluhan')");

if ($sql) {
    echo "success";
} else {
    echo "error";
}
?>