<?php
// Path: laporan_maintenance_motor_pompa.php

require_once('../../../components/tcpdf/tcpdf.php'); // Pastikan Anda sudah mengunduh dan menyertakan library TCPDF

// Hubungkan ke database menggunakan PDO
$pdo = new PDO('mysql:host=localhost;dbname=maintenance', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Query database untuk mendapatkan data terbaru
$sql = "SELECT * FROM pump ORDER BY id DESC LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC); // Ambil satu baris data

// Validasi data
if (!$row) {
    die("Error: Tidak ada data yang ditemukan di database.");
}

// Ambil tanggal dan nama_mesin dari data yang diambil dari database
$tanggal = $row['tanggal'];
$nama_mesin = $row['nama_mesin'];

// Format tanggal untuk nama file
$tanggal_terformat = date('d-m-Y', strtotime($tanggal));
$nama_file = $nama_mesin . " " . $tanggal_terformat;

// // Cek apakah nama_file sudah ada di database
// $checkSql = "SELECT COUNT(*) FROM pump_pdf WHERE nama_file = :nama_file";
// $checkStmt = $pdo->prepare($checkSql);
// $checkStmt->execute([':nama_file' => $nama_file]);
// $fileExists = $checkStmt->fetchColumn();

// if ($fileExists) {
//     die("File PDF dengan nama yang sama sudah ada di database.");
// }

// Inisialisasi TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->AddPage('P', 'A4');
$pdf->SetMargins(0, 0, 5);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);
$pdf->SetAutoPageBreak(false, 0);

// Gambar garis tepi
// $pdf->SetDrawColor(0, 0, 0);
// $pdf->Rect(9, 9, $pdf->getPageWidth() - 18, $pdf->getPageHeight() - 9);
// $pdf->Rect(9, 9, $pdf->getPageWidth() - 18, $pdf->getPageHeight() - 18);

$logo = '<img src="../../../assets/pdf_bas.png" width="120">';
$centang = '<img src="../../../assets/centang.png" height="6.7px">';
// Header laporan
$html = '
<style>
    * {
        line-height: 0.9;
    }
    table {
        font-size: 8.58px;
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 10px;
        text-align: center;
    }
    .title {
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        width: 72.4%;
    }
    .border{
        border: 1px solid black;
    }
    .border-right{
        border-right: 1px solid black;
    }
    .border-bottom{
        border-bottom: 1px solid black;
    }
    .border-left{
        border-left: 1px solid black;
    }
    .label {
        width: 13%;
        text-align: left;
    }
    .separator {
        width: 2%;
        text-align: left;
    }
    .value {
        width: 30%;
        text-align: left;
    }
    .mesin{
        width: 15%; 
    }
    .pemeliharaan{
        width: 29.4%; 
    }
    .kondisi{
        width: 10%; 
    }
    .keterangan{
        width: 38%; 
    }
    .checklist{
        width: 5%;
    }
    .left{
        text-align: left;
    }
    .right{
        text-align: right;
    }
    .bold{
        font-weight: bold;   
    }
    .custom-height {
        height: 233px; 
        overflow: hidden; 
        word-wrap: break-word;
        line-height: 1.5;
    }
</style>

<table border="0" cellspacing="0" cellpadding="3">
    <tr>
        <td rowspan="2" style="width: 25%;" class="border">' . $logo . '</td>
        <td class="title border">LAPORAN MAINTENANCE MOTOR & POMPA UTILITY</td>
    </tr>
    <tr>
        <td class="title border">PT BUMI ALAM SEGAR</td>
    </tr>

    <tr>
        <td class="label border-left">Tanggal</td>
        <td class="separator">:</td>
        <td class="value">' . $tanggal_terformat . '</td>

        <td class="label">Nama Mesin</td>
        <td class="separator">:</td>
        <td class="left border-right" width="25%">' . $nama_mesin . '</td>
        <td class="border-right" width="12.4%" rowspan= "2"><img src="../../../assets/centang.png" height="18px"></td>
    </tr>

    <tr>
        <td class="label border-left">Waktu</td>
        <td class="separator">:</td>
        <td class="value">' . date('H:i', strtotime($row['waktu'])) . '</td>

        <td class="label">Paket</td>
        <td class="separator">:</td>
        <td class="left border-right" width="25%">' . $row['paket'] . '</td>
    </tr>
    
    <!-- HEADER -->
    <tr style="font-weight: bold;">
        <td class="border mesin">Mesin</td>
        <td class="border" width= "34.4%">Jenis Pemeliharaan</td>
        <td class="border kondisi">Kondisi</td>
        <td class="border keterangan">Keterangan</td>
    </tr>

