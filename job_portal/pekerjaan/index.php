<?php
// Menghubungkan file dengan index
include ("../koneksi.php"); // Menghubungkan ke file koneksi.php untuk melakukan koneksi ke database
session_start(); // Mulai sesi php untuk menggunakan variavel sesi ($_SESSION)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal Pekerjaan</title>
    <style>
        /* Membuat styling pada tabel */
        /* Mengatur style untuk tabel, th, dan td agar memiliki border dan padding */
        table, th, td {
            /* untuk menambahkan garis tepi */
            border: 1px solid black;  
            border-collapse: collapse;
            /* memberikan ruang di dalam elemen, antara konten dan batas  */
            padding: 10px;
        }
    </style>
</head>
<body>
<ul>
    <!-- Tautan untuk mengakses ke data pekerjaan -->
        <li><a href="../pekerjaan/index.php">Data Pekerjaan</a></li>
         <!-- Tautan untuk mengakses ke data pelamar -->
        <li><a href="../pelamar/index.php">Data Pelamar</a></li>
    </ul>
    <h2>Data Pekerjaan</h2>
    <!-- Menampilkan notifikasi jika ada notifikasi -->
    <?php if (isset($_SESSION['notifikasi'])): ?>
         <!-- Menampilkan pesan notifikasi yang disimpan di sesi -->
        <p><?php echo $_SESSION['notifikasi']; ?></p>
        <!-- hapus notifikasi setelah ditampilkan -->
        <?php unset($_SESSION['notifikasi']); ?>
        <?php endif; ?>
<!-- $_SESSION[]: Menyimpan dan mengambil data dalam sesi. -->

        <!-- Tabel menampilkan data pekerjaan -->
        <table>
        <thead>
        <tr align="center">
        <th>#</th>
        <th>Nama Pekerjaan</th>
        <th>Nama Perusahaan</th>
        <th>Alamat</th>
        <th><a href="tambah_pekerjaan.php">Tambah Data</a></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1; // Membuat penomoran
        // Membuat variabel untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM pekerjaan");
        /* perulangan while akan terus berjalan (menampilkan data)
        selama kondisi $query bernilai true */
        while ($pekerjaan = $query->fetch_assoc()) {
            /* Fungsi fetch_assoc untuk mengambil data perulangan dalam bentuk array*/
            ?>
        

    <tr>
        <!-- echo untuk menampilkan output ke layar browser -->
        <td><?php echo $no++ ?></td>
        <td><?php echo $pekerjaan['nama_pekerjaan'] ?></td>
        <td><?php echo $pekerjaan['nama_perusahaan'] ?></td>
        <td><?php echo $pekerjaan['alamat'] ?></td>
        <!-- meratakan teks -->
        <td align="center">
            <!-- URL ke halaman edit_pekerjaan dengan menggunakan 
             parameter id pada kolom tabel -->
             <a href="edit_pekerjaan.php?pekerjaan_id=<?php echo $pekerjaan['pekerjaan_id'] ?>">Edit</a>

             <!-- URL untuk menghapus data dengan menggunakan parameter id pada kolom table dan konfirmasi hapus data-->
               <a onclick="return confirm('Anda yakin ingin menghapus data?')" 
       href="hapus_pekerjaan.php?pekerjaan_id=<?php echo $pekerjaan['pekerjaan_id'] ?>">Hapus</a>
        </td>   
        </tr>
        <?php
        } /* mengakhiri perulangan while */ 
        ?>
        </tbody>

        </table>

        <!-- Menghitung jumlah baris pekerjaan yang ada di tabel -->
        <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>
