<?php
// Menentukan nama host
$server = "localhost";
// Nama pengguna mysql
$user = "root";
// kata sandi pengguna mysql
$password = "";
// Nama basis data yang akan dihubungkan
$nama_database = "job_portal";

// Mencoba membuat koneksi ke basis data
$db = mysqli_connect($server, $user, $password, $nama_database);

// Periksa apakah koneksi berhasil
if (!$db) {
    die("Gagal terhubung dengan database: ". mysqli_connect_error());
}
?>