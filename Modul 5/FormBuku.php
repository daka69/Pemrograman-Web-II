<?php
require 'Model.php';

$id = $_GET['id'] ?? null;
$buku = null;

if ($id) {
    $buku = getBukuById($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];

    if ($id) {
        editBuku($id, $judul, $penulis, $penerbit, $tahun);
    } else {
        addBuku($judul, $penulis, $penerbit, $tahun);
    }
    header("Location: Buku.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Buku</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 40px 20px;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #fff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 100%;
            max-width: 550px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }
        h2 {
            text-align: center;
            margin-top: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 400;
            letter-spacing: 0.5px;
            color: #ddd;
        }
        input {
            width: 100%;
            padding: 14px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 10px;
            color: #fff;
            font-size: 14px;
            font-family: inherit;
            box-sizing: border-box;
            transition: 0.3s;
        }
        input:focus {
            outline: none;
            background: rgba(255,255,255,0.1);
            border-color: #00b4db;
            box-shadow: 0 0 10px rgba(0, 180, 219, 0.3);
        }
        .btn-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        button, .btn-cancel {
            flex: 1;
            border: none;
            padding: 15px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: white;
            transition: 0.3s;
            letter-spacing: 1px;
        }
        button {
            background: linear-gradient(45deg, #11998e, #38ef7d);
            box-shadow: 0 4px 15px rgba(56, 239, 125, 0.3);
        }
        .btn-cancel {
            background: linear-gradient(45deg, #eb3349, #f45c43);
            box-shadow: 0 4px 15px rgba(235, 51, 73, 0.3);
        }
        button:hover, .btn-cancel:hover {
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><?= $id ? 'Edit Data Buku' : 'Tambah Buku' ?></h2>
        <form method="POST">
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" name="judul_buku" value="<?= htmlspecialchars($buku['judul_buku'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label>Nama Penulis</label>
                <input type="text" name="penulis" value="<?= htmlspecialchars($buku['penulis'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" name="penerbit" value="<?= htmlspecialchars($buku['penerbit'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="number" name="tahun_terbit" value="<?= htmlspecialchars($buku['tahun_terbit'] ?? '') ?>" required>
            </div>
            <div class="btn-group">
                <button type="submit">SIMPAN DATA</button>
                <a href="Buku.php" class="btn-cancel">BATAL</a>
            </div>
        </form>
    </div>
</body>
</html>