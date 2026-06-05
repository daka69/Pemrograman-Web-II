<?php
date_default_timezone_set('Asia/Makassar');
require 'Model.php';

$id = $_GET['id'] ?? null;
$peminjaman = null;

if ($id) {
    $peminjaman = getPeminjamanById($id);
}

$members = getMember();
$bukus = getBuku();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    if ($id) {
        editPeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    } else {
        addPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    }
    header("Location: Peminjaman.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman</title>
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
        input, select {
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
        input:focus, select:focus {
            outline: none;
            background: rgba(255,255,255,0.1);
            border-color: #00b4db;
            box-shadow: 0 0 10px rgba(0, 180, 219, 0.3);
        }
        option {
            background: #203a43;
            color: white;
        }
        ::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
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
        <h2><?= $id ? 'Edit Peminjaman' : 'Tambah Peminjaman' ?></h2>
        <form method="POST">
            <div class="form-group">
                <label>Pilih Member</label>
                <select name="id_member" required>
                    <option value="" disabled <?= empty($peminjaman) ? 'selected' : '' ?>>Pilih Member...</option>
                    <?php foreach ($members as $m): ?>
                        <option value="<?= $m['id_member'] ?>" <?= (isset($peminjaman['id_member']) && $peminjaman['id_member'] == $m['id_member']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($m['nama_member']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Pilih Buku</label>
                <select name="id_buku" required>
                    <option value="" disabled <?= empty($peminjaman) ? 'selected' : '' ?>>Pilih Buku...</option>
                    <?php foreach ($bukus as $b): ?>
                        <option value="<?= $b['id_buku'] ?>" <?= (isset($peminjaman['id_buku']) && $peminjaman['id_buku'] == $b['id_buku']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($b['judul_buku']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Peminjaman</label>
                <input type="date" name="tgl_pinjam" value="<?= $peminjaman['tgl_pinjam'] ?? date('Y-m-d') ?>" required>
            </div>
            <div class="form-group">
                <label>Tanggal Pengembalian</label>
                <input type="date" name="tgl_kembali" value="<?= $peminjaman['tgl_kembali'] ?? '' ?>" required>
            </div>
            <div class="btn-group">
                <button type="submit">SIMPAN DATA</button>
                <a href="Peminjaman.php" class="btn-cancel">BATAL</a>
            </div>
        </form>
    </div>
</body>
</html>