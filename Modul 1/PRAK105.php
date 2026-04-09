<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK105</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        th {
            background-color: red;
            font-size: 24px;
            padding: 20px 5px;
        }
    </style>
</head>
<body>
    <?php
    $daftar_samsung = [
        "S22" => "Samsung Galaxy S22",
        "S22plus" => "Samsung Galaxy S22+",
        "A03" => "Samsung Galaxy A03",
        "Xcover5" => "Samsung Galaxy Xcover 5"
    ];
    ?>

    <table>
        <tr>
            <th><b>Daftar Smartphone Samsung</b></th>
        </tr>
        <?php foreach ($daftar_samsung as $key => $model) : ?>
            <tr>
                <td><?php echo $model; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
