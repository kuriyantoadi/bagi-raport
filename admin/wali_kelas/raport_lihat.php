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
  include('../../koneksi.php');
  $id_siswa = $_GET['id_siswa'];
  $data = mysqli_query($koneksi, "select * from tb_siswa where id_siswa='$id_siswa' ");
  while ($d = mysqli_fetch_array($data)) {

  ?>

    <a href='../../raport/<?php echo $d['nama_raport']; ?>' class='btn mb-4 btn-info btn-sm'>Download Raport</a>

    <form class="" action="raport_update.php" method="post" enctype="multipart/form-data">

      <table class="table table-bordered">
        <tr>
          <td>NISN Siswa</td>
          <input type="hidden" name="id_siswa" value="<?php echo $d['id_siswa'] ?>">
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
            <?php
            if (empty($d['nama_raport'])) {
              echo "Maaf, Raport Belum Di input";
            ?>
            <?php } else { ?>
              <embed src="../../raport/<?php echo $d['nama_raport']; ?>" type="application/pdf" width="100%" height="500px">
            <?php } ?>
          </td>
        </tr>
      </table>

    <?php } ?>
    <center>
      <input style="margin-bottom: 50px" type="submit" class="btn btn-info btn" name="upload" value="upload">
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