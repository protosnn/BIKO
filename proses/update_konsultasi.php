<?php
require_once('../koneksi.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {    $id = $_POST['id'];
    $nama_siswa = $_POST['nama_siswa'];
    $keluhan = $_POST['keluhan'];

    $query = "UPDATE konsultasi SET 
              nama_siswa = ?, 
              keluhan = ?
              WHERE id = ?";

    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ssi", $nama_siswa, $keluhan, $id);
      if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Data siswa berhasil diperbarui']);
        header('Location: ../admin/tambah_konsultasi.php'); // Redirect after successful update
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data: ...']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}
?>