<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Manajemen Buku</a>
            <a href="<?= base_url('/logout') ?>" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <a href="<?= base_url('/buku/create') ?>" class="btn btn-primary mb-3">Tambah Data</a>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($buku as $b) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= esc($b['judul']) ?></td>
                            <td><?= esc($b['penulis']) ?></td>
                            <td><?= esc($b['penerbit']) ?></td>
                            <td><?= esc($b['tahun_terbit']) ?></td>
                            <td>
                                <a href="<?= base_url('/buku/edit/'.$b['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('/buku/delete/'.$b['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>