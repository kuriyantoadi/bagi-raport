<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
session_start();
if ($_SESSION['status']!="admin") {
    header("location:../login.php?pesan=belum_login");
} else {
    $id = $_GET['id'];
    $kode_kelas = $_GET['kode_kelas'];
    // menghapus data dari database
    mysqli_query($koneksi, "delete from tb_siswa where id='$id' ");

    // mengalihkan halaman kembali ke index.php
    header("location:siswa_daftar.php?kode_kelas=$kode_kelas");
}
