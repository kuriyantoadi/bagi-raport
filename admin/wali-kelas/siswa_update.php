<?php
session_start();
if ($_SESSION['status']!="wali") {
    header("location:../../index.php?pesan=belum_login");
}


include '../../koneksi.php';

$id = $_POST['id'];
$nisn = $_POST['nisn'];
$nama_siswa = $_POST['nama_siswa'];
$kode_kelas = $_POST['kode_kelas'];


mysqli_query($koneksi, "UPDATE login SET
             nama_siswa='$nama_siswa',
             nisn='$nisn',
             kode_kelas='$kode_kelas'
             where id='$id'
             ");

// node_id=<?php echo $d['node_id'];
header("location:tampil.php?kode_kelas=$kode_kelas");
