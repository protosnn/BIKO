<?php
include '../koneksi.php';

// Query untuk mengambil data siswa
$query = "SELECT 
    s.nama,
    s.kelas,
    COALESCE(SUM(p.point), 0) as point,
    DATE_FORMAT(MAX(p.tanggal), '%d/%m/%Y') as tanggal,
    CASE 
        WHEN COALESCE(SUM(p.point), 0) <= 50 THEN 'Aman'
        WHEN COALESCE(SUM(p.point), 0) <= 75 THEN 'Peringatan'
        ELSE 'Bahaya'
    END as status
FROM siswa s
LEFT JOIN pelanggaran p ON s.id = p.id_siswa
GROUP BY s.id, s.nama, s.kelas
ORDER BY point DESC";

$result = mysqli_query($koneksi, $query);
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
        'nama' => $row['nama'],
        'kelas' => $row['kelas'],
        'point' => $row['point'],
        'status' => $row['status'],
        'tanggal' => $row['tanggal']
    );
}

echo json_encode($data);
?>
