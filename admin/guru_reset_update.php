<?php

require_once "../koneksi.php";

$id_guru = $_POST['id_guru'];
$passwordbaru = md5($_POST['passwordbaru']);
$konfirmasipassword = md5($_POST['konfirmasipassword']);
$username = $_POST['username'];


    $updatequery = mysqli_query($koneksi, "update tb_guru set password='$passwordbaru' where username = '$username'");

    if ($updatequery) {
        header("location:guru_reset.php?pesan=ganti-berhasil&id_guru=$id_guru");
    }else{
        header("location:guru_reset.php?pesan=ganti-gagal&id_guru=$id_guru");
    }
