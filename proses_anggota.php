<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: form_anggota.php");
    exit;
}

$no_anggota    = isset($_POST["no_anggota"]) ? trim($_POST["no_anggota"]) : "";
$nama_lengkap  = isset($_POST["nama_lengkap"]) ? trim($_POST["nama_lengkap"]) : "";
$email         = isset($_POST["email"]) ? trim($_POST["email"]) : "";
$no_hp         = isset($_POST["no_hp"]) ? trim($_POST["no_hp"]) : "";
$jenis_anggota = isset($_POST["jenis_anggota"]) ? trim($_POST["jenis_anggota"]) : "";
$alamat        = isset($_POST["alamat"]) ? trim($_POST["alamat"]) : "";

$daftar_jenis = array("Mahasiswa", "Dosen", "Tenaga Kependidikan");
$errors = array();

if (empty($no_anggota)) {
    $errors[] = "Nomor anggota tidak boleh kosong.";
} elseif (!ctype_digit($no_anggota)) {
    $errors[] = "Nomor anggota hanya boleh berisi angka.";
}

if (empty($nama_lengkap)) {
    $errors[] = "Nama lengkap tidak boleh kosong.";
}

if (empty($email)) {
    $errors[] = "Alamat email tidak boleh kosong.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid.";
}

if (empty($no_hp)) {
    $errors[] = "Nomor HP tidak boleh kosong.";
} elseif (!ctype_digit($no_hp)) {
    $errors[] = "Nomor HP hanya boleh berisi angka.";
}

if (empty($jenis_anggota)) {
    $errors[] = "Jenis anggota wajib dipilih.";
} elseif (!in_array($jenis_anggota, $daftar_jenis, true)) {
    $errors[] = "Jenis anggota tidak valid.";
}

if (empty($alamat)) {
    $errors[] = "Alamat tidak boleh kosong.";
}

$berhasil = false;
$pesan_db = "";

if (empty($errors)) {
    require_once "koneksi.php";
    
    $sql = "INSERT INTO anggota (no_anggota, nama_lengkap, email, no_hp, jenis_anggota, alamat) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssss", $no_anggota, $nama_lengkap, $email, $no_hp, $jenis_anggota, $alamat);
        if (mysqli_stmt_execute($stmt)) {
            $berhasil = true;
        } else {
            $pesan_db = mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $pesan_db = mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
    
    if ($berhasil) {
        header("Location: form_anggota.php?status=sukses");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Proses</title>
</head>
<body>
    <?php if (!empty($errors)) { ?>
        <h2>Data Tidak Valid</h2>
        <ul>
            <?php foreach ($errors as $pesan) { ?>
                <li><?php echo htmlspecialchars($pesan); ?></li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <h2>Data Gagal Disimpan</h2>
        <p>Pesan: <?php echo htmlspecialchars($pesan_db); ?></p>
    <?php } ?>
    <br><a href="javascript:history.back()">Kembali</a>
</body>
</html>