<?php

require_once "../../koneksi.php";

$kode_kelas = $_POST['kode_kelas'];
$passwordbaru = md5($_POST['passwordbaru']);
$konfirmasipassword = md5($_POST['konfirmasipassword']);
$nisn = $_POST['nisn'];
$id_siswa = $_POST['id_siswa'];

// echo $passwordlama;
// echo $passwordbaru;
// echo $konfirmasipassword;

    $updatequery = mysqli_query($koneksi, "update tb_siswa set password='$passwordbaru' where nisn = '$nisn'");

    if ($updatequery) {
        header("location:siswa_reset.php?pesan=reset-berhasil&id_siswa=$id_siswa");
    } else {
        header("location:siswa_reset.php?pesan=reset-gagal&id_siswa=$id_siswa");
    }
