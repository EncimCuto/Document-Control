<?php
session_start();
require_once '../../../../config/config1.php';

if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
    header('Location: ../../../../index.php');
    exit;
}

$id = $_SESSION['id'];
$username = $_SESSION['username'];
$bagian = $_SESSION['bagian'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor Pump</title>
    <!-- <link rel="shortcut icon" href="../assets/img/wings1.png" type="image/x-icon"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Times+New+Roman:wght@400&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* border: 1px solid; */
    }

    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    .container {
        min-width: 1350px;
        margin-left: 14%;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    th,
    td {
        border: 1px solid black;
        text-align: center;
        padding: 5px;
        font-size: 12px;
    }

    th {
        background-color: #f2f2f2;
    }

    .form {
        padding: 5px;
    }

    .judul {
        padding: 10px;
    }

    .bold {
        font-weight: bold;
    }

    .left {
        text-align: left;
    }

    .left-top {
        text-align: left;
        vertical-align: top;
    }

    td {
        height: 20px;
    }

    .kondisi {
        width: 70px;
    }

    .keterangan {
        width: 350px;
    }

    .hijau {
        border: 2px solid #A8E6CF;
        padding: 3px;
    }

    .biru {
        border: 2px solid #A8D0FF;
        padding: 3px;
    }

    .oren {
        border: 2px solid #FFB3B3;
        padding: 3px;
    }

    .abu {
        border: 2px solid #B0B0B0;
        padding: 3px;
    }

    .korektif {
        padding: 10px;
        width: 100%;
        height: 100%;
        box-sizing: border-box;
        text-align: left;
        vertical-align: top;
        resize: none;
        font-size: 16px;
    }

    .fill {
        margin-top: 30px;
        padding: 10px;
    }

    .fill a {
        text-decoration: none;
        color: black;
    }

    .fill a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <div class="container">

        <!-- Ngelink -->
        <div class="fill">
            <a href="../../../../../public/indeks.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MENU</a>
            <b>></b>
            <a href="../../../maintenance.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">MAINTENANCE</a>
            <b>></b>
            <a href="../dashboard.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">UTILILTY</a>
            <b>></b>
            <a href="input.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">INPUT FORM</a>
        </div>

        <form action="simpan_data.php" method="post">
            <div class="form">
                <table border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">

                    <!-- JUDUL -->
                    <thead>
                        <tr>
                            <th rowspan="4" colspan="2">
                                <img src="../../../../assets/BAS.png" alt="logo" style="width: 100%; height: 30%;">
                            </th>
                            <th colspan="9" rowspan="2">
                                <h1 style="margin: 0;">LAPORAN MAINTENANCE UTILITY</h1>
                            </th>
                        </tr>
                        <tr></tr>
                        <tr>
                            <th colspan="9" rowspan="2" style="text-align: center;">
                                <h1 style="margin: 0;">PT BUMI ALAM SEGAR</h1>
                            </th>
                        </tr>
                    </thead>

                    <tbody style="border: none;">
                        <!-- INPUTAN DATE, WAKTU & SELECT -->
                        <tr style="display: flex; justify-content: space-around;margin-top:10px;height:30px;">
                            <td style="display: flex; align-items: center; width: 45%; padding: 8px; border: none;margin-right:480%">
                                <p style="margin: 0; margin-right: 10px;font-size:15px;font-weight:600;">Tanggal:</p>
                                <input type="date" name="date" id="date">
                            </td>
                            <td style="display: flex; align-items: center; width: 45%; padding: 8px; border: none;">
                                <p style="margin: 0; margin-right: 10px;font-size:15px;font-weight:600; white-space: nowrap;">Nama Mesin:</p>
                                <input type="text" name="nama_mesin" id="nama_mesin">
                            </td>
                        </tr>

                        <tr style="display: flex; justify-content: space-around;height:30px;">
                            <td style="display: flex; align-items: center; width: 45%; padding: 8px; border: none;margin-right:480%">
                                <p style="margin: 0; margin-right: 20px;font-size:15px;font-weight:600;">Waktu:</p>
                                <input type="time" name="waktu" id="waktu">
                            </td>
                            <td style="display: flex; align-items: center; width: 45%; padding: 8px; border: none;">
                                <p style="margin: 0; margin-right: 10px;font-size:15px;font-weight:600; white-space: nowrap;">Paket:</p>
                                <select name="paket" id="paket">
                                    <option value="" selected disabled>Pilih Paket</option>
                                    <option value="Z">Z</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </td>
                        </tr>

                        <!-- HEADER -->
                        <tr>
                            <td colspan="1">
                                <h3>Mesin</h3>
                            </td>
                            <td colspan="5">
                                <h3>Jenis Pemeliharaan</h3>
                            </td>
                            <td colspan="1">
                                <h3>Kondisi</h3>
                            </td>
                            <td colspan="4">
                                <h3>Keterangan</h3>
                            </td>
                        </tr>

                        <!--COOLING TOWER-->
                        <div class="cooling-tower">
                            <tr>
                                <td rowspan="4">Cooling tower</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_CT1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning saringan bak cooling tower</td>
                                <td>
                                    <input type="text" name="kondisi_CT1" id="kondisi_CT1" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_CT1" id="keterangan_CT1" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_CT2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning unit cooling tower</td>
                                <td>
                                    <input type="text" name="kondisi_CT2" id="kondisi_CT2" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_CT2" id="keterangan_CT2" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_CT3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning Bak cooling tower</td>
                                <td>
                                    <input type="text" name="kondisi_CT3" id="kondisi_CT3" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_CT3" id="keterangan_CT3" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_CT4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_CT" id="pemeliharaan_CT" class="keterangan hijau">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_CT4" id="kondisi_CT4" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_CT4" id="keterangan_CT4" class="keterangan hijau">
                                </td>
                            </tr>
                        </div>

                        <!--RO-->
                        <div class="RO">
                            <tr>
                                <td rowspan="12">RO</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_RO1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check sensor tank farm RO produk</td>
                                <td>
                                    <input type="text" name="kondisi_RO1" id="kondisi_RO1" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_RO1" id="keterangan_RO1" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_RO2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning flow rate MMF #1</td>
                                <td>
                                    <input type="text" name="kondisi_RO2" id="kondisi_RO2" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_RO2" id="keterangan_RO2" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_RO3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning flow rate MMF #2</td>
                                <td>
                                    <input type="text" name="kondisi_RO3" id="kondisi_RO3" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_RO3" id="keterangan_RO3" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_RO4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning flow rate RO Produk</td>
                                <td>
                                    <input type="text" name="kondisi_RO4" id="kondisi_RO4" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_RO4" id="keterangan_RO4" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_RO5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning flow rate RO Reject</td>
                                <td>
                                    <input type="text" name="kondisi_RO5" id="kondisi_RO5" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_RO5" id="keterangan_RO5" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_RO6" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Penggantian micron filter CIP</td>
                                <td>
                                    <input type="text" name="kondisi_RO6" id="kondisi_RO6" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_RO6" id="keterangan_RO6" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_RO7" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Penggantian micron filter make up water</td>
                                <td>
                                    <input type="text" name="kondisi_RO7" id="kondisi_RO7" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_RO7" id="keterangan_RO7" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_RO8" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning CIP tank</td>
                                <td>
                                    <input type="text" name="kondisi_RO8" id="kondisi_RO8" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_RO8" id="keterangan_RO8" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_RO9" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">CIP membrane reverse osmosis</td>
                                <td>
                                    <input type="text" name="kondisi_RO9" id="kondisi_RO9" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_RO9" id="keterangan_RO9" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_RO10" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check fungsi valve</td>
                                <td>
                                    <input type="text" name="kondisi_RO10" id="kondisi_RO10" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_RO10" id="keterangan_RO10" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_RO11" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning unit RO mesin</td>
                                <td>
                                    <input type="text" name="kondisi_RO11" id="kondisi_RO11" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_RO11" id="keterangan_RO11" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_RO12" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_RO" id="pemeliharaan_RO" class="keterangan biru">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_RO12" id="kondisi_RO12" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_RO12" id="keterangan_RO12" class="keterangan biru">
                                </td>
                            </tr>
                        </div>

                        <!--COMPOSER-->
                        <div class="Composer">
                            <tr>
                                <td rowspan="9">Composer</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_composer1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Sirkulasi PHE AQ55VSD</td>
                                <td>
                                    <input type="text" name="kondisi_composer1" id="kondisi_composer1" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_composer1" id="keterangan_composer1" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_composer2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Penggantian Air RO AQ55VSD</td>
                                <td>
                                    <input type="text" name="kondisi_composer2" id="kondisi_composer2" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_composer2" id="keterangan_composer2" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_composer3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning compressor AQ55VSD</td>
                                <td>
                                    <input type="text" name="kondisi_composer3" id="kondisi_composer3" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_composer3" id="keterangan_composer3" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_composer4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning jalur cooling AQ55VSD</td>
                                <td>
                                    <input type="text" name="kondisi_composer4" id="kondisi_composer4" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_composer4" id="keterangan_composer4" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_composer5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning dryer FD185</td>
                                <td>
                                    <input type="text" name="kondisi_composer5" id="kondisi_composer5" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_composer5" id="keterangan_composer5" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_composer6" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning compressor GA37</td>
                                <td>
                                    <input type="text" name="kondisi_composer6" id="kondisi_composer6" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_composer6" id="keterangan_composer6" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_composer7" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning dryer FD120</td>
                                <td>
                                    <input type="text" name="kondisi_composer7" id="kondisi_composer7" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_composer7" id="keterangan_composer7" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_composer8" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Lubrikasi motor compressor AQ55VSD</td>
                                <td>
                                    <input type="text" name="kondisi_composer8" id="kondisi_composer8" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_composer8" id="keterangan_composer8" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_composer9" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning compressor SM55</td>
                                <td>
                                    <input type="text" name="kondisi_composer9" id="kondisi_composer9" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_composer9" id="keterangan_composer9" class="keterangan oren">
                                </td>
                            </tr>
                        </div>

                        <!--TANK FARM-->
                        <div class="Tank Farm">
                            <tr>
                                <td rowspan="5">Tank Farm</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_TF1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning sensor level tank farm </td>
                                <td>
                                    <input type="text" name="kondisi_TF1" id="kondisi_TF1" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_TF1" id="keterangan_TF1" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_TF2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning sensor level fresh water menara</td>
                                <td>
                                    <input type="text" name="kondisi_TF2" id="kondisi_TF2" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_TF2" id="keterangan_TF2" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_TF3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning sensor level RO Reject menara</td>
                                <td>
                                    <input type="text" name="kondisi_TF3" id="kondisi_TF3" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_TF3" id="keterangan_TF3" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_TF4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning sensor level Intermediate</td>
                                <td>
                                    <input type="text" name="kondisi_TF4" id="kondisi_TF4" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_TF4" id="keterangan_TF4" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_TF5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_TF" id="pemeliharaan_TF" class="keterangan hijau">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_TF5" id="kondisi_TF5" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_TF5" id="keterangan_TF5" class="keterangan hijau">
                                </td>
                            </tr>
                        </div>

                        <!--BOILER-->
                        <div class="Boiler">
                            <tr>
                                <td rowspan="17">Boiler</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check safety valve</td>
                                <td>
                                    <input type="text" name="kondisi_boiler1" id="kondisi_boiler1" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler1" id="keterangan_boiler1" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning level gauge</td>
                                <td>
                                    <input type="text" name="kondisi_boiler2" id="kondisi_boiler2" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler2" id="keterangan_boiler2" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning level transmiter</td>
                                <td>
                                    <input type="text" name="kondisi_boiler3" id="kondisi_boiler3" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler3" id="keterangan_boiler3" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check pressure transmiter</td>
                                <td>
                                    <input type="text" name="kondisi_boiler4" id="kondisi_boiler4" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler4" id="keterangan_boiler4" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check temperature tranmiter</td>
                                <td>
                                    <input type="text" name="kondisi_boiler5" id="kondisi_boiler5" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler5" id="keterangan_boiler5" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler6" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning sensor O2 & CO2</td>
                                <td>
                                    <input type="text" name="kondisi_boiler6" id="kondisi_boiler6" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler6" id="keterangan_boiler6" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler7" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check chaingrate</td>
                                <td>
                                    <input type="text" name="kondisi_boiler7" id="kondisi_boiler7" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler7" id="keterangan_boiler7" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler8" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check ruang bakar</td>
                                <td>
                                    <input type="text" name="kondisi_boiler8" id="kondisi_boiler8" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler8" id="keterangan_boiler8" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler9" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check back chamber back</td>
                                <td>
                                    <input type="text" name="kondisi_boiler9" id="kondisi_boiler9" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler9" id="keterangan_boiler9" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler10" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check guillotine</td>
                                <td>
                                    <input type="text" name="kondisi_boiler10" id="kondisi_boiler10" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler10" id="keterangan_boiler10" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler11" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check wet ash conveyor</td>
                                <td>
                                    <input type="text" name="kondisi_boiler11" id="kondisi_boiler11" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler11" id="keterangan_boiler11" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler12" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check bottom ash conveyor</td>
                                <td>
                                    <input type="text" name="kondisi_boiler12" id="kondisi_boiler12" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler12" id="keterangan_boiler12" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler13" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check conveyor batu bara</td>
                                <td>
                                    <input type="text" name="kondisi_boiler13" id="kondisi_boiler13" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler13" id="keterangan_boiler13" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler14" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check feeder</td>
                                <td>
                                    <input type="text" name="kondisi_boiler14" id="kondisi_boiler14" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler14" id="keterangan_boiler14" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler15" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Cleaning bak wet ash conveyor</td>
                                <td>
                                    <input type="text" name="kondisi_boiler15" id="kondisi_boiler15" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler15" id="keterangan_boiler15" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler16" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check feed tank</td>
                                <td>
                                    <input type="text" name="kondisi_boiler16" id="kondisi_boiler16" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler16" id="keterangan_boiler16" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_boiler17" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_boiler" id="pemeliharaan_boiler" class="keterangan abu">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_boiler17" id="kondisi_boiler17" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_boiler17" id="keterangan_boiler17" class="keterangan abu">
                                </td>
                            </tr>
                        </div>

                        <!--WWTP-->
                        <div class="WWTP">
                            <tr>
                                <td rowspan="5">WWTP</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_wwtp1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check line limbah</td>
                                <td>
                                    <input type="text" name="kondisi_wwtp1" id="kondisi_wwtp1" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_wwtp1" id="keterangan_wwtp1" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_wwtp2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check line chemical</td>
                                <td>
                                    <input type="text" name="kondisi_wwtp2" id="kondisi_wwtp2" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_wwtp2" id="keterangan_wwtp2" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_wwtp3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check tangki kotak</td>
                                <td>
                                    <input type="text" name="kondisi_wwtp3" id="kondisi_wwtp3" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_wwtp3" id="keterangan_wwtp3" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_wwtp4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check tangki bulat</td>
                                <td>
                                    <input type="text" name="kondisi_wwtp4" id="kondisi_wwtp4" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_wwtp4" id="keterangan_wwtp4" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_wwtp5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left"></td>
                                <td>
                                    <input type="text" name="kondisi_wwtp5" id="kondisi_wwtp5" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_wwtp5" id="keterangan_wwtp5" class="keterangan biru">
                                </td>
                            </tr>
                        </div>

                        <!---->
                        <div class="">
                            <tr>
                                <td rowspan="7"></td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_TF5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left"></td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_TF5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left"></td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left"></td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left"></td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left"></td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left"></td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td colspan="4" class="left"></td>
                                <td></td>
                                <td colspan="4"></td>
                            </tr>
                        </div>

                        <!-- TINDAKAN KOREKTIF -->
                        <tr>
                            <td colspan="6" style="border-bottom: none;">
                                <h3 class="left">Tindakan Korektif :</h3>
                            </td>
                            <td colspan="5">
                                <h3 class="left">Kebutuhan Material :</h3>
                            </td>
                        </tr>

                        <!-- DESKRIPSI & JUMLAH -->
                        <tr>
                            <td colspan="6" rowspan="11" style="border-top: none;"></td>
                            <td colspan="4">
                                <h3>Deskripsi</h3>
                            </td>
                            <td>
                                <h3>Jumlah</h3>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                        </tr>

                        <!-- DIBUAT -->
                        <tr>
                            <td colspan="3" class="left">
                                <p>Dibuat :</p>
                            </td>
                            <td colspan="2" rowspan="2"></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="left">
                                <p>Teknisi</p>
                            </td>
                        </tr>

                        <!-- DIKETAHUI : REJA FIRMANSYAH -->
                        <tr>
                            <td colspan="3" class="left">
                                <p>Diketahui : Reja Firmansyah</p>
                            </td>
                            <td colspan="2" rowspan="2"></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="left">
                                <p>Staff Engineering</p>
                            </td>
                        </tr>

                        <!-- DITERIMA -->
                        <tr>
                            <td colspan="3" class="left">
                                <p>Diterima :</p>
                            </td>
                            <td colspan="2" rowspan="2"></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="left">
                                <p>Staff User</p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="11" style="text-align: right;">
                                <h2>FRM/EUT/01/009/003-02</h2>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <button type="submit" style="padding: 10px;">Simpan</button>
                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>
        </form>
    </div>

</body>

</html>