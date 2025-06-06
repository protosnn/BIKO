<?php
require_once('../koneksi.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username']; // Use username directly
    $kelas = $_POST['kelas'];
    $jkel = $_POST['jkel'];

    $query = "UPDATE siswa SET 
              nama = ?, 
              username = ?, 
              kelas = ?, 
              jkel = ? 
              WHERE id = ?";

    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $nama, $username, $kelas, $jkel, $id);
      if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Data siswa berhasil diperbarui']);
        header('Location: ../admin/tambah_siswa.php'); // Redirect after successful update
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data: ...']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}
?>
