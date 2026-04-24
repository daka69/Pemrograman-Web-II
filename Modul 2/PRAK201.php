<!DOCTYPE html>
<html>
<head>
    <title>PRAK201</title>
</head>
<body>
    <form method="POST">
        Nama: 1 <input type="text" name="nama1"><br>
        Nama: 2 <input type="text" name="nama2"><br>
        Nama: 3 <input type="text" name="nama3"><br>
        <button type="submit" name="submit">Urutkan</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama1 = $_POST['nama1'];
        $nama2 = $_POST['nama2'];
        $nama3 = $_POST['nama3'];

        if ($nama1 < $nama2 && $nama1 < $nama3) {
            echo "$nama1 <br>";
            if ($nama2 < $nama3) {
                echo "$nama2 <br>";
                echo "$nama3 <br>";
            } else {
                echo "$nama3 <br>";
                echo "$nama2 <br>";
            }
        } elseif ($nama2 < $nama1 && $nama2 < $nama3) {
            echo "$nama2 <br>";
            if ($nama1 < $nama3) {
                echo "$nama1 <br>";
                echo "$nama3 <br>";
            } else {
                echo "$nama3 <br>";
                echo "$nama1 <br>";
            }
        } else {
            echo "$nama3 <br>";
            if ($nama1 < $nama2) {
                echo "$nama1 <br>";
                echo "$nama2 <br>";
            } else {
                echo "$nama2 <br>";
                echo "$nama1 <br>";
            }
        }
    }
    ?>
</body>
</html>