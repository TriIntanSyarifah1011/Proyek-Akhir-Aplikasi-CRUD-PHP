<?php
session_start(); // Mulai sesi
include("../koneksi.php");

// Mengecek apakah ada ID yang dikirim melalui URL
if (isset($_GET['pekerjaan_id'])) {

       // Ambil ID dari URL
    $id = $_GET['pekerjaan_id'];

    // Buat query untuk menghapus data pekerjaan berdasarkan ID
    $sql = "DELETE FROM pekerjaan WHERE pekerjaan_id=$id";
    // Mengeksekusi query penghapusan dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    // Mengecek apakah query berhasil dijalankan
    if ($query) {
        $_SESSION['notifikasi'] = "Data pekerjaan berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Data pekerjaan gagal dihapus!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    die("Akses ditolak...");
}
?>