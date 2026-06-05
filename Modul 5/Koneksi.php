<?php
function koneksi() {

    $uri = "postgresql://postgres.erihjdggeykqdluhiclv:knFWW6mVXIzFTThP@aws-1-ap-northeast-2.pooler.supabase.com:6543/postgres";

    $params = parse_url($uri);
    $host = $params['host'];
    $port = $params['port'];
    $user = $params['user'];
    $pass = $params['pass'];
    $db = ltrim($params['path'], '/');

    try {
        $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Koneksi gagal: " . $e->getMessage());
    }
}
?>