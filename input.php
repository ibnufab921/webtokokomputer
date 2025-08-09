<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Input Perangkat</title>
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
            padding: 0;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.85);
            width: 400px;
            margin: 60px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-top: 5px;
            font-family: 'Harabara', sans-serif;
        }

        button {
            margin-top: 20px;
            width: 100%;
            background-color: #96A584;
            color: white;
            padding: 12px;
            border: none;
            font-weight: bold;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #7e926e;
        }

        .link-info {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #333;
            text-decoration: none;
        }

        .link-info:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Form Input Perangkat Keras</h2>
        <form action="simpan.php" method="post" enctype="multipart/form-data">
            <label>Nama Perangkat:</label>
            <input type="text" name="nama" required>

            <label>Deskripsi:</label>
            <textarea name="deskripsi" rows="3" required></textarea>

            <label>Harga:</label>
            <input type="text" name="harga" required>

            <label>Gambar (upload):</label>
            <input type="file" name="gambar" accept="image/*" required>

            <button type="submit">Simpan</button>
        </form>

        <a href="informasi.php" class="link-info">Lihat Informasi Perangkat</a>
    </div>

</body>
</html>
