<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
session_start();
if ($_SESSION['status']!="admin") {
    header("location:login.php?pesan=belum_login");
} 
    $id_guru = $_GET['id_guru'];
    // menghapus data dari database
    $cek_hapus = mysqli_query($koneksi, "delete from tb_guru where id_guru='$id_guru' ");

    // mengalihkan halaman kembali ke index.php
    if($cek_hapus) {
      header("location:guru.php?pesan=hapus-berhasil");
    }else{
        header("location:guru.php?pesan=hapus-gagal");
    }


