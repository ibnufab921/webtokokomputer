<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM tb_perangkat");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Informasi Perangkat</title>
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

        .nav-links {
            text-align: center;
        }

        .nav-links a,
        .nav-links button {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #96A584;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .nav-links a:hover,
        .nav-links button:hover {
            background-color: #7e926e;
        }
    </style>
</head>
<body>

<div class="container" id="contentToDownload">
    <h2>Daftar Perangkat Keras</h2>

    <table>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Gambar</th>
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
        </tr>
        <?php } ?>
    </table>
</div>

<div class="nav-links">
    <button id="btnDownloadPdf">Download PDF</button>
    <a href="index.php">Kembali ke Beranda</a>
</div>

<!-- panggil html2pdf -->
<script src="html2pdf.bundle.min.js"></script>
<script>
  document.getElementById('btnDownloadPdf').addEventListener('click', () => {
    const element = document.getElementById('contentToDownload');
    const opt = {
      margin:       0.5,
      filename:     'Daftar_Perangkat_Keras.pdf',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { scale: 2, logging: false, useCORS: true },
      jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
    };
    // start download
    html2pdf().set(opt).from(element).save();
  });
</script>

</body>
</html>
