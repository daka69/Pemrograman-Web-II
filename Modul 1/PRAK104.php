<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK104</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
    $daftar_samsung = [
        "Samsung Galaxy S22",
        "Samsung Galaxy S22+",
        "Samsung Galaxy A03",
        "Samsung Galaxy Xcover 5"
    ];
    ?>

    <table>
        <tr>
            <th><b>Daftar Smartphone Samsung</b></th>
        </tr>
        <?php foreach ($daftar_samsung as $smartphone) : ?>
            <tr>
                <td><?php echo $smartphone; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
