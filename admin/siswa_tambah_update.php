<?php
session_start();
if ($_SESSION['status'] != "admin") {
    header("location:../login.php?pesan=belum_login");
}

include '../koneksi.php';

$nisn = $_POST['nisn'];
$nama_siswa = $_POST['nama_siswa'];
$kode_kelas = $_POST['kode_kelas'];
$password = md5($_POST['password']);



$cek_tambah = mysqli_query($koneksi, "INSERT INTO tb_siswa Values('','$nisn','$password','$nama_siswa','$kode_kelas','','AKTIF')");

if ($cek_tambah) {
    header("location:siswa_daftar.php?pesan=tambah-berhasil");
} else {
    header("location:siswa_daftar.php?pesan=tambah-gagal");
}


