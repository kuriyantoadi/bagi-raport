<?php
echo "salah php";
// mengaktifkan session php
ob_start();

session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
// belum mengunakan MD5
$nisn = addslashes(trim($_POST['nisn']));
// $nisn = $_POST['nisn'];
// $password = md5($_POST['password']);

// menyeleksi data admin dengan nisn dan password yang sesuai
// $data = mysqli_query($koneksi, "select * from login where nisn='$nisn' and password='$password'");
$data = mysqli_query($koneksi, "select * from login where nisn='$nisn' ");


// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

echo "cek2";

if ($cek > 0) {
    $login = mysqli_fetch_assoc($data);

    if ($login['status']=="LULUS") {
        $_SESSION['nisn'] = $nisn;
        $_SESSION['status'] = "LULUS";
        echo "cek";
        // header("location:tampil-siswa.php?nisn=$nisn");
    } else {
        echo "salah1";
        header("location:index.php?pesan=gagal1");
    }
} else {
    echo "salah2";
    header("location:index.php?pesan=gagal");
}
