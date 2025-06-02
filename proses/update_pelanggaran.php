<?php
require_once('../koneksi.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {    $id = $_POST['id'];
    $nama_siswa = $_POST['nama_siswa'];
    $pelapor = $_POST['pelapor'];
    $jenis = $_POST['jenis_pelanggaran'];
    $bukti = $_POST['bukti'];

    $query = "UPDATE pelanggaran SET 
              siswa_id = ?, 
              pelapor = ?, 
              jenis_pelanggaran_id = ?, 
              bukti = ? 
              WHERE id = ?";

    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $nama_siswa, $pelapor, $jenis, $bukti, $id);
      if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Data siswa berhasil diperbarui']);
        header('Location: ../admin/tambah_pelanggaran.php'); // Redirect after successful update
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data: ...']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}
?>