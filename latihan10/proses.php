<?php
// Asmoro Nur Husein
require_once 'koneksi.php';

$nama = $_POST['nama'] ?? '';
$nim = $_POST['nim'] ?? '';
$prodi = $_POST['prodi'] ?? '';
$jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
$alamat = $_POST['alamat'] ?? '';

$err_nama = '';
$err_nim = '';
$err_prodi = '';
$err_jk = '';
$err_alamat = '';
$valid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($nama)) {
        $err_nama = "Nama tidak boleh kosong.";
    }

    if (empty($nim)) {
        $err_nim = "NIM tidak boleh kosong.";
    } elseif (!ctype_digit($nim)) {
        $err_nim = "NIM harus berupa angka.";
    }

    if (empty($prodi)) {
        $err_prodi = "Program studi wajib dipilih.";
    }

    if (empty($jenis_kelamin)) {
        $err_jk = "Jenis kelamin wajib dipilih.";
    }

    if (empty($alamat)) {
        $err_alamat = "Alamat tidak boleh kosong.";
    }

    if (empty($err_nama) && empty($err_nim) && empty($err_prodi) && empty($err_jk) && empty($err_alamat)) {
        $valid = true;
    }
}

if ($valid) {
    $sql = "INSERT INTO mahasiswa (nim, nama, prodi, jenis_kelamin, alamat) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);

    mysqli_stmt_bind_param(
        $stmt, "sssss", $nim, $nama, $prodi, $jenis_kelamin, $alamat
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<h3>Data mahasiswa berhasil disimpan!</h3>";
        echo "<a href='form.php'>Kembali ke Form</a> | <a href='data.php'>Lihat Data</a>";
    } else {
        echo "Gagal menyimpan data: " . htmlspecialchars(mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
} else {
    echo $err_nama . "<br>" . $err_nim . "<br>" . $err_prodi . "<br>" . $err_jk . "<br>" . $err_alamat;
    echo '<br><br><a href="javascript:history.back()">Kembali dan perbaiki data</a>';
}