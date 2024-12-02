<?php
session_start();
include("../koneksi.php");

// Mengecek apakah tombol simpan pada edit pekerjaan sudah ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari edit pekerjaan
    $pelamar_id = $_POST['pelamar_id']; // Menyimpan ID pelamar yang diupdate
    $nama_pelamar = $_POST['nama_pelamar']; // Menyimpan nama pelamar yang diupdate
    $email = $_POST['email']; // // Menyimpan email yang diupdate

    // Query untuk memperbarui data siswa
    $sql = "UPDATE pelamar SET 
                nama_pelamar = '$nama_pelamar', 
                email = '$email' 
            WHERE pelamar_id = '$pelamar_id'";

    // Menjalankan query SQL yang telah dibuat di atas pada database
    $query = mysqli_query($db, $sql);

    if ($query) {
        $_SESSION['notifikasi'] = "Data pelamar berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data pelamar gagal diperbarui!";
    }

    header('Location: index.php');
} else {
    die("Akses ditolak...");
}
?>