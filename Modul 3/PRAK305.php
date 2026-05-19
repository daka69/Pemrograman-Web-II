<!DOCTYPE html>
<html>
<head>
    <title>PRAK305</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="input">
        <button type="submit" name="submit">submit</button>
    </form>
    <br>
    <?php
    if (isset($_POST['submit'])) {
        $input = $_POST['input'];
        $len = strlen($input);
        $chars = str_split($input);

        echo "<h3>Input:</h3>";
        echo $input . "<br>";
        echo "<h3>Output:</h3>";
        
        foreach ($chars as $char) {
            for ($i = 0; $i < $len; $i++) {
                if ($i == 0) {
                    echo strtoupper($char);
                } else {
                    echo strtolower($char);
                }
            }
        }
    }
    ?>
</body>
</html>