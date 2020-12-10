<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
session_start();
if ($_SESSION['status']!="admin") {
    header("location:../login.php?pesan=belum_login");
} else {
    $id_guru = $_GET['id_guru'];
    // menghapus data dari database
    mysqli_query($koneksi, "delete from tb_guru where id_guru='$id_guru' ");

    // mengalihkan halaman kembali ke index.php
    header("location:guru.php");
}
