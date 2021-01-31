<?php include('header.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <center>
                <h2 style="margin-top:  25px;"><b>Daftar Guru</b></h2>
            </center>
        </div>

    </div>


    <div class="row mb-3">
        <div class="col-sm">
            <a href="guru_tambah.php" type="button" class="btn btn-info btn-sm"> Tambah Guru</a>
        </div>
        <div class="col-sm">
        </div>
        <div class="col-sm">
            Cari Kelas : <input type='text' class="form-control" id='input' onkeyup='searchTable()'>
        </div>
    </div>


    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "tambah-berhasil") {
            echo "
						<div class='alert alert-info ' role='alert'>
							<center>Data Guru Berhasil Ditambah</div>";
        } elseif ($_GET['pesan'] == "tambah-gagal") {
            echo "
						<div class='alert alert-danger' role='alert'>
							<center>Data Guru Gagal Ditambah
						</div>
                        ";
        } elseif ($_GET['pesan'] == "hapus-berhasil") {
            echo "
						<div class='alert alert-info' role='alert'>
							<center>Data Berhasil Dihapus
						</div>
						";
        } elseif ($_GET['pesan'] == "hapus-gagal") {
            echo "
						<div class='alert alert-danger' role='alert'>
							<center>Maaf, Proses Hapus Gagal
						</div>";
        }
    }
    ?>

    <table class="table table-bordered table-hover" id="domainsTable">
        <thead>
            <tr>
                <th>
                    <center>No
                </th>
                <th>
                    <center>Nama Wali Kelas
                </th>
                <th>
                    <center>Username
                </th>
                <th>
                    <center>Kelas
                </th>
                <th>
                    <center>Lihat Siswa
                </th>
                <th>
                    <center>Edit
                </th>
                <th>
                    <center>Hapus
                </th>

            </tr>
        </thead>
        <?php
        include '../koneksi.php';
        // $tingkat = $_GET['tingkat'];
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * from tb_guru, tb_kelas where tb_guru.kode_kelas=tb_kelas.kode_kelas");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td>
                    <center><?php echo $no++ ?>
                </td>
                <td>
                    <center><?php echo $d['nama_guru']; ?>
                </td>
                <td>
                    <center><?php echo $d['username']; ?>
                </td>
                <td>
                    <center><?php echo $d['nama_kelas']; ?>
                </td>
                <td>
                    <center>
                        <a type="button" class="btn btn-primary btn-sm" href="siswa.php?kode_kelas=<?php echo $d['kode_kelas'] ?>">Lihat Siswa</a>
                </td>
                <td>
                    <center>
                        <a type="button" class="btn btn-info btn-sm" href="guru_edit.php?id_guru=<?php echo $d['id_guru'] ?>">Edit</a>
                </td>
                <td>
                    <center>
                        <a type="button" class="btn btn-warning btn-sm" href="guru_hapus.php?id_guru=<?php echo $d['id_guru']; ?>" onclick="return confirm('Anda yakin Hapus data kelas <?php echo $d['nama_guru']; ?> ?')">Hapus</a>
                </td>
            </tr>

        <?php
        } ?>
    </table>
</div>

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