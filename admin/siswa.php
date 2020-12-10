<?php include('header.php') ?>

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
          <center>View
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
    include '../koneksi.php';
    $no = 1;
    $kode_kelas = $_GET['kode_kelas'];
    $data = mysqli_query($koneksi, "SELECT * from tb_siswa, tb_kelas WHERE tb_siswa.kode_kelas='$kode_kelas' AND tb_siswa.kode_kelas=tb_kelas.kode_kelas");
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
          <center><?php echo $d['nama_kelas']; ?>
        </td>
        <td>
          <center><?php echo $d['nama_raport']; ?>
        </td>
        <td>
          <center>
            <a type="button" class="btn btn-primary btn-sm" href="raport_lihat.php?id=<?php echo $d['id'] ?>">View</a>
        </td>
        <td>
          <center>
            <a type="button" class="btn btn-info btn-sm" href="siswa_edit.php?id=<?php echo $d['id'] ?>">Edit</a>
        </td>
        <td>
          <center>
            <a type="button" class="btn btn-warning btn-sm" href="siswa_hapus.php?id=<?php echo $d['id']; ?>&kode_kelas=<?php echo $d['kode_kelas'] ?>" onclick="return confirm('Anda yakin Hapus data siswa <?php echo $d['nama_siswa']; ?> ?')">Hapus</a>
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