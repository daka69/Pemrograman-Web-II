<!DOCTYPE html>
<html>
<head>
    <title>PRAK303</title>
</head>
<body>
    <form method="POST">
        Batas Bawah: <input type="number" name="bawah"><br>
        Batas Atas: <input type="number" name="atas"><br>
        <button type="submit" name="cetak">Cetak</button>
    </form>
    <br>
    <?php
    if (isset($_POST['cetak'])) {
        $bawah = $_POST['bawah'];
        $atas = $_POST['atas'];
        
        do {
            if (($bawah + 7) % 5 == 0) {
                echo "<img src='https://www.freepnglogos.com/uploads/star-png/star-vector-png-transparent-image-pngpix-21.png' width='15px'> ";
            } else {
                echo $bawah . " ";
            }
            $bawah++;
        } while ($bawah <= $atas);
    }
    ?>
</body>
</html>