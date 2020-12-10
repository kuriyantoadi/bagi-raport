<?php include('header.php') ?>

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
  include('../koneksi.php');
  $id = $_GET['id'];
  $data = mysqli_query($koneksi, "SELECT * FROM tb_siswa, tb_kelas WHERE tb_siswa.id='$id' AND tb_siswa.kode_kelas=tb_kelas.kode_kelas ");

  while ($d = mysqli_fetch_array($data)) {

  ?>

    <form class="" action="siswa_update.php" method="post">

      <table class="table table-bordered">

        <tr>
          <td>NISN Siswa</td>
          <td>
            <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
            <input type="text" class="form-control" name="nisn" value="<?php echo $d['nisn'] ?>" required>
          </td>
        </tr>
        <tr>
          <td>Nama Siswa</td>
          <td>
            <input type="text" class="form-control" name="nama_siswa" value="<?php echo $d['nama_siswa'] ?>" required>
          </td>
        </tr>
        <tr>
          <td>Kelas</td>
          <td>
            <select class="form-control" name="kode_kelas" required>
              <option value="<?php echo $d['kode_kelas'] ?>"> <?php echo $d['nama_kelas'] ?> Pilihan Awal</option>
              <?php
              $data1 = mysqli_query($koneksi, "select * from tb_kelas");
              while ($d1 = mysqli_fetch_array($data1)) {
              ?>
                <option value="<?php echo $d1['kode_kelas'] ?>"><?php echo $d1['nama_kelas'] ?></option>
              <?php } ?>
            </select>
          </td>
        </tr>
      </table>


    <?php } ?>
    <center><input type="submit" class="btn btn-info btn" name="" value="simpan"></center>
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