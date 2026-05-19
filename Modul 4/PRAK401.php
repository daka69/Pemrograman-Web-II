<?php
$panjang = $lebar = $nilai = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $panjang = $_POST["panjang"];
    $lebar = $_POST["lebar"];
    $nilai = $_POST["nilai"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PRAK401</title>
</head>
<body>
    <form method="post">
        Panjang : <input type="text" name="panjang" value="<?= $panjang ?>"><br>
        Lebar : <input type="text" name="lebar" value="<?= $lebar ?>"><br>
        Nilai : <input type="text" name="nilai" value="<?= $nilai ?>"><br>
        <button type="submit" name="cetak">Cetak</button>
    </form>
    <br>
    <?php
    if (isset($_POST["cetak"])) {
        $arr_nilai = explode(" ", $nilai);
        if (count($arr_nilai) == ($panjang * $lebar)) {
            echo "<table border='1' cellpadding='5' cellspacing='0'>";
            $idx = 0;
            for ($i = 0; $i < $panjang; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $lebar; $j++) {
                    echo "<td>" . $arr_nilai[$idx] . "</td>";
                    $idx++;
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
        }
    }
    ?>
</body>
</html>