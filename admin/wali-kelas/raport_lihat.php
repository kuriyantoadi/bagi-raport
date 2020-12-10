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
    $data = mysqli_query($koneksi, "select * from login where id='$id' ");
    while ($d = mysqli_fetch_array($data)) {

    ?>

<form class="" action="raport_update.php" method="post" enctype="multipart/form-data">

  <table class="table table-bordered">
    <tr>
      <td>NISN Siswa</td>
      <input type="hidden" name="nisn" value="<?php echo $d['nisn'] ?>">
      <input type="hidden" name="kode_kelas" value="<?php echo $d['kode_kelas'] ?>">
      <td><?php echo $d['nisn'] ?></td>
    </tr>
    <tr>
      <td>Nama Siswa</td>
      <td><?php echo $d['nama_siswa'] ?></td>
    </tr>
    <tr>
      <td>Kelas Siswa</td>
      <td><?php echo $d['kode_kelas'] ?></td>
    </tr>
    <tr>
      <td>Upload Raport</td>
      <td>
        <input type="file" name="pdf_raport" accept="application/pdf" class="form-control-file" id="raport" required>
      </td>
    </tr>
    <tr>
      <td>Status Raport</td>
      <td><?php echo $d['nama_raport'] ?></td>
    </tr>
    <tr>
      <td>Raport</td>
      <td>
        <embed src="../../raport/kelas-xi/<?php echo $d['nama_raport']; ?>" type="application/pdf" width="100%" height="500px">
      </td>
    </tr>
  </table>

  <?php } ?>
  <center>
    <input style="margin-bottom: 50px" type="submit" class="btn btn-info btn"  name="upload" value="upload">
  </center>
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
