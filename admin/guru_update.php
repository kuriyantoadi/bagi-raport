<?php
session_start();
if ($_SESSION['status'] != "admin") {
    header("location:../login.php?pesan=belum_login");
}

include '../koneksi.php';

$id_guru = $_POST['id_guru'];
$nama_guru = $_POST['nama_guru'];
$username = $_POST['username'];
$password = $_POST['password'];
$kode_kelas = $_POST['kode_kelas'];


$cek_edit = mysqli_query($koneksi, "UPDATE tb_guru SET
             nama_guru='$nama_guru',
             username='$username',
             password='$password',
             kode_kelas='$kode_kelas'
             where id_guru='$id_guru'
             ");

if ($cek_edit) {
    header("location:guru.php?pesan=berhasil");
} else {
    header("location:guru.php?pesan=gagal");
}
