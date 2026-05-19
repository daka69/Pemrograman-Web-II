<?php
$mahasiswa = [
    ["nama" => "Andi", "nim" => "2101001", "uts" => 87, "uas" => 65],
    ["nama" => "Budi", "nim" => "2101002", "uts" => 76, "uas" => 79],
    ["nama" => "Tono", "nim" => "2101003", "uts" => 50, "uas" => 41],
    ["nama" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75]
];

for ($i = 0; $i < count($mahasiswa); $i++) {
    $nilai_akhir = (0.4 * $mahasiswa[$i]["uts"]) + (0.6 * $mahasiswa[$i]["uas"]);
    $mahasiswa[$i]["akhir"] = $nilai_akhir;

    if ($nilai_akhir >= 80) {
        $huruf = "A";
    } elseif ($nilai_akhir >= 70) {
        $huruf = "B";
    } elseif ($nilai_akhir >= 60) {
        $huruf = "C";
    } elseif ($nilai_akhir >= 50) {
        $huruf = "D";
    } else {
        $huruf = "E";
    }
    $mahasiswa[$i]["huruf"] = $huruf;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PRAK402</title>
</head>
<body>
    <table border='1' cellpadding='5' cellspacing='0'>
        <tr style="background-color: #D3D3D3;">
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $mhs["nama"] ?></td>
                <td><?= $mhs["nim"] ?></td>
                <td><?= $mhs["uts"] ?></td>
                <td><?= $mhs["uas"] ?></td>
                <td><?= $mhs["akhir"] ?></td>
                <td><?= $mhs["huruf"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>