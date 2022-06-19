<?php
// koneksi database
include '../../koneksi.php';


session_start();
if ($_SESSION['status']!="wali") {
    header("location:../index.php?pesan=belum_login");
} else {

$id_siswa = isset($_GET['id_siswa']) ? abs((int) $_GET['id_siswa']) : 0;
$nama_raport = isset($_GET['nama_raport']) ? abs((int) $_GET['nama_raport']) : 0;


unlink("../../raport/$nama_raport");

mysqli_query($koneksi, "UPDATE tb_siswa SET
            nama_raport=''
           where id_siswa='$id_siswa'
           ");


    header("location:raport_lihat.php?id_siswa=$id_siswa&pesan=reset_berhasil");
}
