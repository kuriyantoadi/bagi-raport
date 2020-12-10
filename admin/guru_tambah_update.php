<?php
session_start();
if ($_SESSION['status'] != "admin") {
    header("location:login.php?pesan=belum_login");
}

include '../koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$nama_guru = $_POST['nama_guru'];
$kode_kelas = $_POST['kode_kelas'];

mysqli_query($koneksi, "INSERT INTO tb_guru Values('','$username','$password','$nama_guru','$kode_kelas','wali')");


// node_id=<?php echo $d['node_id'];
header("location:guru.php");
