<?php
require_once('koneksi.php');

// Ganti dengan username dan password yang ingin diupdate
$username = 'username_siswa';
$new_password = 'password_baru';

// Hash password
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// Update password di database
$query = "UPDATE siswa SET password = ? WHERE username = ?";
$stmt = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $username);

if (mysqli_stmt_execute($stmt)) {
    echo "Password berhasil diupdate!";
} else {
    echo "Error: " . mysqli_error($db);
}
?>
