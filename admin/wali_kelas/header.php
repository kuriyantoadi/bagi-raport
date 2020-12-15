<?php
ob_start();
session_start();
if ($_SESSION['status'] != "wali") {
    header("location:../login.php?pesan=belum_login");
} 

?>

<?php 

$username = $_SESSION['username'];
include('../../koneksi.php');
$data = mysqli_query($koneksi, "select * from tb_guru where username='$username' ");
while ($d = mysqli_fetch_array($data)) {
    $kode_kelas = $d['kode_kelas'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Program Raport Wali Kelas </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='#' rel='shortcut icon' type='image/x-icon' />

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/jquery-latest.js"></script>
    <!-- <script type="text/javascript" src="../js/jquery.tablesorter.min.js"></script> -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Program Raport ( <?php echo $kode_kelas  ?> )</a>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        </div>

        <span class="navbar-text">
            <a href="../logout.php">Logout</a>
        </span>
    </nav>