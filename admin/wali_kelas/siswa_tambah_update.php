<?php
session_start();
if ($_SESSION['status'] != "wali") {
    header("location:../login.php?pesan=belum_login");
}

include '../../koneksi.php';

$nisn = $_POST['nisn'];
$nama_siswa = $_POST['nama_siswa'];
$id_kelas = $_POST['id_kelas'];
$password = md5($_POST['password']);



mysqli_query($koneksi, "INSERT INTO tb_siswa Values('','$nisn','$password','$nama_siswa','$id_kelas','','AKTIF')");


// node_id=<?php echo $d['node_id'];
header("location:siswa_daftar.php?id_kelas=$id_kelas");
