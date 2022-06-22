<?php include 'header.php'; ?>

<div class="row">
  <div class="col-md-12">
    <center>
      <h5 style="margin-top:  25px;"><b>TAHUN PELAJARAN 2020/2021</b></h5>
    </center>
    <center>
      <h5><b>SMKN 1 KRAGILAN</b></h5>
    </center>
    <center>
      <h5><b>Download Raport</b></h5>
    </center>
    <br>
    <!-- font ganti jenis -->
  </div>
</div>

    <table class="table table-bordered table-hover" id="domainsTable">

      <?php
      include 'koneksi.php';
      // $nisn = $_GET['nisn'];
      $no = 1;
      $data = mysqli_query($koneksi, "SELECT * from tb_siswa, tb_kelas where nisn='$nisn' AND tb_siswa.id_kelas=tb_kelas.id_kelas ");
      while ($d = mysqli_fetch_array($data)) {
      ?>

        <tr>
          <td>NISN</td>
          <td>
            <?php echo $d['nisn']; ?>
          </td>
        </tr>

        <tr>
          <td>Nama Siswa</td>
          <td><?php echo $d['nama_siswa']; ?>
          </td>
        </tr>

        <tr>
          <td>Nama Kelas</td>
          <td>
            <?php echo $d['nama_kelas']; ?>
          </td>
        </tr>

        <tr>
          <td>Nama Raport</td>
          <td>
            <?php echo $d['nama_raport']; ?>
          </td>
        </tr>
        <tr>
          <td>Download Raport</td>
          <td>
            <?php
            if (empty($d['nama_raport'])) {
              echo "Maaf, Raport Belum Di input";
            ?>
            <?php } else { ?>
              <!-- <embed src="raport/<?php echo $d['nama_raport']; ?>" type="application/pdf" width="100%" height="500px"> -->
              <a href='raport/<?php echo $d['nama_raport']; ?>' class='btn btn-info'>Download Raport</a>
          </td>
        <?php } ?>
        </td>
        </tr>

      <?php } ?>

    </table>
    <center>
  </div>
</body>

</html>
