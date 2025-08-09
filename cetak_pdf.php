<?php
include __DIR__ . '/db.php';
$result = mysqli_query($conn, "SELECT * FROM tb_perangkat");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Informasi & Download PDF</title>
  <style>
    @font-face {
      font-family: 'Harabara';
      src: url('fonts/Harabara-Mais.ttf') format('truetype');
    }

    body {
      font-family: 'Harabara', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f0f0;
    }

    /* Area yang akan di-download */
    #contentToDownload {
      background: url('background_download.png') no-repeat center top;
      background-size: cover;
      padding: 60px 20px;
      min-height: 1200px;
      box-sizing: border-box;
    }

    h2 {
      text-align: center;
      color: #003366;
      margin-bottom: 30px;
    }

    /* HANYA bungkus tabel dalam overlay transparan */
    .tabel-wrapper {
      background-color: rgba(255, 255, 255, 0.92);
      padding: 25px;
      border-radius: 16px;
      max-width: 1000px;
      margin: auto;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table th, table td {
      border: 1px solid #ccc;
      padding: 12px;
      vertical-align: top;
      text-align: left;
    }

    table th {
      background-color: #96A584;
      color: #fff;
    }

    table img {
      max-width: 100px;
      height: auto;
      display: block;
    }

    .nav-links {
      text-align: center;
      margin: 20px auto;
    }

    .nav-links a,
    .nav-links button {
      display: inline-block;
      margin: 5px;
      padding: 10px 20px;
      background-color: #96A584;
      color: white;
      text-decoration: none;
      font-weight: bold;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      transition: background 0.3s;
    }

    .nav-links a:hover,
    .nav-links button:hover {
      background-color: #7e926e;
    }
  </style>
</head>
<body>

  <div id="contentToDownload">
    <h2>Daftar Perangkat Keras</h2>
    <div class="tabel-wrapper">
      <table>
        <tr>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th>Harga</th>
          <th>Gambar</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= htmlspecialchars($row['nama']) ?></td>
          <td><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></td>
          <td>Rp <?= number_format($row['harga'],0,',','.') ?></td>
          <td>
            <?php if(!empty($row['gambar']) && file_exists("gambar/".$row['gambar'])): ?>
              <img src="gambar/<?= $row['gambar'] ?>" alt="">
            <?php else: ?>
              Tidak ada gambar
            <?php endif ?>
          </td>
        </tr>
        <?php endwhile ?>
      </table>
    </div>
  </div>

  <div class="nav-links">
    <a href="index.php">← Kembali ke Beranda</a>
    <button id="btnDownloadPdf">Download PDF</button>
  </div>

  <script src="html2pdf.bundle.min.js"></script>
  <script>
    const opt = {
      margin:       0,
      filename:     'Daftar_Perangkat_Keras.pdf',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  {
        scale: 2,
        useCORS: true,
        allowTaint: false,
        backgroundColor: null
      },
      jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
    };

    document.getElementById('btnDownloadPdf').addEventListener('click', () => {
      html2pdf()
        .set(opt)
        .from(document.getElementById('contentToDownload'))
        .save();
    });
  </script>

</body>
</html>
