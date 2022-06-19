<?php
// koneksi database
include '../../koneksi.php';

// menangkap data id yang di kirim dari url
session_start();
if ($_SESSION['status'] != "wali" && $_SESSION['status'] != "admin") { 
    header("location:login.php?pesan=belum_login");

} else {
    $id_siswa = $_GET['id_siswa'];
    $id_kelas = $_GET['id_kelas'];
    // menghapus data dari database
    mysqli_query($koneksi, "delete from tb_siswa where id_siswa='$id_siswa' ");

    // mengalihkan halaman kembali ke index.php
    header("location:index.php");
}
