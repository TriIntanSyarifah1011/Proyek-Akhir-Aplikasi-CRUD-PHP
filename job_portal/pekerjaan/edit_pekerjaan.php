<?php
// Menghubungkan file koneksi.php untuk melakukan koneksi ke database
include("../koneksi.php");

// mengambil ID pekerjaan dari parameter URL
$id = $_GET['pekerjaan_id'];

// Mengambil data pekerjaan dari database berdasarkan ID
$query = $db->query("SELECT * FROM pekerjaan WHERE pekerjaan_id = '$id'");
// Mengambil data hasil query dan menyimpannya dalam variabel $pekerjaan
$pekerjaan = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pekerjaan</title>
</head>
<body>
    <h3>Edit Data Pekerjaan</h3>
    <form action="proses_edit.php" method="POST">
    <input type="hidden" name="pekerjaan_id" value="<?php echo $pekerjaan['pekerjaan_id']; ?>">
    <table border="0">
        <tr>
            <td>Nama Pekerjaan</td>
            <td>
                <input type="text" name="nama_pekerjaan"
                value="<?php echo $pekerjaan['nama_pekerjaan']; ?>" required></td>
</tr>
<tr>
    <td>Nama Perusahaan</td>
    <td>
    <input type="text" name="nama_perusahaan"
                value="<?php echo $pekerjaan['nama_perusahaan']; ?>" required></td>
                <!-- required untuk menandai suatu form wajib diisi-->
</tr>
<tr>
            <td>Alamat</td>
            <td><textarea name="alamat" required><?php echo $pekerjaan['alamat']; ?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" name="simpan">Simpan</button></td>
        </tr>
    </table>
</form>
</body>
</html>