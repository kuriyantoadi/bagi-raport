<?php include('header.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h3 style="margin-top:  25px;"><b>Ganti Password Wali Kelas</b></h3>
            </center>
            <br>
            <!-- font ganti jenis -->
        </div>

    </div>

    <?php
    include('../koneksi.php');
    $id_siswa = $_GET['id_siswa'];
    $data = mysqli_query($koneksi, "SELECT * FROM tb_guru, tb_kelas WHERE id_siswa='$id_siswa' AND tb_guru.kode_kelas=tb_kelas.kode_kelas ");

    while ($d = mysqli_fetch_array($data)) {

    ?>

        <form class="" action="guru_reset_update.php" method="post">

            <table class="table table-bordered">

                <tr>
                    <td>Nama Guru</td>
                    <td>
                        <input type="hidden" name="id_siswa" value="<?php echo $d['id_siswa'] ?>">
                        <input type="text" class="form-control" name="nama_guru" value="<?php echo $d['nama_guru'] ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Username Guru</td>
                    <td>
                        <input type="text" class="form-control" name="username" value="<?php echo $d['username'] ?>" readonly>
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