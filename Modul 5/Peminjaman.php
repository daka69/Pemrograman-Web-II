<?php
require 'Model.php';

if (isset($_GET['delete'])) {
    deletePeminjaman($_GET['delete']);
    header("Location: Peminjaman.php");
    exit;
}

$peminjaman = getPeminjaman();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 40px 20px;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #fff;
            min-height: 100vh;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
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
        .nav-links {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-bottom: 35px;
        }
        .nav-links a {
            text-decoration: none;
            padding: 12px 30px;
            color: #fff;
            background: rgba(255,255,255,0.05);
            border-radius: 30px;
            border: 1px solid rgba(255,255,255,0.1);
            transition: 0.3s;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .nav-links a:hover, .nav-links a.active {
            background: rgba(255,255,255,0.2);
            box-shadow: 0 0 15px rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }
        .btn-add {
            display: inline-block;
            text-decoration: none;
            background: linear-gradient(45deg, #00b4db, #0083b0);
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: 600;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(0, 180, 219, 0.4);
            margin-bottom: 25px;
        }
        .btn-add:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 180, 219, 0.6);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 18px 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        th {
            background: rgba(0,0,0,0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 13px;
            font-weight: 600;
        }
        tr:hover {
            background: rgba(255,255,255,0.08);
        }
        .action-links a {
            text-decoration: none;
            padding: 8px 18px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: white;
            transition: 0.3s;
            margin-right: 8px;
            display: inline-block;
        }
        .btn-edit {
            background: linear-gradient(45deg, #f2994a, #f2c94c);
            box-shadow: 0 4px 10px rgba(242, 153, 74, 0.3);
        }
        .btn-delete {
            background: linear-gradient(45deg, #eb3349, #f45c43);
            box-shadow: 0 4px 10px rgba(235, 51, 73, 0.3);
        }
        .action-links a:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Peminjaman</h2>
        <div class="nav-links">
            <a href="Member.php">Data Member</a>
            <a href="Buku.php">Data Buku</a>
            <a href="Peminjaman.php" class="active">Data Peminjaman</a>
        </div>
        <a href="FormPeminjaman.php" class="btn-add">+ Tambah Peminjaman Baru</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Member</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($peminjaman as $p): ?>
            <tr>
                <td><?= $p['id_peminjaman'] ?></td>
                <td><?= htmlspecialchars($p['nama_member']) ?></td>
                <td><?= htmlspecialchars($p['judul_buku']) ?></td>
                <td><?= $p['tgl_pinjam'] ?></td>
                <td><?= $p['tgl_kembali'] ?></td>
                <td class="action-links">
                    <a href="FormPeminjaman.php?id=<?= $p['id_peminjaman'] ?>" class="btn-edit">Edit</a>
                    <a href="Peminjaman.php?delete=<?= $p['id_peminjaman'] ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus catatan ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>