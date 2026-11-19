<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Biodata Mahasiswa</title>
</head>
<body>
    <h1>Form Biodata Mahasiswa</h1>
    <form action="proses.php" method="post">
        <p>Nama Lengkap<br><input type="text" name="nama"></p>
        <p>NIM<br><input type="text" name="nim"></p>
        <p>Program Studi<br>
            <select name="prodi">
                <option value="">-- Pilih --</option>
                <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                <option value="D3 Teknik Mesin">D3 Teknik Mesin</option>
                <option value="D3 Teknik Elektro">D3 Teknik Elektro</option>
            </select>
        </p>
        <p>Jenis Kelamin<br>
            <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
            <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
        </p>
        <p>Alamat<br><textarea name="alamat" rows="3"></textarea></p>
        <button type="submit">Simpan</button>
        <a href="data.php">Lihat Data</a>
    </form>
</body>
</html>