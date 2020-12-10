<?php

require_once "../koneksi.php";

$passwordlama = md5($_POST['passwordlama']);
$passwordbaru = md5($_POST['passwordbaru']);
$konfirmasipassword = md5($_POST['konfirmasipassword']);
$username = $_POST['username'];

// echo $passwordlama;
// echo $passwordbaru;
// echo $konfirmasipassword;

$querycekuser = mysqli_query($koneksi, "SELECT * from tb_guru where username = '$username' and password = '$passwordlama'");

$count = mysqli_num_rows($querycekuser);

if ($count >= 1){
$updatequery = mysqli_query($koneksi, "update tb_guru set password='$passwordbaru' where username = '$username'");

    if($updatequery){
    echo "Password telah diganti menjadi $passwordbaru";
    }

}
