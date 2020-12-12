<?php
session_start();
if ($_SESSION['status']!="admin") {
    header("location:../login.php?pesan=belum_login");
}


include '../koneksi.php';

$id_kelas = $_POST['id_kelas'];
$nama_kelas = $_POST['nama_kelas'];
$kode_kelas = $_POST['kode_kelas'];
$tingkat = $_POST['tingkat'];

// echo $tingkat;

// UPDATE `upload` SET `id_file`=[value-1],`nama_file`=[value-2] WHERE 1

$cek_edit = mysqli_query($koneksi, "UPDATE tb_kelas SET
             nama_kelas='$nama_kelas',
             kode_kelas='$kode_kelas',
             tingkat='$tingkat'
             where id_kelas='$id_kelas'
             ");

if ($cek_edit) {
    header("location:kelas.php?pesan=edit-berhasil");
} else {
    header("location:kelas.php?pesan=edit-gagal");
}


