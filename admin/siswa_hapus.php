<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
session_start();
if ($_SESSION['status'] != "wali" && $_SESSION['status'] != "admin") { 
    header("location:login.php?pesan=belum_login");

} else {
    $id_siswa = $_GET['id_siswa'];
    $kode_kelas = $_GET['kode_kelas'];
    // menghapus data dari database
    $cek_hapus = mysqli_query($koneksi, "delete from tb_siswa where id_siswa='$id_siswa' ");

    // mengalihkan halaman kembali ke index.php
    if ($cek_hapus) {
        header("location:siswa_daftar.php?pesan=hapus-berhasil&kode_kelas=$kode_kelas");
    } else {
        header("location:siswa_daftar.php?pesan=hapus-gagal&kode_kelas=$kode_kelas");
    }
    
}
