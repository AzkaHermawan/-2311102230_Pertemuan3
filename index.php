<style>
    table { width: 60%; border-collapse: collapse; font-family: sans-serif; }
    th { background-color: #4CAF50; color: white; }
    tr:nth-child(even) { background-color: #f2f2f2; }
</style>

<?php

$daftar_mahasiswa = [
    [
        "nama" => "Azka",
        "nim" => "2311102230",
        "tugas" => 85,
        "uts" => 80,
        "uas" => 90
    ],
    [
        "nama" => "Budi Utomo",
        "nim" => "2311102231",
        "tugas" => 20,
        "uts" => 45,
        "uas" => 65
    ],
    [
        "nama" => "Siti Aminah",
        "nim" => "2311102232",
        "tugas" => 95,
        "uts" => 88,
        "uas" => 92
    ]
];

function hitungNilaiAkhir($tugas, $uts, $uas) {
    return ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
}

function tentukanGrade($nilai) {
    if ($nilai >= 85) return "A";
    elseif ($nilai >= 75) return "B";
    elseif ($nilai >= 60) return "C";
    elseif ($nilai >= 50) return "D";
    else return "E";
}

function tentukanStatus($nilai) {
    // Menggunakan operator perbandingan
    return ($nilai >= 60) ? "Lulus" : "Tidak Lulus";
}

echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Nilai Akhir</th>
        <th>Grade</th>
        <th>Status</th>
      </tr>";

$total_nilai_kelas = 0;
$nilai_tertinggi = 0;

foreach ($daftar_mahasiswa as $mhs) {
    $na = hitungNilaiAkhir($mhs['tugas'], $mhs['uts'], $mhs['uas']);
    $grade = tentukanGrade($na);
    $status = tentukanStatus($na);
    
    // Akumulasi untuk statistik
    $total_nilai_kelas += $na;
    if ($na > $nilai_tertinggi) {
        $nilai_tertinggi = $na;
    }

    echo "<tr>
            <td>{$mhs['nama']}</td>
            <td>{$mhs['nim']}</td>
            <td>{$na}</td>
            <td>{$grade}</td>
            <td>{$status}</td>
          </tr>";
}
echo "</table>";

// Langkah 4: Menampilkan Statistik
$rata_rata = $total_nilai_kelas / count($daftar_mahasiswa);

echo "<br>Rata-rata Kelas: <b>" . round($rata_rata, 2) . "</b>";
echo "<br>Nilai Tertinggi: <b>" . $nilai_tertinggi . "</b>";