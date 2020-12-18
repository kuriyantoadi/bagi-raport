<?php
session_start();
if ($_SESSION['status'] != "wali") {
    header("location:../login.php?pesan=belum_login");
}

include '../../koneksi.php';

$nisn = $_POST['nisn'];
$nama_siswa = $_POST['nama_siswa'];
$kode_kelas = $_POST['kode_kelas'];
$password = md5($_POST['password']);



mysqli_query($koneksi, "INSERT INTO tb_siswa Values('','$nisn','$password','$nama_siswa','$kode_kelas','','AKTIF')");


// node_id=<?php echo $d['node_id'];
header("location:siswa_daftar.php?kode_kelas=$kode_kelas");
