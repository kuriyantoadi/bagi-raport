<?php include('header.php') ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <center>
        <h3 style="margin-top:  25px;"><b>Edit Kelas</b></h3>
      </center>
      <br>
      <!-- font ganti jenis -->
    </div>

  </div>

  <?php
  include('../koneksi.php');
  $id_kelas = $_GET['id_kelas'];
  $data = mysqli_query($koneksi, "select * from tb_kelas where id_kelas='$id_kelas'");
  while ($d = mysqli_fetch_array($data)) {

  ?>

    <form class="" action="kelas_update.php" method="post">

      <table class="table table-bordered">
        <tr>
          <td>Nama Kelas</td>
          <td>
            <input type="hidden" class="form-control" name="id_kelas" value="<?php echo $d['id_kelas'] ?>">
            <input type="text" class="form-control" name="nama_kelas" value="<?php echo $d['nama_kelas'] ?>">
          </td>
        </tr>
        <tr>
          <td>Kode Kelas</td>
          <td>
            <input type="text" class="form-control" name="kode_kelas" value="<?php echo $d['kode_kelas'] ?>">
          </td>
        </tr>
        <tr>
          <td>
            Tingkat
          </td>
          <td>
            <select class="form-control" name="tingkat">
              <option value="<?php echo $d['tingkat'] ?>"> <?php echo $d['tingkat'] ?> Pilihan Awal</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </td>
        </tr>
      </table>

    <?php } ?>
    <center>
      <input type="submit" class="btn btn-info" name="" value="simpan">
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