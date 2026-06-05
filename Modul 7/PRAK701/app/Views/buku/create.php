<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="mb-4">Tambah Data Buku</h4>
                <form action="<?= base_url('/buku/store') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" name="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" value="<?= old('judul') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('judul') ?></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" value="<?= old('penulis') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('penulis') ?></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" value="<?= old('penerbit') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('penerbit') ?></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control <?= ($validation->hasError('tahun_terbit')) ? 'is-invalid' : ''; ?>" value="<?= old('tahun_terbit') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('tahun_terbit') ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('/buku') ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>