<?php
  session_start();
  if ($_SESSION['status']!="wali") {
      header("location:../index.php?pesan=belum_login");
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Program Raport </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/jquery-latest.js"></script>
  <script type="text/javascript" src="../js/jquery.tablesorter.min.js"></script>
</head>

<body>

  <?php include('menu.php') ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <center>
          <h3 style="margin-top:  25px;"><b>Edit Siswa</b></h3>
        </center>
        <br>
        <!-- font ganti jenis -->
      </div>

    </div>

    <?php
    include('../../koneksi.php');
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "select * from login where id='$id'");
    while ($d = mysqli_fetch_array($data)) {

    ?>

<form class="" action="siswa_update.php" method="post">

  <div class="form-group">
    <div class="col-sm-6">
      <label class="control-label" for="email">NISN Siswa :</label>
      <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
      <input type="text" class="form-control" name="nisn" value="<?php echo $d['nisn'] ?>">
    </div>
  </div>

<div class="form-group">
  <div class="col-sm-6">
    <label class="control-label" for="email">Nama Siswa :</label>
    <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
    <input type="text" class="form-control" name="nama_siswa" value="<?php echo $d['nama_siswa'] ?>">
  </div>
</div>

<div class="form-group">
  <div class="col-sm-6">
    <label class="control-label" for="email">Kelas :</label>
    <select class="form-control" name="kode_kelas">
      <?php
      $data = mysqli_query($koneksi, "select * from kelas where tingkat='2'");
      while ($d1 = mysqli_fetch_array($data)) {
       ?>
      <option value="<?php echo $d1['kode_kelas'] ?>"><?php echo $d1['nama_kelas'] ?></option>
    <?php } ?>
    </select>


  </div>
</div>


  <?php } ?>
  <input type="submit" class="btn btn-info btn-sm" name="" value="simpan">
</form>

  </div>
  <script>


    function searchTable() {
      var input;
      var saring;
      var status;
      var tbody;
      var tr;
      var td;
      var i;
      var j;
      input = document.getElementById("input");
      saring = input.value.toUpperCase();
      tbody = document.getElementsByTagName("tbody")[0];;
      tr = tbody.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
          if (td[j].innerHTML.toUpperCase().indexOf(saring) > -1) {
            status = true;
          }
        }
        if (status) {
          tr[i].style.display = "";
          status = false;
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  </script>

</body>

</html>
