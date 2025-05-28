<?php
include "../koneksi.php";
header('Content-Type: application/json');

// Get form data
$siswa_id = $_POST['siswa_id'];
$pelapor = $_POST['pelapor'];
$jenis_pelanggaran_id = $_POST['jenis_pelanggaran_id'];
$keterangan = $_POST['keterangan'];

// Handle file upload
$bukti = "";
if(isset($_FILES['bukti']) && $_FILES['bukti']['error'] == 0) {
    $target_dir = "../assets/bukti_pelanggaran/";
    
    // Create directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    // Generate unique filename
    $file_extension = pathinfo($_FILES["bukti"]["name"], PATHINFO_EXTENSION);
    $bukti = "bukti_" . time() . "." . $file_extension;
    $target_file = $target_dir . $bukti;
    
    if(!move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
        echo json_encode(['status' => 'error', 'message' => 'Gagal mengupload file']);
        exit;
    }
}

// Insert into database
$query = "INSERT INTO pelanggaran (siswa_id, pelapor, jenis_pelanggaran_id, bukti, keterangan) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($db, $query);

if(!$stmt) {
    echo json_encode(['status' => 'error', 'message' => 'Gagal mempersiapkan query']);
    exit;
}

mysqli_stmt_bind_param($stmt, "issss", $siswa_id, $pelapor, $jenis_pelanggaran_id, $bukti, $keterangan);

if(mysqli_stmt_execute($stmt)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan ke database: ' . mysqli_error($db)]);
}

mysqli_stmt_close($stmt);
mysqli_close($db);

?>