<?php
session_start();
include ('koneksi.php');

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
    $_SESSION['error'] = "Username atau Password tidak boleh kosong!";
    header("Location: login.php");
    exit();
}

$query = mysqli_query($db, "SELECT * FROM siswa WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($query) == 1) {
    $siswa = mysqli_fetch_assoc($query);
    // Set session variables
    $_SESSION['siswa_id'] = $siswa['id'];
    $_SESSION['username'] = $siswa['username'];
    $_SESSION['logged_in'] = true;
    
    header("Location: siswa/dashboard_siswa.php");
    exit();
} else {
    $_SESSION['error'] = "Username atau Password Salah!";
    header("Location: login.php");
    exit();
}
?>









