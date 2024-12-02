<?php
include("../koneksi.php");

// mengambil ID pelamar dari parameter URL
$id = $_GET['pelamar_id'];

// Mengambil data pekerjaan dari database berdasarkan ID
$query = $db->query("SELECT * FROM pelamar WHERE pelamar_id = '$id'");
// Mengambil data hasil query dan menyimpannya dalam variabel $pekerjaan
$pelamar = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pelamar</title>
</head>
<body>
    <h3>Edit Data Pelamar</h3>
    <form action="proses_edit.php" method="POST">
    <input type="hidden" name="pelamar_id" value="<?php echo $pelamar['pelamar_id']; ?>">
    <table border="0">
        <tr>
            <td>Nama Pelamar</td>
            <td>
                <input type="text" name="nama_pelamar"
                value="<?php echo $pelamar['nama_pelamar']; ?>" required></td>
</tr>
<tr>
    <td>Email</td>
    <td>
    <input type="email" name="email"
                value="<?php echo $pelamar['email']; ?>" required></td>
                <!-- required untuk menandai suatu form wajib diisi-->
</tr>
        <tr>
            <td colspan="2"><button type="submit" name="simpan">Simpan</button></td>
        </tr>
    </table>
</form>
</body>
</html>