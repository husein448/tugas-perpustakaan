<?php
require_once "koneksi.php";

$sql = "SELECT id, no_anggota, nama_lengkap, email, no_hp, jenis_anggota, alamat FROM anggota ORDER BY id DESC";
$hasil = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota Perpustakaan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #1f3864; }
        table { border-collapse: collapse; width: 100%; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 8px 10px; text-align: left; }
        th { background-color: #f2f4f8; }
        .btn { display: inline-block; padding: 8px 14px; background: #1f3864; color: #fff; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Data Anggota Perpustakaan</h1>
    <a class="btn" href="form_anggota.php">+ Tambah Anggota</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No. Anggota</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Jenis Anggota</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if ($hasil && mysqli_num_rows($hasil) > 0) {
                while ($row = mysqli_fetch_assoc($hasil)) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row["no_anggota"]); ?></td>
                    <td><?php echo htmlspecialchars($row["nama_lengkap"]); ?></td>
                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                    <td><?php echo htmlspecialchars($row["no_hp"]); ?></td>
                    <td><?php echo htmlspecialchars($row["jenis_anggota"]); ?></td>
                    <td><?php echo htmlspecialchars($row["alamat"]); ?></td>
                </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="7">Belum ada data anggota.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
<?php
mysqli_close($koneksi);