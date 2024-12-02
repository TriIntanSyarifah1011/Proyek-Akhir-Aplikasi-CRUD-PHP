<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal Pekerjaan</title>
</head>
<body>
    <h3>Tambah Data Pekerjaan</h3>
    <!-- Form untuk menambah data pekerjaan -->
    <form action="proses_tambah.php" method="POST">
        <table border="0">
        <tr>
            <td>Nama Pekerjaan</td>
            <td><input type="text" name="nama_pekerjaan" required></td>
        </tr>
        <tr>
            <td>Nama Perusahaan</td>
            <td><input type="text" name="nama_perusahaan" required></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea name="alamat"></textarea></td>
        </tr>
    </table>
<button type="submit" name="simpan" class="btn btn_primary">
    Simpan</button>
</form>
</body>
</html>