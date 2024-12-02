<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal Pelamar</title>
</head>
<body>
    <h3>Tambah Data Pelamar</h3>
    <!-- Form untuk menambah data pelamar -->
    <form action="proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Nama Pelamar</td>
                <td><input type="text" name="nama_pelamar" required></td>
</tr>
<tr>
    <td>Email</td>
    <td><input type="email" name="email" required></td>
</tr>
</table>
<button type="submit" name="simpan" class="btn btn_primary">
    Simpan</button>
</form>

</body>
</html>