<?php

require_once "../../koneksi.php";

// $passwordlama = md5($_POST['passwordlama']);
$passwordbaru = md5($_POST['passwordbaru']);
$konfirmasipassword = md5($_POST['konfirmasipassword']);
$nisn = $_POST['nisn'];

// echo $passwordlama;
// echo $passwordbaru;
// echo $konfirmasipassword;

    $updatequery = mysqli_query($koneksi, "update tb_siswa set password='$passwordbaru' where nisn = '$nisn'");

    if ($updatequery) {
        echo "Password telah diganti menjadi $passwordbaru";
    }
