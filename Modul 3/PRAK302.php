<!DOCTYPE html>
<html>
<head>
    <title>PRAK302</title>
</head>
<body>
    <form method="POST">
        Tinggi: <input type="number" name="tinggi"><br>
        Alamat Gambar: <input type="text" name="gambar"><br>
        <button type="submit" name="cetak">Cetak</button>
    </form>
    <br>
    <?php
    if (isset($_POST['cetak'])) {
        $tinggi = $_POST['tinggi'];
        $gambar = $_POST['gambar'];
        $i = 1;
        
        while ($i <= $tinggi) {
            $j = 1;
            while ($j < $i) {
                echo "<img src='$gambar' width='20px' height='20px' style='opacity:0;'>";
                $j++;
            }
            $k = $tinggi;
            while ($k >= $i) {
                echo "<img src='$gambar' width='20px' height='20px'>";
                $k--;
            }
            echo "<br>";
            $i++;
        }
    }
    ?>
</body>
</html>