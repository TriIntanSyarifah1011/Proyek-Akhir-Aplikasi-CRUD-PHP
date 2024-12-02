    <?php
    // Menghubungkan file dengan koneksi php
    include ("../koneksi.php");
    session_start(); // Mulai sesi php untuk menggunakan variavel sesi ($_SESSION)
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Job Portal Pelamar</title>
        <style>
            /* Membuat styling pada tabel */
            /* Mengatur style untuk tabel, th, dan td agar memiliki border dan padding */
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                /* memberikan ruang di dalam elemen, antara konten dan batas  */
                padding: 10px;
            }
        </style>
    </head>
    <body>
    <ul>
            <li><a href="../pekerjaan/index.php">Data Pekerjaan</a></li>
            <li><a href="../pelamar/index.php">Data Pelamar</a></li>
        </ul>
        <h2>Data Pelamar</h2>
        <!-- Menampilkan notifikasi jika ada -->
        <?php if (isset($_SESSION['notifikasi'])): ?>
            <p><?php echo $_SESSION['notifikasi']; ?></p>
            <!-- hapus notifikasi setelah ditampilkan -->
            <?php unset($_SESSION['notifikasi']); ?>
            <?php endif; ?>

            <table>
            <thead>
            <tr align="center">
            <th>#</th>
            <th>Nama Pelamar</th>
            <th>Email</th>
            <th><a href="tambah_pelamar.php">Tambah Data</a></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1; // Membuat penomoran
            // Membuat variabel untuk menjalankan query SQL
            $query = $db->query("SELECT * FROM pelamar");
            /* perulangan while akan terus berjalan (menampilkan data)
            selama kondisi $query bernilai true */
            while ($pelamar = $query->fetch_assoc()) {
                ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $pelamar['nama_pelamar'] ?></td>
            <td><?php echo $pelamar['email'] ?></td>
            <td align="center">
                <!-- URL ke halaman edit_pekerjaan dengan menggunakan 
                parameter id pada kolom tabel -->
                <a href="edit_pelamar.php?pelamar_id=<?php echo $pelamar['pelamar_id'] ?>">Edit</a>

                <!-- URL untuk menghapus data dengan menggunakan parameter id pada kolom table dan konfirmasi hapus data-->
                <a onclick="return confirm('Anda yakin ingin menghapus data?')" 
        href="hapus_pelamar.php?pelamar_id=<?php echo $pelamar['pelamar_id'] ?>">Hapus</a>
            </td>
            </tr>
            <?php
            } /* mengakhiri proses perulangan while */
            ?>
            </tbody>

            </table>

            <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    </body>
    </html>
