<?php
session_start();
if ($_SESSION['status']!="admin") {
    header("location:../login/.php?pesan=belum_login");
}

include '../koneksi.php';
$id_siswa = $_POST['id_siswa'];
$nisn = $_POST['nisn'];
$kode_kelas = $_POST['kode_kelas'];

// pdf_raport
if ($_POST['upload']) {
    $ekstensi_diperbolehkan = array('pdf');
    $waktu = date('d-m-Y');
    $pdf_raport_up = "pdf_raport";
    $pdf_raport = $_FILES['pdf_raport']['name'];
    $x = explode('.', $pdf_raport);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['pdf_raport']['size'];
    $file_tmp = $_FILES['pdf_raport']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1500000) {
            move_uploaded_file($file_tmp, '../raport/'.$kode_kelas.'-'.$nisn.'.pdf');
        } else {
            echo 'pdf_raport';
            echo 'UKURAN FILE TERLALU BESAR';
            exit;
        }
    } else {
        echo 'File SKHUN tidak pdf';
        echo "<br>";
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
        // header("location:gagal-upload.php");
        exit;
    }
}

// UPDATE `upload` SET `id_file`=[value-1],`nama_file`=[value-2] WHERE 1

mysqli_query($koneksi, "UPDATE tb_siswa SET
             nama_raport='$kode_kelas-$nisn.pdf'
             where nisn='$nisn'
             ");


// node_id=<?php echo $d['node_id'];
 header("location:raport_lihat.php?id_siswa=$id_siswa");
