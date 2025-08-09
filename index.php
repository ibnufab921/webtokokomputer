<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda Toko Komputer</title>
    <style>
        @font-face {
            font-family: 'Harabara';
            src: url('fonts/Harabara Mais Demo.otf') format('truetype');
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Harabara', sans-serif;
            background: url('background/background.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 55px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            max-width: 500px;
            width: 90%;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 40px;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .menu a {
            padding: 15px;
            background-color: #96A584;
            color: white;
            font-weight: bold;
            font-size: 18px;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .menu a:hover {
            background-color: #7e926e;
            transform: scale(1.03);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Selamat Datang<br>di Toko Komputer</h1>
        <div class="menu">
            
<div class="nav-links" style="text-align:center;">
  </a>
</div>
<a href="input.php">Input Data</a>
            <a href="informasi.php">Informasi Perangkat Keras</a>
              <a href="cetak_pdf.php" target="_blank">
  Download PDF</a>
<a href="hapus.php">Hapus Data Perangkat</a>
        </div>
    </div>

</body>
</html>
