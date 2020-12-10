<?php
session_start();
if ($_SESSION['status'] != "wali" && $_SESSION['status'] != "admin") { 
    header("location:login.php?pesan=belum_login");
}

include '../../koneksi.php';

$id_siswa = $_POST['id_siswa'];
$nisn = $_POST['nisn'];
$nama_siswa = $_POST['nama_siswa'];
$kode_kelas = $_POST['kode_kelas'];


mysqli_query($koneksi, "UPDATE tb_siswa SET
             nisn='$nisn',
             nama_siswa='$nama_siswa',
             kode_kelas='$kode_kelas'
             where id_siswa='$id_siswa'
             ");

// node_id=<?php echo $d['node_id'];
header("location:index.php");
