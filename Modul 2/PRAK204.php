<!DOCTYPE html>
<html>
<head>
    <title>PRAK204</title>
</head>
<body>
    <?php
    $nilai = isset($_POST['nilai']) ? $_POST['nilai'] : '';
    ?>

    <form method="POST">
        Nilai : <input type="number" name="nilai" min="0" value="<?= $nilai ?>"><br>
        <button type="submit" name="submit">Konversi</button>
    </form>

    <?php
    if (isset($_POST['submit']) && $_POST['nilai'] != "") {
        $hasil = "";

        if ($nilai == 0) {
            $hasil = "Nol";
        } elseif ($nilai > 0 && $nilai < 10) {
            $hasil = "Satuan";
        } elseif ($nilai >= 11 && $nilai < 20) {
            $hasil = "Belasan";
        } elseif ($nilai == 10 || ($nilai >= 20 && $nilai < 100)) {
            $hasil = "Puluhan";
        } elseif ($nilai >= 100 && $nilai < 1000) {
            $hasil = "Ratusan";
        } elseif ($nilai >= 1000) {
            $hasil = "Anda Menginput Melebihi Limit Bilangan";
        }

        echo "<h2>Hasil: $hasil</h2>";
    }
    ?>
</body>
</html>