<?php
session_start();
if ($_SESSION['status'] != "admin") {
    header("location:login.php?pesan=belum_login");
}

include '../koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$nama_guru = $_POST['nama_guru'];
$id_kelas = $_POST['id_kelas'];

$cek_tambah = mysqli_query($koneksi, "INSERT INTO tb_guru Values('','$username','$password','$nama_guru','$id_kelas','wali')");

if ($cek_tambah) {
    header("location:guru.php?pesan=tambah-berhasil");
} else {
    header("location:guru.php?pesan=tambah-gagal");
}


