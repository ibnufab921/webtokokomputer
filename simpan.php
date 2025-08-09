<?php
include 'db.php';

$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

// Buat folder jika belum ada
$folder = "gambar/";
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

// Bikin nama unik untuk gambar (biar gak ketumpuk)
$ekstensi = pathinfo($gambar, PATHINFO_EXTENSION);
$namaFileBaru = uniqid() . '.' . $ekstensi;

// Simpan file ke folder
if (move_uploaded_file($tmp, $folder . $namaFileBaru)) {
    // Simpan ke database
    $query = "INSERT INTO tb_perangkat (nama, deskripsi, harga, gambar) 
              VALUES ('$nama', '$deskripsi', '$harga', '$namaFileBaru')";
    mysqli_query($conn, $query);

    echo "Data berhasil disimpan. <a href='informasi.php'>Lihat Data</a>";
} else {
    echo "Upload gambar gagal.";
}
$allowed = ['jpg', 'jpeg', 'png', 'gif'];
if (!in_array(strtolower($ekstensi), $allowed)) {
    die('Format gambar tidak didukung.');
}

?>
