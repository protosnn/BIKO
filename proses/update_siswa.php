<?php
include '../koneksi.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $query = "UPDATE siswa SET 
              nama = ?, 
              nisn = ?, 
              kelas = ?, 
              jenis_kelamin = ? 
              WHERE id = ?";
    
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $nama, $nisn, $kelas, $jenis_kelamin, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil diperbarui']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data: ' . mysqli_error($db)]);
    }

    mysqli_stmt_close($stmt);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}

mysqli_close($db);
?>
