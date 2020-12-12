<?php include('header.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h3 style="margin-top:  25px;"><b>Edit Wali Kelas</b></h3>
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
                            <center>Edit Data Guru <b>Berhasil</b>
                        </div>";
        } elseif ($_GET['pesan'] == "gagal") {
            echo "
						<div class='alert alert-warning' role='alert'>
							<center>Maaf, Edit Data Guru <b>Gagal</b>
						</div>
                        ";
        }
    }

    include('../koneksi.php');
    $id_guru = $_GET['id_guru'];
    $data = mysqli_query($koneksi, "SELECT * FROM tb_guru, tb_kelas WHERE id_guru='$id_guru' AND tb_guru.kode_kelas=tb_kelas.kode_kelas ");

    while ($d = mysqli_fetch_array($data)) {

    ?>

        <form class="" action="guru_update.php" method="post">

            <table class="table table-bordered">

                <tr>
                    <td>Nama Guru</td>
                    <td>
                        <input type="hidden" name="id_guru" value="<?php echo $d['id_guru'] ?>">
                        <input type="text" class="form-control" name="nama_guru" value="<?php echo $d['nama_guru'] ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Username Guru</td>
                    <td>
                        <input type="text" class="form-control" name="username" value="<?php echo $d['username'] ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="text" class="form-control" name="password" value="<?php echo $d['password'] ?>" readonly>
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
        <center>
            <input type="submit" class="btn btn-info btn" name="" value="simpan">
            <a href="guru_reset.php?id_guru=<?php echo $id_guru ?>" class='btn btn-danger'>Ganti Password </a>
        </center>
        </form>

</div>

</body>

</html>