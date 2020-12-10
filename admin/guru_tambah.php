<?php include('header.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h3 style="margin-top:  25px;"><b>Tambah Guru</b></h3>
            </center>
            <br>
            <!-- font ganti jenis -->
        </div>

    </div>

    <?php
    include('../koneksi.php');
    ?>

    <form class="" action="guru_tambah_update.php" method="post">

        <table class="table table-bordered">
            <tr>
                <td>
                    Username Guru 
                </td>
                <td>
                    <input type="text" class="form-control" name="username" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Password 
                </td>
                <td>
                    <input type="text" class="form-control" name="password" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Nama Guru 
                </td>
                <td>
                    <input type="text" class="form-control" name="nama_guru" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Wali Kelas 
                </td>
                <td>
                    <select class="form-control" name="kode_kelas" required>
                        <option value=""> Pilih Kelas</option>
                        <?php
                        $data = mysqli_query($koneksi, "select * from tb_kelas");
                        while ($d1 = mysqli_fetch_array($data)) {
                        ?>
                            <option value="<?php echo $d1['kode_kelas'] ?>"><?php echo $d1['nama_kelas'] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
        </table>



        <center>
            <input type="submit" class="btn btn-info btn" name="" value="simpan">
        </center>
    </form>

</div>


</body>

</html>