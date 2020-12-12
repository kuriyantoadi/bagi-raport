<?php
session_start();
if ($_SESSION['status'] != "admin") {
    header("location:../login.php?pesan=belum_login");
}

include '../koneksi.php';

$nama_kelas = $_POST['nama_kelas'];
$kode_kelas = $_POST['kode_kelas'];
$tingkat = $_POST['tingkat'];



$cek_tambah =  mysqli_query($koneksi, "INSERT INTO tb_kelas Values('','$kode_kelas','$nama_kelas','$tingkat')");

if ($cek_tambah) {
    header("location:kelas.php?pesan=tambah-berhasil");
} else {
    header("location:kelas.php?pesan=tambah-gagal");
}


