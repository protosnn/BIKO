<?php
require_once('../koneksi.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['nisn']; // NISN digunakan sebagai username
    $kelas = $_POST['kelas'];
    $jkel = $_POST['jenis_kelamin'];

    $query = "UPDATE siswa SET 
              nama = ?, 
              username = ?, 
              kelas = ?, 
              jkel = ? 
              WHERE id = ?";

    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $nama, $username, $kelas, $jkel, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal mengupdate data: ' . mysqli_error($db)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}
?>
