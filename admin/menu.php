<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../index.php">Program Raport</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">


      <?php include('../menu-angkatan.php'); ?>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          kelas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <?php
          include('../../koneksi.php');
          $data = mysqli_query($koneksi, "SELECT * from kelas where tingkat='2' ");
          while ($d = mysqli_fetch_array($data)) {
           ?>
          <a class="dropdown-item" href="tampil.php?kode_kelas=<?php echo $d['kode_kelas'] ?>"> <?php echo $d['nama_kelas'] ?> </a>
        <?php } ?>
        </div>
      </li>
    </ul>
  </div>

  <span class="navbar-text">
    <a href="../logout.php">Logout</a>
  </span>
</nav>
