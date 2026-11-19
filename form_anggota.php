<?php
$status = isset($_GET["status"]) ? $_GET["status"] : "";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Anggota</title>
</head>
<body>
    <h1>Pendaftaran Anggota Perpustakaan</h1>
    <?php if ($status === "sukses") { ?>
        <p>Data anggota berhasil disimpan.</p>
    <?php } ?>
    <form action="proses_anggota.php" method="post">
        <label>Nomor Anggota</label><br>
        <input type="text" name="no_anggota"><br><br>

        <label>Nama Lengkap</label><br>
        <input type="text" name="nama_lengkap"><br><br>

        <label>Alamat Email</label><br>
        <input type="text" name="email"><br><br>

        <label>Nomor HP</label><br>
        <input type="text" name="no_hp"><br><br>

        <label>Jenis Anggota</label><br>
        <select name="jenis_anggota">
            <option value="">-- Pilih --</option>
            <option value="Mahasiswa">Mahasiswa</option>
            <option value="Dosen">Dosen</option>
            <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
        </select><br><br>

        <label>Alamat</label><br>
        <textarea name="alamat" rows="4"></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>