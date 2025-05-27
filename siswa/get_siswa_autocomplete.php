<?php
include '../koneksi.php';

// Sanitasi input
$searchTerm = mysqli_real_escape_string($db, $_GET['term']); // menggunakan $db yang sudah didefinisikan di koneksi.php

$query = "SELECT siswa_id, nama, kelas FROM siswa WHERE nama LIKE '%".$searchTerm."%' ORDER BY nama ASC LIMIT 10";
$result = mysqli_query($db, $query);

$data = array();
if($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array(
            'id' => $row['siswa_id'],
            'value' => $row['nama'],
            'label' => $row['nama'] . ' - ' . $row['kelas']
        );
    }
}

header('Content-Type: application/json');
echo json_encode($data);
?>