<!-- MOTOR -->
<tr>
    <td class="mesin border-right border-left left">Motor</td>
        <td class="checklist border-right border-bottom">
            ' . (!empty($row['checkbox_motor1']) ? $centang : '') . '
        </td>
        <td class="pemeliharaan border-right border-bottom left">Check electrical</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_motor1'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_motor1'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_motor2']) ? $centang : '') . '
        </td>        
        <td class="border-right border-bottom left">Cek putaran motor</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_motor2'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_motor2'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_motor3']) ? $centang : '') . '
        </td>        
        <td class="border-right border-bottom left">Check fibrasi dan suara motor</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_motor3'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_motor3'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_motor4']) ? $centang : '') . '
        </td>        
        <td class="border-right border-bottom left">Check bearing</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_motor4'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_motor4'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_motor5']) ? $centang : '') . '
        </td>        
        <td class="border-right border-bottom left">Pelumasan motor</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_motor5'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_motor5'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_motor6']) ? $centang : '') . '
        </td>        
        <td class="border-right border-bottom left">Kebersihan unit dan body motor</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_motor6'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_motor6'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_motor7']) ? $centang : '') . '
        </td>        
        <td class="border-right border-bottom left">' . $row['pemeliharaan_motor1'] . '</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_motor7'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_motor7'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left border-bottom"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_motor8']) ? $centang : '') . '
        </td>        
        <td class="border-right border-bottom left">' . $row['pemeliharaan_motor2'] . '</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_motor8'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_motor8'] . '</td>
    </tr>

    <!-- POMPA -->
    <tr>
        <td class="border-right border-left left">Pompa</td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_pompa1']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check putaran pompa</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_pompa1'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_pompa1'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_pompa2']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check shaft dan karet coupling</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_pompa2'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_pompa2'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_pompa3']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check fan belt</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_pompa3'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_pompa3'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_pompa4']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check pressure pompa</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_pompa4'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_pompa4'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_pompa5']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check mechanical seal</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_pompa5'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_pompa5'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_pompa6']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check gasket pompa</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_pompa6'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_pompa6'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_pompa7']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check impeler</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_pompa7'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_pompa7'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_pompa8']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Kebersihan unit dan body</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_pompa8'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_pompa8'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_pompa9']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">' . $row['pemeliharaan_pompa1'] . '</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_pompa9'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_pompa9'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left border-bottom"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_pompa10']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">' . $row['pemeliharaan_pompa2'] . '</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_pompa10'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_pompa10'] . '</td>
    </tr>

    <!-- Aksesoris-->
    <tr>
        <td class="border-right border-left left">Aksesoris</td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_aksesoris1']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check Valve</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_aksesoris1'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_aksesoris1'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_aksesoris2']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check Cek valve</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_aksesoris2'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_aksesoris2'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_aksesoris3']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check Flow meter</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_aksesoris3'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_aksesoris3'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_aksesoris4']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check Strainer</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_aksesoris4'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_aksesoris4'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_aksesoris5']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check Alat ukur</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_aksesoris5'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_aksesoris5'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_aksesoris6']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check Kelengkapan baut mur</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_aksesoris6'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_aksesoris6'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left border-bottom"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_aksesoris7']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">' . $row['pemeliharaan_aksesoris'] . '</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_aksesoris7'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_aksesoris7'] . '</td>
    </tr>

    <!-- Gearbox -->
    <tr>
        <td class="border-right border-left left">Gearbox</td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_gearbox1']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Penambahan/penggantian oli</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_gearbox1'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_gearbox1'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_gearbox2']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check unit dan area</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_gearbox2'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_gearbox2'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_gearbox3']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check oil seal</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_gearbox3'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_gearbox3'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_gearbox4']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check filter udara</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_gearbox4'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_gearbox4'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_gearbox5']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">Check bearing</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_gearbox5'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_gearbox5'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right border-bottom">
            ' . (!empty($row['checkbox_gearbox6']) ? $centang : '') . '
        </td>
        <td class="border-right border-bottom left">' . $row['pemeliharaan_gearbox1'] . '</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_gearbox6'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_gearbox6'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-left"></td>
        <td class="border-right">
            ' . (!empty($row['checkbox_gearbox7']) ? $centang : '') . '
        </td>
        <td class="border-right left">' . $row['pemeliharaan_gearbox2'] . '</td>
        <td class="kondisi border-right border-bottom">' . $row['kondisi_gearbox7'] . '</td>
        <td class="keterangan border-right border-bottom">' . $row['keterangan_gearbox7'] . '</td>
    </tr>

    <tr>
        <td class="border" width="97.4%"></td>
    </tr>

    <tr>
        <td class="border-right border-left left bold" width="49.4%">Tindakan Korektif :</td>
        <td class="border-right border-bottom left bold" width="48%">Kebutuhan Material : ' . $row['kebutuhan_material'] . '</td>
    </tr>
    <tr>
        <td class="border-right border-left border-bottom left custom-height" rowspan="17" width="49.4%">
            ' . $row['korektif'] . '
        </td>
        <td class="border-right border-bottom bold" width="38%">Deskripsi</td>
        <td class="border-right border-bottom bold" width="10%">Jumlah</td>
    </tr>

    <tr>
        <td class="border-right border-bottom" width="38%">' . $row['deskripsi1'] . '</td>
        <td class="border-right border-bottom" width="10%">' . $row['jumlah1'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-bottom" width="38%">' . $row['deskripsi2'] . '</td>
        <td class="border-right border-bottom" width="10%">' . $row['jumlah2'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-bottom" width="38%">' . $row['deskripsi3'] . '</td>
        <td class="border-right border-bottom" width="10%">' . $row['jumlah3'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-bottom" width="38%">' . $row['deskripsi4'] . '</td>
        <td class="border-right border-bottom" width="10%">' . $row['jumlah4'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-bottom" width="38%">' . $row['deskripsi5'] . '</td>
        <td class="border-right border-bottom" width="10%">' . $row['jumlah5'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-bottom" width="38%">' . $row['deskripsi6'] . '</td>
        <td class="border-right border-bottom" width="10%">' . $row['jumlah6'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-bottom" width="38%">' . $row['deskripsi7'] . '</td>
        <td class="border-right border-bottom" width="10%">' . $row['jumlah7'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-bottom" width="38%">' . $row['deskripsi8'] . '</td>
        <td class="border-right border-bottom" width="10%">' . $row['jumlah8'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-bottom" width="38%">' . $row['deskripsi9'] . '</td>
        <td class="border-right border-bottom" width="10%">' . $row['jumlah9'] . '</td>
    </tr>

    <tr>
        <td class="border-right border-bottom" width="38%">' . $row['deskripsi10'] . '</td>
        <td class="border-right border-bottom" width="10%">' . $row['jumlah10'] . '</td>
    </tr>
    
    <tr>
        <td class="border-right left" width="34%">Dibuat :</td>
        <td class="border-right border-bottom" width="14%" rowspan="2"></td>
    </tr>
    
    <tr>
        <td class="border-right border-bottom left" width="34%">Teknisi</td>
    </tr>
    
    <tr>
        <td class="border-right left" width="34%">Diketahui : Jahid Khoirijadi</td>
        <td class="border-right border-bottom" width="14%" rowspan="2"></td>
    </tr>
    
    <tr>
        <td class="border-right border-bottom left" width="34%">Staff Engineering</td>
    </tr>
    
    <tr>
        <td class="border-right left" width="34%">Diterima :</td>
        <td class="border-right border-bottom" width="14%" rowspan="2"></td>
    </tr>
    
    <tr>
        <td class="border-right border-bottom left" width="34%">Staff User</td>
    </tr>

    <tr>
        <td class="right bold" width="98.5%">FRM/EUT/01/009/009-02</td>
    </tr>
</table>';

$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF sebagai string
$pdfOutput = $pdf->Output('', 'S');

// Simpan PDF ke database
$insertSql = "INSERT INTO pump_pdf (nama_file, pdf_file) VALUES (:nama_file, :pdf_file)";
$insertStmt = $pdo->prepare($insertSql);
$insertStmt->execute([
    ':nama_file' => $nama_file,
    ':pdf_file' => $pdfOutput
]);

echo "File PDF berhasil disimpan di database.";
