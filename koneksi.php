<?php
$koneksi = mysqli_connect("localhost", "root", "", "bagi-raport2022");

// Check connection
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
