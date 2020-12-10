<?php
  session_start();
  if ($_SESSION['status']!="tkr1") {
      header("location:../../index.php?pesan=belum_login");
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Hasil Kelulusan Kelas XII TKR </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/jquery-latest.js"></script>
  <script type="text/javascript" src="../js/jquery.tablesorter.min.js"></script>
</head>

<body>



  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <center>
          <h5 style="margin-top:  25px;"><b>PENGUMUMAN KELULUSAN KELAS XII</b></h5>
        </center>
        <center>
          <h5><b>SMKN 1 KRAGILAN</b></h5>
        </center>
        <center>
          <h5><b>TAHUN PELAJARAN 2019/2020</b></h5>
        </center>
        <center>
          <h5>Kompetensi Keahlian: Teknik Kendaraan Ringan (TKR)</h5>
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
            <center>Status
          </th>

        </tr>
      </thead>
      <tbody>
        <?php
      include '../koneksi.php';
      $no=1;
    $data = mysqli_query($koneksi, "SELECT
      nisn,
      nama,
      kelas,
      status
      from siswa where kelas='XII TKR 1' ORDER BY kelas ASC");
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
            <?php echo $d['nama']; ?>
          </td>
          <td>
            <center><?php echo $d['kelas']; ?>
          </td>
          <td>
            <center><?php echo $d['status']; ?>
          </td>
        </tr>

        <?php
    } ?>
      </tbody>
    </table>
  </div>
  <script>
    // $(document).ready(function() {
    //   $("#domainsTable").tablesorter({
    //     sortList: [
    //       [3, 1],
    //       [2, 0]
    //     ]
    //   });
    // });

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
