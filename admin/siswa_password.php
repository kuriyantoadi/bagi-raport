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
        if ($_GET['pesan'] == "berhasil") {
            echo "
						<div class='alert alert-info alert-dismissible fade show' role='alert'>
                            <center>Password Berhasil Diganti
                        </div>";
        } elseif ($_GET['pesan'] == "gagal") {
            echo "
						<div class='alert alert-warning' role='alert'>
							<center>Maaf, Password Gagal diganti
						</div>
						";
        } elseif ($_GET['pesan'] == "belum_login") {
            echo "
						<div class='alert alert-danger' role='alert'>
							<center>Maaf anda harus login dulu
						</div>";
        }
    }
    ?>

    <?php
    include('../koneksi.php');
    $id_siswa = $_GET['id_siswa'];
    $data = mysqli_query($koneksi, "SELECT * FROM tb_siswa, tb_kelas WHERE id_siswa='$id_siswa' AND tb_siswa.kode_kelas=tb_kelas.kode_kelas ");

    while ($d = mysqli_fetch_array($data)) {

    ?>

        <form class="" action="siswa_password_update.php" method="post">

            <table class="table table-bordered">

                <tr>
                    <td>Nama Siswa</td>
                    <td>
                        <input type="hidden" name="id_siswa" value="<?php echo $d['id_siswa'] ?>">
                        <input type="text" class="form-control" name="nama_siswa" value="<?php echo $d['nama_siswa'] ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>NISN Siswa</td>
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