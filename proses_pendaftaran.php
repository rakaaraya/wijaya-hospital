<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $norm = isset($_GET['norm']) ? htmlspecialchars($_GET['norm']) : 'Tidak diisi';
    $nama = isset($_GET['nama']) ? htmlspecialchars($_GET['nama']) : 'Tidak diisi';
    $alamat = isset($_GET['alamat']) ? htmlspecialchars($_GET['alamat']) : 'Tidak diisi';
    $bpjs = isset($_GET['bpjs']) ? htmlspecialchars($_GET['bpjs']) : 'Tidak diisi';
    $penanggung = isset($_GET['penanggung']) ? htmlspecialchars($_GET['penanggung']) : 'Tidak diisi';
    $pemeriksaan = isset($_GET['pemeriksaan']) ? htmlspecialchars($_GET['pemeriksaan']) : 'Tidak diisi';
    $anamnesa = isset($_GET['anamnesa']) ? htmlspecialchars($_GET['anamnesa']) : 'Tidak diisi';
    $pembayaran = isset($_GET['pembayaran']) ? htmlspecialchars($_GET['pembayaran']) : 'Tidak diisi';
    $data_pasien = [
        "No. Rekam Medis" => $norm,
        "Nama Lengkap" => $nama,
        "Alamat" => $alamat,
        "No. BPJS" => $bpjs,
        "Penanggung Jawab" => $penanggung,
        "Pemeriksaan Awal" => $pemeriksaan,
        "Anamnesa" => $anamnesa,
        "Metode Pembayaran" => $pembayaran
    ];
} else {
    $data_pasien = [];
}
?>

<html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran Pasien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #1a1a2e 0%, #16213e 50%, #074da8ff 100%);
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: linear-gradient(to bottom, #a659f4ff 0%, #0284feff 50%, #046f99ff 100%);
            padding: 100px;
            border-radius: 150px;
            box-shadow: 0 0 1000px rgba(87, 87, 87, 0.1);
        }

        h2 {
            text-align: center;
            color: #000000ff;
            margin-bottom: 50px;
            border-bottom: 5px solid #000000ff;
            padding-bottom: 20px;
        }

        .data-table {
            width: 100%;
            font-size: 20px;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .data-table th, .data-table td {
            padding: 15px 15px;
            text-align: left;
            border: 5px solid #262626ff;
        }

        .data-table th {
            background: linear-gradient(to bottom, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: white;
            font-size: 20px;
            font-weight: bold;
            width: 40%;
        }

        .data-table tr:nth-child(even) {
            background-color: #ffffffff;
        }

        .data-table tr:hover {
            background-color: #ffffffff;
        }

        .alert {
            background-color: #ffffffff;
            color: #ffffffff;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ffffffff;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 style="font-size: 30px;">Data Pasien yang Telah Terdaftar Di RS Wijaya</h2>
    <?php if (!empty($data_pasien)): ?>
        <p style="font-size: 24px;">Data sudah berhasil diterima dari formulir pendaftaran:</p>
        <table class="data-table">
            <thead>
                <tr>
                    <th style="text-align: center; vertical-align: middle;">Detail</th>
                    <th style="text-align: center; vertical-align: middle;">Data Pasien</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data_pasien as $label => $nilai) {
                    echo "<tr>";
                    echo "<th>" . $label . "</th>";     
                    echo "<td>" . $nilai . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert">
             **Peringatan:** Tidak ada data yang diterima. Pastikan Anda mengakses halaman ini setelah mengisi dan menekan tombol **"Proses data"** dari formulir pendaftaran.
        </div>
    <?php endif; ?>
</div>

</body>
</html>