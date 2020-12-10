<?php

require_once "../koneksi.php";

$passwordlama = md5($_POST['passwordlama']);
$passwordbaru = md5($_POST['passwordbaru']);
$konfirmasipassword = md5($_POST['konfirmasipassword']);
$nisn = $_POST['nisn'];

$querycekuser = mysqli_query($koneksi, "SELECT * from tb_siswa where nisn = '$nisn' and password = '$passwordlama'");

$count = mysqli_num_rows($querycekuser);

if ($count >= 1) {
    $updatequery = mysqli_query($koneksi, "update tb_siswa set password='$passwordbaru' where nisn = '$nisn'");

    if ($updatequery) {
        echo "Password telah diganti menjadi $passwordbaru";
    } else {
        echo "Ganti Password gagal, mungkin password anda salah";
    }
}
