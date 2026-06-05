<?php
require 'Koneksi.php';

function getMember() {
    $pdo = koneksi();
    $stmt = $pdo->query("SELECT * FROM member");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getMemberById($id) {
    $pdo = koneksi();
    $stmt = $pdo->prepare("SELECT * FROM member WHERE id_member = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {
    $pdo = koneksi();
    $stmt = $pdo->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar]);
}

function editMember($id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {
    $pdo = koneksi();
    $stmt = $pdo->prepare("UPDATE member SET nama_member=?, nomor_member=?, alamat=?, tgl_mendaftar=?, tgl_terakhir_bayar=? WHERE id_member=?");
    return $stmt->execute([$nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar, $id]);
}

function deleteMember($id) {
    $pdo = koneksi();
    $stmt = $pdo->prepare("DELETE FROM member WHERE id_member=?");
    return $stmt->execute([$id]);
}

function getBuku() {
    $pdo = koneksi();
    $stmt = $pdo->query("SELECT * FROM buku");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBukuById($id) {
    $pdo = koneksi();
    $stmt = $pdo->prepare("SELECT * FROM buku WHERE id_buku = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addBuku($judul, $penulis, $penerbit, $tahun) {
    $pdo = koneksi();
    $stmt = $pdo->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$judul, $penulis, $penerbit, $tahun]);
}

function editBuku($id, $judul, $penulis, $penerbit, $tahun) {
    $pdo = koneksi();
    $stmt = $pdo->prepare("UPDATE buku SET judul_buku=?, penulis=?, penerbit=?, tahun_terbit=? WHERE id_buku=?");
    return $stmt->execute([$judul, $penulis, $penerbit, $tahun, $id]);
}

function deleteBuku($id) {
    $pdo = koneksi();
    $stmt = $pdo->prepare("DELETE FROM buku WHERE id_buku=?");
    return $stmt->execute([$id]);
}

function getPeminjaman() {
    $pdo = koneksi();
    $stmt = $pdo->query("SELECT p.*, m.nama_member, b.judul_buku FROM peminjaman p JOIN member m ON p.id_member = m.id_member JOIN buku b ON p.id_buku = b.id_buku");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPeminjamanById($id) {
    $pdo = koneksi();
    $stmt = $pdo->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $pdo = koneksi();
    $stmt = $pdo->prepare("INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali]);
}

function editPeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $pdo = koneksi();
    $stmt = $pdo->prepare("UPDATE peminjaman SET id_member=?, id_buku=?, tgl_pinjam=?, tgl_kembali=? WHERE id_peminjaman=?");
    return $stmt->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali, $id]);
}

function deletePeminjaman($id) {
    $pdo = koneksi();
    $stmt = $pdo->prepare("DELETE FROM peminjaman WHERE id_peminjaman=?");
    return $stmt->execute([$id]);
}
?>