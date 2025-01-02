<?php
session_start();
require_once '../../../../config/config1.php';

if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
    header('Location: ../../../../../index.php');
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
    <title>Electrical Engine</title>
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
            <a href="../dashboard.php?token=<?php echo htmlspecialchars($_SESSION['token']); ?>">ELECTRICAL ENGINE</a>
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
                                <h1 style="margin: 0;">LAPORAN MAINTENANCE ELECTRIC ENGINE</h1>
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
                                <p style="margin: 0; margin-right: 10px;font-size:15px;font-weight:600; white-space: nowrap;">Running Hour:</p>
                                <input type="text" name="Running_Hour" id="Running_Hour">
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

                        <!--Forklift Electrical-->
                        <div class="Forklift Electrical">
                            <tr>
                                <td rowspan="10">Forklift Electrical</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_forklift1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check General</td>
                                <td>
                                    <input type="text" name="kondisi_forklift1" id="kondisi_forklift1" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_forklift1" id="keterangan_forklift1" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_forklift2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Buzzer back</td>
                                <td>
                                    <input type="text" name="kondisi_forklift2" id="kondisi_forklift2" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_forklift2" id="keterangan_forklift2" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_forklift3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Klakson</td>
                                <td>
                                    <input type="text" name="kondisi_forklift3" id="kondisi_forklift3" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_forklift3" id="keterangan_forklift3" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_forklift4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Pilot lamp</td>
                                <td>
                                    <input type="text" name="kondisi_forklift4" id="kondisi_forklift4" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_forklift4" id="keterangan_forklift4" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_forklift5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Lampu sorot</td>
                                <td>
                                    <input type="text" name="kondisi_forklift5" id="kondisi_forklift5" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_forklift5" id="keterangan_forklift5" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_forklift6" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Lampu kombinasi kanan belakang</td>
                                <td>
                                    <input type="text" name="kondisi_forklift6" id="kondisi_forklift6" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_forklift6" id="keterangan_forklift6" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_forklift7" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Lampu kombinasi kiri belakang</td>
                                <td>
                                    <input type="text" name="kondisi_forklift7" id="kondisi_forklift7" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_forklift7" id="keterangan_forklift7" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_forklift8" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Kaca sepion</td>
                                <td>
                                    <input type="text" name="kondisi_forklift8" id="kondisi_forklift8" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_forklift8" id="keterangan_forklift8" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_forklift9" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_forklift1" id="pemeliharaan_forklift1" class="keterangan biru">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_forklift9" id="kondisi_forklift9" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_forklift9" id="keterangan_forklift9" class="keterangan biru">
                                </td>
                            </tr>

                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_forklift10" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_forklift2" id="pemeliharaan_forklift2" class="keterangan biru">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_forklift10" id="kondisi_forklift10" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_forklift10" id="keterangan_forklift10" class="keterangan biru">
                                </td>
                            </tr>
                        </div>

                        <!--Battery, Charger & Electrical System-->
                        <div class="Battery, Charger & Electrical System">
                            <tr>
                                <td rowspan="14">Battery, Charger & Electrical System</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Batterai</td>
                                <td>
                                    <input type="text" name="kondisi_battery1" id="kondisi_battery1" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery1" id="keterangan_battery1" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Skun batterai</td>
                                <td>
                                    <input type="text" name="kondisi_battery2" id="kondisi_battery2" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery2" id="keterangan_battery2" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Terminal charger batterai</td>
                                <td>
                                    <input type="text" name="kondisi_battery3" id="kondisi_battery3" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery3" id="keterangan_battery3" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Kunci kontak</td>
                                <td>
                                    <input type="text" name="kondisi_battery4" id="kondisi_battery4" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery4" id="keterangan_battery4" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Main Contactor</td>
                                <td>
                                    <input type="text" name="kondisi_battery5" id="kondisi_battery5" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery5" id="keterangan_battery5" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery6" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Microswitch</td>
                                <td>
                                    <input type="text" name="kondisi_battery6" id="kondisi_battery6" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery6" id="keterangan_battery6" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery7" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check EPS Controller</td>
                                <td>
                                    <input type="text" name="kondisi_battery7" id="kondisi_battery7" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery7" id="keterangan_battery7" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery8" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Steering Motor (Brush & Commutator)</td>
                                <td>
                                    <input type="text" name="kondisi_battery8" id="kondisi_battery8" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery8" id="keterangan_battery8" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery9" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Fan</td>
                                <td>
                                    <input type="text" name="kondisi_battery9" id="kondisi_battery9" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery9" id="keterangan_battery9" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery10" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Fuse</td>
                                <td>
                                    <input type="text" name="kondisi_battery10" id="kondisi_battery10" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery10" id="keterangan_battery10" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery11" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Display control</td>
                                <td>
                                    <input type="text" name="kondisi_battery11" id="kondisi_battery11" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery11" id="keterangan_battery11" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery12" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Wiring & Terminal</td>
                                <td>
                                    <input type="text" name="kondisi_battery12" id="kondisi_battery12" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery12" id="keterangan_battery12" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery13" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Carbon Brush</td>
                                <td>
                                    <input type="text" name="kondisi_battery13" id="kondisi_battery13" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery13" id="keterangan_battery13" class="keterangan hijau">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_battery14" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_battery" id="pemeliharaan_battery" class="keterangan hijau">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_battery14" id="kondisi_battery14" class="kondisi hijau">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_battery14" id="keterangan_battery14" class="keterangan hijau">
                                </td>
                            </tr>
                        </div>

                        <!--Drive, Steering, mast, Hydraulic & Braking System-->
                        <div class="Drive, Steering, mast, Hydraulic & Braking System">
                            <tr>
                                <td rowspan="23">Drive, Steering, mast, Hydraulic & Braking System</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Steering Wheel</td>
                                <td>
                                    <input type="text" name="kondisi_drive1" id="kondisi_drive1" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive1" id="keterangan_drive1" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Baud roda</td>
                                <td>
                                    <input type="text" name="kondisi_drive2" id="kondisi_drive2" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive2" id="keterangan_drive2" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Drive, Caster, Load Wheel</td>
                                <td>
                                    <input type="text" name="kondisi_drive3" id="kondisi_drive3" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive3" id="keterangan_drive3" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Lift Chain</td>
                                <td>
                                    <input type="text" name="kondisi_drive4" id="kondisi_drive4" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive4" id="keterangan_drive4" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Lift Bracket</td>
                                <td>
                                    <input type="text" name="kondisi_drive5" id="kondisi_drive5" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive5" id="keterangan_drive5" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive6" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Hydraulic hose</td>
                                <td>
                                    <input type="text" name="kondisi_drive6" id="kondisi_drive6" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive6" id="keterangan_drive6" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive7" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Motor hydraulic pump</td>
                                <td>
                                    <input type="text" name="kondisi_drive7" id="kondisi_drive7" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive7" id="keterangan_drive7" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive8" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Fork</td>
                                <td>
                                    <input type="text" name="kondisi_drive8" id="kondisi_drive8" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive8" id="keterangan_drive8" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive9" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Lift Rollers</td>
                                <td>
                                    <input type="text" name="kondisi_drive9" id="kondisi_drive9" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive9" id="keterangan_drive9" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive10" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Mast Rollers</td>
                                <td>
                                    <input type="text" name="kondisi_drive10" id="kondisi_drive10" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive10" id="keterangan_drive10" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive11" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Lift Cylinders</td>
                                <td>
                                    <input type="text" name="kondisi_drive11" id="kondisi_drive11" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive11" id="keterangan_drive11" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive12" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Tilt Cylinders</td>
                                <td>
                                    <input type="text" name="kondisi_drive12" id="kondisi_drive12" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive12" id="keterangan_drive12" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive13" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Control Valve</td>
                                <td>
                                    <input type="text" name="kondisi_drive13" id="kondisi_drive13" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive13" id="keterangan_drive13" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive14" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Hydraulic Tank</td>
                                <td>
                                    <input type="text" name="kondisi_drive14" id="kondisi_drive14" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive14" id="keterangan_drive14" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive15" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Overhead Guard (Pelindung kemudi)</td>
                                <td>
                                    <input type="text" name="kondisi_drive15" id="kondisi_drive15" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive15" id="keterangan_drive15" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive16" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check All Bolt, nut</td>
                                <td>
                                    <input type="text" name="kondisi_drive16" id="kondisi_drive16" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive16" id="keterangan_drive16" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive17" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Power Steering</td>
                                <td>
                                    <input type="text" name="kondisi_drive17" id="kondisi_drive17" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive17" id="keterangan_drive17" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive18" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Brake cam, Adjust Bolt</td>
                                <td>
                                    <input type="text" name="kondisi_drive18" id="kondisi_drive18" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive18" id="keterangan_drive18" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive19" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Axle</td>
                                <td>
                                    <input type="text" name="kondisi_drive19" id="kondisi_drive19" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive19" id="keterangan_drive19" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive20" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check greasing point</td>
                                <td>
                                    <input type="text" name="kondisi_drive20" id="kondisi_drive20" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive20" id="keterangan_drive20" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive21" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Check Air spring</td>
                                <td>
                                    <input type="text" name="kondisi_drive21" id="kondisi_drive21" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive21" id="keterangan_drive21" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive22" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_drive1" id="pemeliharaan_drive1" class="keterangan abu">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_drive22" id="kondisi_drive22" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive22" id="keterangan_drive22" class="keterangan abu">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_drive23" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_drive2" id="pemeliharaan_drive2" class="keterangan abu">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_drive23" id="kondisi_drive23" class="kondisi abu">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_drive23" id="keterangan_drive23" class="keterangan abu">
                                </td>
                            </tr>
                        </div>

                        <!--Oil-->
                        <div class="Oil">
                            <tr>
                                <td rowspan="4">Oil</td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_oil1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Ganti gear oil</td>
                                <td>
                                    <input type="text" name="kondisi_oil1" id="kondisi_oil1" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_oil1" id="keterangan_oil1" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_oil2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Ganti Hydarulic oil</td>
                                <td>
                                    <input type="text" name="kondisi_oil2" id="kondisi_oil2" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_oil2" id="keterangan_oil2" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_oil3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Ganti Return Filter</td>
                                <td>
                                    <input type="text" name="kondisi_oil3" id="kondisi_oil3" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_oil3" id="keterangan_oil3" class="keterangan oren">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_oil4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">Ganti breake oil</td>
                                <td>
                                    <input type="text" name="kondisi_oil4" id="kondisi_oil4" class="kondisi oren">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_oil4" id="keterangan_oil4" class="keterangan oren">
                                </td>
                            </tr>
                        </div>

                        <!---->
                        <div class="kosong">
                            <tr>
                                <td rowspan="5"></td>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_kosong1" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_kosong1" id="pemeliharaan_kosong1" class="keterangan biru">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_kosong1" id="kondisi_kosong1" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_kosong1" id="keterangan_kosong1" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_kosong2" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_kosong2" id="pemeliharaan_kosong2" class="keterangan biru">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_kosong2" id="kondisi_kosong2" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_kosong2" id="keterangan_kosong2" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_kosong3" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_kosong3" id="pemeliharaan_kosong3" class="keterangan biru">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_kosong3" id="kondisi_kosong3" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_kosong3" id="keterangan_kosong3" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_kosong4" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_kosong4" id="pemeliharaan_kosong4" class="keterangan biru">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_kosong4" id="kondisi_kosong4" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_kosong4" id="keterangan_kosong4" class="keterangan biru">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">
                                    <input type="checkbox" name="checkbox_kosong5" value="1" style="transform: scale(1.5);">
                                </td>
                                <td colspan="4" class="left">
                                    <input type="text" name="pemeliharaan_kosong5" id="pemeliharaan_kosong5" class="keterangan biru">
                                </td>
                                <td>
                                    <input type="text" name="kondisi_kosong5" id="kondisi_kosong5" class="kondisi biru">
                                </td>
                                <td colspan="4">
                                    <input type="text" name="keterangan_kosong5" id="keterangan_kosong5" class="keterangan biru">
                                </td>
                            </tr>
                        </div>

                        <!-- TINDAKAN KOREKTIF -->
                        <tr>
                            <td colspan="6" style="border-bottom: none;">
                                <h3 class="left">Tindakan Korektif :</h3>
                            </td>
                            <td colspan="2" style="border-right: none;">
                                <h3 class="left">Kebutuhan Material :</h3>
                            </td>
                            <td colspan="3" style="border-left: none;" class="left">
                                <input type="text" name="kebutuhan_material" id="kebutuhan_material" class="abu" style=" width:320px; margin-left:-50px;">
                            </td>
                        </tr>

                        <!-- DESKRIPSI & JUMLAH -->
                        <tr>
                            <td colspan="6" rowspan="12" style="border-top: none;">
                                <textarea name="korektif" id="korektif" class="korektif hijau"></textarea>
                            </td>
                            <td colspan="4">
                                <h3>Deskripsi</h3>
                            </td>
                            <td>
                                <h3>Jumlah</h3>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi1" id="deskripsi1" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah1" id="jumlah1" class="kondisi oren">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi2" id="deskripsi2" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah2" id="jumlah2" class="kondisi oren">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi3" id="deskripsi3" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah3" id="jumlah3" class="kondisi oren">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi4" id="deskripsi4" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah4" id="jumlah4" class="kondisi oren">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                <input type="text" name="deskripsi5" id="deskripsi5" class="keterangan oren">
                            </td>
                            <td>
                                <input type="number" name="jumlah5" id="jumlah5" class="kondisi oren">
                            </td>
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

                        <!-- DIKETAHUI : Jahid Koirijadi -->
                        <tr>
                            <td colspan="3" class="left">
                                <p>Diketahui : Jahid Koirijadi</p>
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
                                <h2>FRM/EUT/01/009/011-02</h2>
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