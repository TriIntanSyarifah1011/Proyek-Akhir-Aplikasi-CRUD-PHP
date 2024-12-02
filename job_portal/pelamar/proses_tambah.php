<?php

session_start(); // Mulai sesi
// Menghubungkan file 
include("../koneksi.php");

// Mengeceek apakah tombol simpan ditrkan
if(isset($_POST['simpan'])){
    /* Mengambil nilai dari form input
    dan menyimpannya ke dalam variabel */
    $nama_pelamar = $_POST['nama_pelamar'];
    $email = $_POST['email'];

     /* Menyusun query SQL untuk menambahkan data ke tabel pelamar */
    $sql = "INSERT INTO pelamar
    (nama_pelamar, email)
    VALUES ('$nama_pelamar','$email')";

    // menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    // Simpan pesan di sesi
    if ($query) {
        $_SESSION['notifikasi'] = "Data pelamar berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data pelamar gagal ditambahkan!";
    }
    header('Location: index.php');
} else {
    die("Akses dtiolak...");
}
?>