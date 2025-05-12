<?php
include('koneksi.php');
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
if ($password !== $confirm_password) {
    echo "Password dan konfirmasi password tidak cocok!";
    exit;
}
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
$result = $conn->query($sql);
if ($result) {
    echo "Pendaftaran berhasil! <a href='login.php'>Login di sini</a>";
} else {
    echo "Pendaftaran gagal. Silakan coba lagi.";
}
?>
