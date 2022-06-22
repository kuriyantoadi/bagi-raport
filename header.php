<?php
session_start();
$nisn = $_SESSION['nisn'];
if ($_SESSION['status'] != "AKTIF") {
  header("location:index.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tampil dan Download Raport </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery-latest.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

    <a class="navbar-brand" href="">Program Raport</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="tampil-siswa.php">Download Raport</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="siswa_reset.php">Password</a>
        </li>

      </ul>
    </div>

    <span class="navbar-text">
      <a href="logout.php">Logout</a>
    </span>
  </div>

  </nav>

  <div class="container">
