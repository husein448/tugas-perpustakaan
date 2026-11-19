<?php
require_once "koneksi.php";
$versi_server = mysqli_get_server_info($koneksi);
mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tes Koneksi</title>
</head>
<body>
    <h1>Tes Koneksi Database</h1>
    <p>Koneksi ke MySQL berhasil.</p>
    <p>Host: <?php echo htmlspecialchars($host); ?></p>
    <p>Database: <?php echo htmlspecialchars($database); ?></p>
    <p>Versi server: <?php echo htmlspecialchars($versi_server); ?></p>
</body>
</html>