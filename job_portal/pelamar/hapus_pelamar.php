<?php
session_start(); // Mulai sesi
include("../koneksi.php");

// Mengecek apakah ada ID yang dikirim melalui URL
if (isset($_GET['pelamar_id'])) {

    // Ambil ID dari URL
    $id = $_GET['pelamar_id'];

    // Buat query untuk menghapus data pekerjaan berdasarkan ID
    $sql = "DELETE FROM pelamar WHERE pelamar_id=$id";
    // Mengeksekusi query penghapusan dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    // Mengecek apakah query berhasil dijalankan
    if ($query) {
        $_SESSION['notifikasi'] = "Data pelamar berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Data pelamar gagal dihapus!";
    }

    header('Location: index.php');
} else {
    die("Akses ditolak...");
}
?>