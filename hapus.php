<?php
include 'db.php';

// Proses hapus jika ada parameter id
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek gambar
    $cek = mysqli_query($conn, "SELECT gambar FROM tb_perangkat WHERE id = $id");
    $data = mysqli_fetch_assoc($cek);
    if ($data && file_exists("gambar/" . $data['gambar'])) {
        unlink("gambar/" . $data['gambar']);
    }

    // Hapus dari DB
    mysqli_query($conn, "DELETE FROM tb_perangkat WHERE id = $id");

    // Redirect kembali
    header("Location: hapus.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM tb_perangkat");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hapus Data Perangkat</title>
    <style>
        @font-face {
            font-family: 'Harabara';
            src: url('fonts/Harabara-Mais.ttf') format('truetype');
        }

        body {
            font-family: 'Harabara', sans-serif;
            background: url('background.png') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 40px;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            max-width: 1000px;
            margin: auto;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #003366;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
            vertical-align: top;
        }

        table th {
            background-color: #96A584;
            color: white;
        }

        table img {
            max-width: 100px;
            height: auto;
            display: block;
        }

        .btn-hapus {
            background-color: #dc3545;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-hapus:hover {
            background-color: #b72f3a;
        }

        .nav-links {
            text-align: center;
        }

        .nav-links a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #96A584;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
            transition: 0.3s;
        }

        .nav-links a:hover {
            background-color: #7e926e;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Hapus Data Perangkat Keras</h2>

        <table>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                <td><?php echo nl2br(htmlspecialchars($row['deskripsi'])); ?></td>
                <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                <td>
                    <?php if (!empty($row['gambar']) && file_exists("gambar/" . $row['gambar'])) { ?>
                        <img src="gambar/<?php echo $row['gambar']; ?>" alt="gambar">
                    <?php } else { echo 'Tidak ada gambar'; } ?>
                </td>
                <td>
                    <a class="btn-hapus" href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <div class="nav-links">
            <a href="index.php">Kembali ke Halaman Utama</a>
            <a href="input.php">Input Data Baru</a>
        </div>
    </div>

</body>
</html>
