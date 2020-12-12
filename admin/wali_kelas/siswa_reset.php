<?php include('header.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h3 style="margin-top:  25px;"><b>Ganti Password Siswa</b></h3>
            </center>
            <br>
            <!-- font ganti jenis -->
        </div>

    </div>

    <?php

    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "reset-berhasil") {
            echo "
              <div class='alert alert-info ' role='alert'>
                <center>Ganti Password Siswa <b> Berhasil </b></div>";
        } elseif ($_GET['pesan'] == "reset-gagal") {
            echo "
              <div class='alert alert-danger' role='alert'>
                <center>Ganti Password Siswa <b> Gagal </b>
              </div>";
        }
    }

    include('../../koneksi.php');
    $id_siswa = $_GET['id_siswa'];
    $data = mysqli_query($koneksi, "SELECT * FROM tb_siswa, tb_kelas WHERE id_siswa='$id_siswa' AND tb_siswa.kode_kelas=tb_kelas.kode_kelas ");

    while ($d = mysqli_fetch_array($data)) {

    ?>

        <form class="" action="siswa_reset_update.php" method="post">

            <table class="table table-bordered">

                <tr>
                    <td>Nama Siswa</td>
                    <td>
                        <input type="hidden" name="id_siswa" value="<?php echo $d['id_siswa'] ?>">
                        <input type="text" class="form-control" name="nama_Siswa" value="<?php echo $d['nama_siswa'] ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Username Siswa</td>
                    <td>
                        <input type="text" class="form-control" name="nisn" value="<?php echo $d['nisn'] ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>
                        <input type="text" class="form-control" name="kode_kelas" value="<?php echo $d['nama_kelas'] ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Password Baru</td>
                    <td>
                        <input type="text" class="form-control" name="passwordbaru" value="" required>
                    </td>
                </tr>
                <tr>
                    <td>Password Konfirmasi Password</td>
                    <td>
                        <input type="text" class="form-control" name="konfirmasipassword" value="" required>
                    </td>
                </tr>
            </table>


        <?php } ?>
        <center><input type="submit" class="btn btn-info btn" name="" value="simpan"></center>
        </form>

</div>

</body>

</html>