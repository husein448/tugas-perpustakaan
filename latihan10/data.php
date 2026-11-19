<?php
// Asmoro Nur Husein
require_once 'koneksi.php';

$sql = "SELECT id, nim, nama, prodi FROM mahasiswa ORDER BY id ASC";
$hasil = mysqli_query($koneksi, $sql);
$jumlah = $hasil ? mysqli_num_rows($hasil) : 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        form.inline { display: inline; }
    </style>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <p><a href="form.php">Tambah Data</a></p>
    <p>Jumlah data: <?php echo $jumlah; ?></p>

    <table>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; while ($baris = mysqli_fetch_assoc($hasil)) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($baris["nim"]); ?></td>
            <td><?php echo htmlspecialchars($baris["nama"]); ?></td>
            <td><?php echo htmlspecialchars($baris["prodi"]); ?></td>
            <td>
                <form class="inline" action="hapus.php" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    <input type="hidden" name="id" value="<?php echo (int) $baris["id"]; ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php
mysqli_free_result($hasil);
mysqli_close($koneksi);