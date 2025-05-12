<?php
include('koneksi.php');
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$ponsel = $_POST['ponsel'];

$sql = "UPDATE mahasiswa SET nama = '$nama', 
gender = '$gender', email = '$email', ponsel = '$ponsel' WHERE nim = '$nim'";
$exe = $conn -> query($sql);
if($exe){
    header("location:read.php");
}
?>
