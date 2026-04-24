<!DOCTYPE html>
<html>
<head>
    <title>PRAK203</title>
</head>
<body>
    <?php
    $nilai = isset($_POST['nilai']) ? $_POST['nilai'] : '';
    $dari = isset($_POST['dari']) ? $_POST['dari'] : 'Celcius';
    $ke = isset($_POST['ke']) ? $_POST['ke'] : 'Fahrenheit';
    ?>

    <form method="POST">
        Nilai : <input type="number" step="any" name="nilai" value="<?= $nilai ?>"><br>
        
        Dari :<br>
        <input type="radio" name="dari" value="Celcius" <?= ($dari == "Celcius") ? "checked" : "" ?>> Celcius<br>
        <input type="radio" name="dari" value="Fahrenheit" <?= ($dari == "Fahrenheit") ? "checked" : "" ?>> Fahrenheit<br>
        <input type="radio" name="dari" value="Rheamur" <?= ($dari == "Rheamur") ? "checked" : "" ?>> Rheamur<br>
        <input type="radio" name="dari" value="Kelvin" <?= ($dari == "Kelvin") ? "checked" : "" ?>> Kelvin<br>
        
        Ke :<br>
        <input type="radio" name="ke" value="Celcius" <?= ($ke == "Celcius") ? "checked" : "" ?>> Celcius<br>
        <input type="radio" name="ke" value="Fahrenheit" <?= ($ke == "Fahrenheit") ? "checked" : "" ?>> Fahrenheit<br>
        <input type="radio" name="ke" value="Rheamur" <?= ($ke == "Rheamur") ? "checked" : "" ?>> Rheamur<br>
        <input type="radio" name="ke" value="Kelvin" <?= ($ke == "Kelvin") ? "checked" : "" ?>> Kelvin<br>
        
        <button type="submit" name="konversi">Konversi</button>
    </form>

    <?php
    if (isset($_POST['konversi']) && $_POST['nilai'] != "") {
        $hasil = 0;
        $simbol = "";

        if ($dari == "Celcius") {
            if ($ke == "Celcius") { $hasil = $nilai; $simbol = "&deg;C"; }
            elseif ($ke == "Fahrenheit") { $hasil = ($nilai * 9/5) + 32; $simbol = "&deg;F"; }
            elseif ($ke == "Rheamur") { $hasil = $nilai * 4/5; $simbol = "&deg;R"; }
            elseif ($ke == "Kelvin") { $hasil = $nilai + 273.15; $simbol = "&deg;K"; }
        } elseif ($dari == "Fahrenheit") {
            if ($ke == "Celcius") { $hasil = ($nilai - 32) * 5/9; $simbol = "&deg;C"; }
            elseif ($ke == "Fahrenheit") { $hasil = $nilai; $simbol = "&deg;F"; }
            elseif ($ke == "Rheamur") { $hasil = ($nilai - 32) * 4/9; $simbol = "&deg;R"; }
            elseif ($ke == "Kelvin") { $hasil = (($nilai - 32) * 5/9) + 273.15; $simbol = "&deg;K"; }
        } elseif ($dari == "Rheamur") {
            if ($ke == "Celcius") { $hasil = $nilai * 5/4; $simbol = "&deg;C"; }
            elseif ($ke == "Fahrenheit") { $hasil = ($nilai * 9/4) + 32; $simbol = "&deg;F"; }
            elseif ($ke == "Rheamur") { $hasil = $nilai; $simbol = "&deg;R"; }
            elseif ($ke == "Kelvin") { $hasil = ($nilai * 5/4) + 273.15; $simbol = "&deg;K"; }
        } elseif ($dari == "Kelvin") {
            if ($ke == "Celcius") { $hasil = $nilai - 273.15; $simbol = "&deg;C"; }
            elseif ($ke == "Fahrenheit") { $hasil = (($nilai - 273.15) * 9/5) + 32; $simbol = "&deg;F"; }
            elseif ($ke == "Rheamur") { $hasil = ($nilai - 273.15) * 4/5; $simbol = "&deg;R"; }
            elseif ($ke == "Kelvin") { $hasil = $nilai; $simbol = "&deg;K"; }
        }

        echo "<h2>Hasil Konversi: " . number_format($hasil, 1) . " $simbol</h2>";
    }
    ?>
</body>
</html>