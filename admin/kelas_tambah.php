<?php include('header.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h3 style="margin-top:  25px;"><b>Tambah Kelas</b></h3>
            </center>
            <br>
            <!-- font ganti jenis -->
        </div>

    </div>

    <?php
    include('../koneksi.php');
    ?>

    <form class="" action="kelas_tambah_update.php" method="post">

        <table class="table table-bordered">
            <tr>
                <td>
                    Kode Kelas
                </td>
                <td>
                    <input type="text" class="form-control" name="kode_kelas" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Nama Kelas
                </td>
                <td>
                    <input type="text" class="form-control" name="nama_kelas" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Tingkat
                </td>
                <td>
                    <select class="form-control" name="tingkat" required>
                        <option value=""> Pilih Kelas</option>
                        <option value="10"> Tingkat 10</option>
                        <option value="11"> Tingkat 11</option>
                        <option value="12"> Tingkat 12</option>
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