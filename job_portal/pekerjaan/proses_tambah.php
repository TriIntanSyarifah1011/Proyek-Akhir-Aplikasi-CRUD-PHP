<?php

session_start(); // Mulai sesi
// Menghubungkan file 
include("../koneksi.php");

// Mengeceek apakah tombol simpan ditekan
if(isset($_POST['simpan'])){
    /* Mengambil nilai dari form input
    dan menyimpannya ke dalam variabel */
    $nama_pekerjaan = $_POST['nama_pekerjaan'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat = $_POST['alamat'];

    /* Menyusun query SQL untuk menambahkan data ke tabel pekerjaan */
    $sql = "INSERT INTO pekerjaan
    (nama_pekerjaan, nama_perusahaan, alamat)
    VALUES ('$nama_pekerjaan','$nama_perusahaan','$alamat')";

    // menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    // Simpan pesan di sesi
    if ($query) {
        $_SESSION['notifikasi'] = "Data pekerjaan berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data pekerjaan gagal ditambahkan!";
    }
    header('Location: index.php');
} else {
    die("Akses dtiolak...");
}
?>