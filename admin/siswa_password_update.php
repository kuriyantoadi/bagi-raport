<?php

require_once "../koneksi.php";

$id_siswa = $_POST['id_siswa'];
$passwordbaru = md5($_POST['passwordbaru']);
$konfirmasipassword = md5($_POST['konfirmasipassword']);
$nisn = $_POST['nisn'];

// $querycekuser = mysqli_query($koneksi, "SELECT * from tb_siswa where nisn = '$nisn' and password = '$passwordlama'");

// $count = mysqli_num_rows($querycekuser);

    $updatequery = mysqli_query($koneksi, "update tb_siswa set password='$passwordbaru' where nisn = '$nisn'");

    if ($updatequery) {
        header("location:siswa_password.php?id_siswa=$id_siswa&pesan=berhasil");
    } else {
    header("location:siswa_password.php?id_siswa=$id_siswa&pesan=gagal");
    }
