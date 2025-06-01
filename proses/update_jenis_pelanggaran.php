<?php
require_once('../koneksi.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $poin = $_POST['poin']; // Use username directly
    $status = $_POST['status'];

    $query = "UPDATE jenis_pelanggaran SET 
              nama = ?, 
              poin = ?, 
              status = ?
              WHERE id = ?";

    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $poin, $status, $id);
      if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Data siswa berhasil diperbarui']);
        header('Location: ../admin/tambah_jenis_pelanggaran.php'); // Redirect after successful update
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data: ...']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}
?>