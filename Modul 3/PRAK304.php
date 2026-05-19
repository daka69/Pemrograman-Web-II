<!DOCTYPE html>
<html>
<head>
    <title>PRAK304</title>
</head>
<body>
    <?php
    $bintang = 0;
    if (isset($_POST['bintang'])) {
        $bintang = $_POST['bintang'];
    }
    if (isset($_POST['tambah'])) {
        $bintang++;
    }
    if (isset($_POST['kurang'])) {
        $bintang--;
        if ($bintang < 0) {
            $bintang = 0;
        }
    }
    ?>

    <?php if ($bintang == 0): ?>
    <form method="POST">
        Jumlah bintang <input type="number" name="bintang"><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <?php else: ?>
    Jumlah bintang <?= $bintang ?><br><br>
    <?php
    for ($i = 0; $i < $bintang; $i++) {
        echo "<img src='https://www.freepnglogos.com/uploads/star-png/star-vector-png-transparent-image-pngpix-21.png' width='50px'> ";
    }
    ?>
    <br><br>
    <form method="POST">
        <input type="hidden" name="bintang" value="<?= $bintang ?>">
        <button type="submit" name="tambah">Tambah</button>
        <button type="submit" name="kurang">Kurang</button>
    </form>
    <?php endif; ?>
</body>
</html>