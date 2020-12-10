<?php include('header.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h3 style="margin-top:  25px;"><b>Tambah Siswa</b></h3>
            </center>
            <br>
            <!-- font ganti jenis -->
        </div>

    </div>

    <?php
    include('../../koneksi.php');
    ?>

    <form class="" action="siswa_tambah_update.php" method="post">

        <table class="table table-bordered">
            <tr>
                <td>
                    NISN Siswa :
                </td>
                <td>
                    <input type="number" class="form-control" name="nisn" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Nama Siswa :
                </td>
                <td>
                    <input type="text" class="form-control" name="nama_siswa" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Password :
                </td>
                <td>
                    <input type="text" class="form-control" name="password" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Kelas :
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