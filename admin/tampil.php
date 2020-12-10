<?php
  session_start();
  if ($_SESSION['status']!="admin") {
      header("location:../login.php?pesan=belum_login");
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
          <h3 style="margin-top:  25px;"><b>Halaman Program Raport Wali Kelas</b></h3>
        </center>
        <center>
          <h4><b>SMKN 1 KRAGILAN</b></h4>
        </center>
        <center>
          <h5><b>TAHUN PELAJARAN 2020/2021</b></h5>
        </center>
        <br>
        <!-- font ganti jenis -->
      </div>

    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Cari Nama Siswa :</label>
      <div class="col-sm-3">
        <input type='text' class="form-control" id='input' onkeyup='searchTable()'>
      </div>


    </div>

    <table class="table table-bordered table-hover" id="domainsTable">
      <thead>
        <tr>
          <th>
            <center>No
          </th>
          <th>
            <center>NISN Siswa
          </th>
          <th>
            <center>Nama Siswa
          </th>
          <th>
            <center>Kelas
          </th>
          <th>
            <center>Kondisi Raport
          </th>
          <th>
            <center>View Raport
          </th>
          <th>
            <center>Edit
          </th>
          <th>
            <center>Hapus
          </th>

        </tr>
      </thead>
        <?php
      include '../../koneksi.php';
      $no=1;
      $kode_kelas = $_GET['kode_kelas'] ;
      $data = mysqli_query($koneksi, "SELECT
      id,
      nisn,
      nama_siswa,
      kelas,
      kode_kelas,
      nama_raport,
      status
      from login where kode_kelas='$kode_kelas'");
    while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
          <td>
            <center><?php echo $no++ ?>
          </td>
          <td>
            <center><?php echo $d['nisn']; ?>
          </td>
          <td>
            <?php echo $d['nama_siswa']; ?>
          </td>
          <td>
            <center><?php echo $d['kelas']; ?>
          </td>
          <td>
            <center><?php echo $d['nama_raport']; ?>
          </td>
          <td>
            <center>
            <a type="button" class="btn btn-primary btn-sm" href="raport_lihat.php?id=<?php echo $d['id'] ?>" >View</a>
          </td>
          <td>
            <center>
            <a type="button" class="btn btn-info btn-sm" href="siswa_edit.php?id=<?php echo $d['id'] ?>" >Edit</a>
          </td>
          <td>
            <center>
            <a type="button" class="btn btn-warning btn-sm" href="siswa_hapus.php?id=<?php echo $d['id']; ?>&kode_kelas=<?php echo $d['kode_kelas'] ?>"
              onclick="return confirm('Anda yakin Hapus data siswa <?php echo $d['nama_siswa']; ?> ?')">Hapus</a>
          </td>
        </tr>

        <?php
    } ?>
    </table>
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
