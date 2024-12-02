<?php
session_start();
include("../koneksi.php");
// Mengecek apakah tombol simpan pada edit pekerjaan sudah ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari edit pekerjaan
    $pekerjaan_id = $_POST['pekerjaan_id']; // Menyimpan ID pekerjaan yang diupdate
    $nama_pekerjaan = $_POST['nama_pekerjaan']; // Menyimpan nama pekerjaan yang diupdate
    $nama_perusahaan = $_POST['nama_perusahaan']; //  Menyimpan nama perusahaan yang diupdate
    $alamat = $_POST['alamat']; // // Menyimpan alamat pekerjaan yang diupdate

    // Query untuk memperbarui data siswa
    $sql = "UPDATE pekerjaan SET 
                nama_pekerjaan = '$nama_pekerjaan', 
                nama_perusahaan = '$nama_perusahaan', 
                alamat = '$alamat' 
            WHERE pekerjaan_id = '$pekerjaan_id'";

// Menjalankan query SQL yang telah dibuat di atas pada database
    $query = mysqli_query($db, $sql);

    if ($query) {
        $_SESSION['notifikasi'] = "Data pekerjaan berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data pekerjaan gagal diperbarui!";
    }

    header('Location: index.php');
} else {
    die("Akses ditolak...");
}
?>