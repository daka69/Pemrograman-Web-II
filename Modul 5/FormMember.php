<?php
date_default_timezone_set('Asia/Makassar');
require 'Model.php';

$id = $_GET['id'] ?? null;
$member = null;

if ($id) {
    $member = getMemberById($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_member'];
    $nomor = $_POST['nomor_member'];
    $alamat = $_POST['alamat'];
    $tgl_daftar = $_POST['tgl_mendaftar'];
    $tgl_bayar = $_POST['tgl_terakhir_bayar'];

    if ($id) {
        editMember($id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar);
    } else {
        addMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar);
    }
    header("Location: Member.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Member</title>
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
        input, textarea {
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
        input:focus, textarea:focus {
            outline: none;
            background: rgba(255,255,255,0.1);
            border-color: #00b4db;
            box-shadow: 0 0 10px rgba(0, 180, 219, 0.3);
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
        <h2><?= $id ? 'Edit Data Member' : 'Tambah Member' ?></h2>
        <form method="POST">
            <div class="form-group">
                <label>Nama Member</label>
                <input type="text" name="nama_member" value="<?= htmlspecialchars($member['nama_member'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label>Nomor Member</label>
                <input type="text" name="nomor_member" value="<?= htmlspecialchars($member['nomor_member'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" rows="3" required><?= htmlspecialchars($member['alamat'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label>Tanggal Mendaftar</label>
                <input type="datetime-local" name="tgl_mendaftar" value="<?= isset($member['tgl_mendaftar']) ? date('Y-m-d\TH:i', strtotime($member['tgl_mendaftar'])) : date('Y-m-d\TH:i') ?>" required>
            </div>
            <div class="form-group">
                <label>Tanggal Terakhir Bayar</label>
                <input type="date" name="tgl_terakhir_bayar" value="<?= $member['tgl_terakhir_bayar'] ?? date('Y-m-d') ?>" required>
            </div>
            <div class="btn-group">
                <button type="submit">SIMPAN DATA</button>
                <a href="Member.php" class="btn-cancel">BATAL</a>
            </div>
        </form>
    </div>
</body>
</html>