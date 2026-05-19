<?php
$data = [
    [
        "no" => 1, "nama" => "Ridho",
        "mk" => [
            ["nama_mk" => "Pemrograman I", "sks" => 2],
            ["nama_mk" => "Praktikum Pemrograman I", "sks" => 1],
            ["nama_mk" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
            ["nama_mk" => "Arsitektur Komputer", "sks" => 3]
        ]
    ],
    [
        "no" => 2, "nama" => "Ratna",
        "mk" => [
            ["nama_mk" => "Basis Data I", "sks" => 2],
            ["nama_mk" => "Praktikum Basis Data I", "sks" => 1],
            ["nama_mk" => "Kalkulus", "sks" => 3]
        ]
    ],
    [
        "no" => 3, "nama" => "Tono",
        "mk" => [
            ["nama_mk" => "Rekayasa Perangkat Lunak", "sks" => 3],
            ["nama_mk" => "Analisis dan Perancangan Sistem", "sks" => 3],
            ["nama_mk" => "Komputasi Awan", "sks" => 3],
            ["nama_mk" => "Kecerdasan Bisnis", "sks" => 3]
        ]
    ]
];

for ($i = 0; $i < count($data); $i++) {
    $total_sks = 0;
    foreach ($data[$i]["mk"] as $mk) {
        $total_sks += $mk["sks"];
    }
    $data[$i]["total_sks"] = $total_sks;

    if ($total_sks < 7) {
        $data[$i]["keterangan"] = "Revisi KRS";
    } else {
        $data[$i]["keterangan"] = "Tidak Revisi";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PRAK403</title>
</head>
<body>
    <table border='1' cellpadding='5' cellspacing='0'>
        <tr style="background-color: #D3D3D3;">
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>
        <?php
        foreach ($data as $mhs) {
            $rowspan = count($mhs["mk"]);
            for ($j = 0; $j < $rowspan; $j++) {
                echo "<tr>";
                if ($j == 0) {
                    echo "<td>" . $mhs["no"] . "</td>";
                    echo "<td>" . $mhs["nama"] . "</td>";
                } else {
                    echo "<td></td><td></td>";
                }
                echo "<td>" . $mhs["mk"][$j]["nama_mk"] . "</td>";
                echo "<td>" . $mhs["mk"][$j]["sks"] . "</td>";

                if ($j == 0) {
                    echo "<td>" . $mhs["total_sks"] . "</td>";
                    $bg_color = ($mhs["keterangan"] == "Revisi KRS") ? "#cc0000" : "#009900";
                    echo "<td style='background-color: " . $bg_color . "; color: white;'>" . $mhs["keterangan"] . "</td>";
                } else {
                    echo "<td></td><td></td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>