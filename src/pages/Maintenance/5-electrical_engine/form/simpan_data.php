<?php
session_start();
// Parameter koneksi ke database
$host = 'localhost'; // Ganti dengan host database Anda
$dbname = 'maintenance'; // Ganti dengan nama database Anda
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda jika ada

try {
        // Membuat koneksi PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Menyiapkan koneksi untuk mengatasi error dengan mode exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
        // Menangani error jika koneksi gagal
        echo "Koneksi gagal: " . $e->getMessage();
        exit();
}

// Ambil data dari form
$tanggal = $_POST['date'] ?? '';
$waktu = $_POST['waktu'] ?? '';
$nama_mesin = $_POST['nama_mesin'] ?? '';
$Running_Hour = $_POST['Running_Hour'] ?? '';

// Data untuk forklift
$kondisi_forklift1 = $_POST['kondisi_forklift1'] ?? '';
$keterangan_forklift1 = $_POST['keterangan_forklift1'] ?? '';
$checkbox_forklift1 = isset($_POST['checkbox_forklift1']) ? 1 : 0;

$kondisi_forklift2 = $_POST['kondisi_forklift2'] ?? '';
$keterangan_forklift2 = $_POST['keterangan_forklift2'] ?? '';
$checkbox_forklift2 = isset($_POST['checkbox_forklift2']) ? 1 : 0;

$kondisi_forklift3 = $_POST['kondisi_forklift3'] ?? '';
$keterangan_forklift3 = $_POST['keterangan_forklift3'] ?? '';
$checkbox_forklift3 = isset($_POST['checkbox_forklift3']) ? 1 : 0;

$kondisi_forklift4 = $_POST['kondisi_forklift4'] ?? '';
$keterangan_forklift4 = $_POST['keterangan_forklift4'] ?? '';
$checkbox_forklift4 = isset($_POST['checkbox_forklift4']) ? 1 : 0;

$kondisi_forklift5 = $_POST['kondisi_forklift5'] ?? '';
$keterangan_forklift5 = $_POST['keterangan_forklift5'] ?? '';
$checkbox_forklift5 = isset($_POST['checkbox_forklift5']) ? 1 : 0;

$kondisi_forklift6 = $_POST['kondisi_forklift6'] ?? '';
$keterangan_forklift6 = $_POST['keterangan_forklift6'] ?? '';
$checkbox_forklift6 = isset($_POST['checkbox_forklift6']) ? 1 : 0;

$kondisi_forklift7 = $_POST['kondisi_forklift7'] ?? '';
$keterangan_forklift7 = $_POST['keterangan_forklift7'] ?? '';
$checkbox_forklift7 = isset($_POST['checkbox_forklift7']) ? 1 : 0;

$kondisi_forklift8 = $_POST['kondisi_forklift8'] ?? '';
$keterangan_forklift8 = $_POST['keterangan_forklift8'] ?? '';
$checkbox_forklift8 = isset($_POST['checkbox_forklift8']) ? 1 : 0;

$kondisi_forklift9 = $_POST['kondisi_forklift9'] ?? '';
$keterangan_forklift9 = $_POST['keterangan_forklift9'] ?? '';
$checkbox_forklift9 = isset($_POST['checkbox_forklift9']) ? 1 : 0;

$kondisi_forklift10 = $_POST['kondisi_forklift10'] ?? '';
$keterangan_forklift10 = $_POST['keterangan_forklift10'] ?? '';
$checkbox_forklift10 = isset($_POST['checkbox_forklift10']) ? 1 : 0;

// Data untuk battery
$kondisi_battery1 = $_POST['kondisi_battery1'] ?? '';
$keterangan_battery1 = $_POST['keterangan_battery1'] ?? '';
$checkbox_battery1 = isset($_POST['checkbox_battery1']) ? 1 : 0;

$kondisi_battery2 = $_POST['kondisi_battery2'] ?? '';
$keterangan_battery2 = $_POST['keterangan_battery2'] ?? '';
$checkbox_battery2 = isset($_POST['checkbox_battery2']) ? 1 : 0;

$kondisi_battery3 = $_POST['kondisi_battery3'] ?? '';
$keterangan_battery3 = $_POST['keterangan_battery3'] ?? '';
$checkbox_battery3 = isset($_POST['checkbox_battery3']) ? 1 : 0;

$kondisi_battery4 = $_POST['kondisi_battery4'] ?? '';
$keterangan_battery4 = $_POST['keterangan_battery4'] ?? '';
$checkbox_battery4 = isset($_POST['checkbox_battery4']) ? 1 : 0;

$kondisi_battery5 = $_POST['kondisi_battery5'] ?? '';
$keterangan_battery5 = $_POST['keterangan_battery5'] ?? '';
$checkbox_battery5 = isset($_POST['checkbox_battery5']) ? 1 : 0;

$kondisi_battery6 = $_POST['kondisi_battery6'] ?? '';
$keterangan_battery6 = $_POST['keterangan_battery6'] ?? '';
$checkbox_battery6 = isset($_POST['checkbox_battery6']) ? 1 : 0;

$kondisi_battery7 = $_POST['kondisi_battery7'] ?? '';
$keterangan_battery7 = $_POST['keterangan_battery7'] ?? '';
$checkbox_battery7 = isset($_POST['checkbox_battery7']) ? 1 : 0;

$kondisi_battery8 = $_POST['kondisi_battery8'] ?? '';
$keterangan_battery8 = $_POST['keterangan_battery8'] ?? '';
$checkbox_battery8 = isset($_POST['checkbox_battery8']) ? 1 : 0;

$kondisi_battery9 = $_POST['kondisi_battery9'] ?? '';
$keterangan_battery9 = $_POST['keterangan_battery9'] ?? '';
$checkbox_battery9 = isset($_POST['checkbox_battery9']) ? 1 : 0;

$kondisi_battery10 = $_POST['kondisi_battery10'] ?? '';
$keterangan_battery10 = $_POST['keterangan_battery10'] ?? '';
$checkbox_battery10 = isset($_POST['checkbox_battery10']) ? 1 : 0;

$kondisi_battery11 = $_POST['kondisi_battery11'] ?? '';
$keterangan_battery11 = $_POST['keterangan_battery11'] ?? '';
$checkbox_battery11 = isset($_POST['checkbox_battery11']) ? 1 : 0;

$kondisi_battery12 = $_POST['kondisi_battery12'] ?? '';
$keterangan_battery12 = $_POST['keterangan_battery12'] ?? '';
$checkbox_battery12 = isset($_POST['checkbox_battery12']) ? 1 : 0;

$kondisi_battery13 = $_POST['kondisi_battery13'] ?? '';
$keterangan_battery13 = $_POST['keterangan_battery13'] ?? '';
$checkbox_battery13 = isset($_POST['checkbox_battery13']) ? 1 : 0;

$kondisi_battery14 = $_POST['kondisi_battery14'] ?? '';
$keterangan_battery14 = $_POST['keterangan_battery14'] ?? '';
$checkbox_battery14 = isset($_POST['checkbox_battery14']) ? 1 : 0;

// Data untuk drive
$kondisi_drive1 = $_POST['kondisi_drive1'] ?? '';
$keterangan_drive1 = $_POST['keterangan_drive1'] ?? '';
$checkbox_drive1 = isset($_POST['checkbox_drive1']) ? 1 : 0;

$kondisi_drive2 = $_POST['kondisi_drive2'] ?? '';
$keterangan_drive2 = $_POST['keterangan_drive2'] ?? '';
$checkbox_drive2 = isset($_POST['checkbox_drive2']) ? 1 : 0;

$kondisi_drive3 = $_POST['kondisi_drive3'] ?? '';
$keterangan_drive3 = $_POST['keterangan_drive3'] ?? '';
$checkbox_drive3 = isset($_POST['checkbox_drive3']) ? 1 : 0;

$kondisi_drive4 = $_POST['kondisi_drive4'] ?? '';
$keterangan_drive4 = $_POST['keterangan_drive4'] ?? '';
$checkbox_drive4 = isset($_POST['checkbox_drive4']) ? 1 : 0;

$kondisi_drive5 = $_POST['kondisi_drive5'] ?? '';
$keterangan_drive5 = $_POST['keterangan_drive5'] ?? '';
$checkbox_drive5 = isset($_POST['checkbox_drive5']) ? 1 : 0;

$kondisi_drive6 = $_POST['kondisi_drive6'] ?? '';
$keterangan_drive6 = $_POST['keterangan_drive6'] ?? '';
$checkbox_drive6 = isset($_POST['checkbox_drive6']) ? 1 : 0;

$kondisi_drive7 = $_POST['kondisi_drive7'] ?? '';
$keterangan_drive7 = $_POST['keterangan_drive7'] ?? '';
$checkbox_drive7 = isset($_POST['checkbox_drive7']) ? 1 : 0;

$kondisi_drive8 = $_POST['kondisi_drive8'] ?? '';
$keterangan_drive8 = $_POST['keterangan_drive8'] ?? '';
$checkbox_drive8 = isset($_POST['checkbox_drive8']) ? 1 : 0;

$kondisi_drive9 = $_POST['kondisi_drive9'] ?? '';
$keterangan_drive9 = $_POST['keterangan_drive9'] ?? '';
$checkbox_drive9 = isset($_POST['checkbox_drive9']) ? 1 : 0;

$kondisi_drive10 = $_POST['kondisi_drive10'] ?? '';
$keterangan_drive10 = $_POST['keterangan_drive10'] ?? '';
$checkbox_drive10 = isset($_POST['checkbox_drive10']) ? 1 : 0;

$kondisi_drive11 = $_POST['kondisi_drive11'] ?? '';
$keterangan_drive11 = $_POST['keterangan_drive11'] ?? '';
$checkbox_drive11 = isset($_POST['checkbox_drive11']) ? 1 : 0;

$kondisi_drive12 = $_POST['kondisi_drive12'] ?? '';
$keterangan_drive12 = $_POST['keterangan_drive12'] ?? '';
$checkbox_drive12 = isset($_POST['checkbox_drive12']) ? 1 : 0;

$kondisi_drive13 = $_POST['kondisi_drive13'] ?? '';
$keterangan_drive13 = $_POST['keterangan_drive13'] ?? '';
$checkbox_drive13 = isset($_POST['checkbox_drive13']) ? 1 : 0;

$kondisi_drive14 = $_POST['kondisi_drive14'] ?? '';
$keterangan_drive14 = $_POST['keterangan_drive14'] ?? '';
$checkbox_drive14 = isset($_POST['checkbox_drive14']) ? 1 : 0;

$kondisi_drive15 = $_POST['kondisi_drive15'] ?? '';
$keterangan_drive15 = $_POST['keterangan_drive15'] ?? '';
$checkbox_drive15 = isset($_POST['checkbox_drive15']) ? 1 : 0;

$kondisi_drive16 = $_POST['kondisi_drive16'] ?? '';
$keterangan_drive16 = $_POST['keterangan_drive16'] ?? '';
$checkbox_drive16 = isset($_POST['checkbox_drive16']) ? 1 : 0;

$kondisi_drive17 = $_POST['kondisi_drive17'] ?? '';
$keterangan_drive17 = $_POST['keterangan_drive17'] ?? '';
$checkbox_drive17 = isset($_POST['checkbox_drive17']) ? 1 : 0;

$kondisi_drive18 = $_POST['kondisi_drive18'] ?? '';
$keterangan_drive18 = $_POST['keterangan_drive18'] ?? '';
$checkbox_drive18 = isset($_POST['checkbox_drive18']) ? 1 : 0;

$kondisi_drive19 = $_POST['kondisi_drive19'] ?? '';
$keterangan_drive19 = $_POST['keterangan_drive19'] ?? '';
$checkbox_drive19 = isset($_POST['checkbox_drive19']) ? 1 : 0;

$kondisi_drive20 = $_POST['kondisi_drive20'] ?? '';
$keterangan_drive20 = $_POST['keterangan_drive20'] ?? '';
$checkbox_drive20 = isset($_POST['checkbox_drive20']) ? 1 : 0;

$kondisi_drive21 = $_POST['kondisi_drive21'] ?? '';
$keterangan_drive21 = $_POST['keterangan_drive21'] ?? '';
$checkbox_drive21 = isset($_POST['checkbox_drive21']) ? 1 : 0;

$kondisi_drive22 = $_POST['kondisi_drive22'] ?? '';
$keterangan_drive22 = $_POST['keterangan_drive22'] ?? '';
$checkbox_drive22 = isset($_POST['checkbox_drive22']) ? 1 : 0;

$kondisi_drive23 = $_POST['kondisi_drive23'] ?? '';
$keterangan_drive23 = $_POST['keterangan_drive23'] ?? '';
$checkbox_drive23 = isset($_POST['checkbox_drive23']) ? 1 : 0;

$kondisi_oil1 = $_POST['kondisi_oil1'] ?? '';
$keterangan_oil1 = $_POST['keterangan_oil1'] ?? '';
$checkbox_oil1 = isset($_POST['checkbox_oil1']) ? 1 : 0;

$kondisi_oil2 = $_POST['kondisi_oil2'] ?? '';
$keterangan_oil2 = $_POST['keterangan_oil2'] ?? '';
$checkbox_oil2 = isset($_POST['checkbox_oil2']) ? 1 : 0;

$kondisi_oil3 = $_POST['kondisi_oil3'] ?? '';
$keterangan_oil3 = $_POST['keterangan_oil3'] ?? '';
$checkbox_oil3 = isset($_POST['checkbox_oil3']) ? 1 : 0;

$kondisi_oil4 = $_POST['kondisi_oil4'] ?? '';
$keterangan_oil4 = $_POST['keterangan_oil4'] ?? '';
$checkbox_oil4 = isset($_POST['checkbox_oil4']) ? 1 : 0;

$kondisi_kosong1 = $_POST['kondisi_kosong1'] ?? '';
$keterangan_kosong1 = $_POST['keterangan_kosong1'] ?? '';
$checkbox_kosong1 = isset($_POST['checkbox_kosong1']) ? 1 : 0;

$kondisi_kosong2 = $_POST['kondisi_kosong2'] ?? '';
$keterangan_kosong2 = $_POST['keterangan_kosong2'] ?? '';
$checkbox_kosong2 = isset($_POST['checkbox_kosong2']) ? 1 : 0;

$kondisi_kosong3 = $_POST['kondisi_kosong3'] ?? '';
$keterangan_kosong3 = $_POST['keterangan_kosong3'] ?? '';
$checkbox_kosong3 = isset($_POST['checkbox_kosong3']) ? 1 : 0;

$kondisi_kosong4 = $_POST['kondisi_kosong4'] ?? '';
$keterangan_kosong4 = $_POST['keterangan_kosong4'] ?? '';
$checkbox_kosong4 = isset($_POST['checkbox_kosong4']) ? 1 : 0;

$kondisi_kosong5 = $_POST['kondisi_kosong5'] ?? '';
$keterangan_kosong5 = $_POST['keterangan_kosong5'] ?? '';
$checkbox_kosong5 = isset($_POST['checkbox_kosong5']) ? 1 : 0;

$korektif = $_POST['korektif'] ?? '';
$kebutuhan_material = $_POST['kebutuhan_material'] ?? '';
$pemeliharaan_forklift1 = $_POST['pemeliharaan_forklift1'] ?? '';
$pemeliharaan_forklift2 = $_POST['pemeliharaan_forklift2'] ?? '';
$pemeliharaan_battery = $_POST['pemeliharaan_battery'] ?? '';
$pemeliharaan_drive1 = $_POST['pemeliharaan_drive1'] ?? '';
$pemeliharaan_drive2 = $_POST['pemeliharaan_drive2'] ?? '';
$pemeliharaan_kosong1 = $_POST['pemeliharaan_kosong1'] ?? '';
$pemeliharaan_kosong2 = $_POST['pemeliharaan_kosong2'] ?? '';
$pemeliharaan_kosong3 = $_POST['pemeliharaan_kosong3'] ?? '';
$pemeliharaan_kosong4 = $_POST['pemeliharaan_kosong4'] ?? '';
$pemeliharaan_kosong5 = $_POST['pemeliharaan_kosong5'] ?? '';

// Deskripsi
$deskripsi1 = $_POST['deskripsi1'] ?? '';
$deskripsi2 = $_POST['deskripsi2'] ?? '';
$deskripsi3 = $_POST['deskripsi3'] ?? '';
$deskripsi4 = $_POST['deskripsi4'] ?? '';
$deskripsi5 = $_POST['deskripsi5'] ?? '';

// Jumlah
$jumlah1 = $_POST['jumlah1'] ?? '';
$jumlah2 = $_POST['jumlah2'] ?? '';
$jumlah3 = $_POST['jumlah3'] ?? '';
$jumlah4 = $_POST['jumlah4'] ?? '';
$jumlah5 = $_POST['jumlah5'] ?? '';

// Query untuk menyimpan data
$sql = "INSERT INTO electrical_engine 
    (tanggal, waktu, nama_mesin, running_hour,
kondisi_motor1, keterangan_motor1, kondisi_motor2, keterangan_motor2, kondisi_motor3, keterangan_motor3, 
        kondisi_motor4, keterangan_motor4, kondisi_motor5, keterangan_motor5, kondisi_motor6, keterangan_motor6, 
        kondisi_motor7, keterangan_motor7, kondisi_motor8, keterangan_motor8, pemeliharaan_motor1, pemeliharaan_motor2,
kondisi_pompa1, keterangan_pompa1, kondisi_pompa2, keterangan_pompa2, kondisi_pompa3, keterangan_pompa3, 
        kondisi_pompa4, keterangan_pompa4, kondisi_pompa5, keterangan_pompa5, kondisi_pompa6, keterangan_pompa6, 
        kondisi_pompa7, keterangan_pompa7, kondisi_pompa8, keterangan_pompa8, kondisi_pompa9, keterangan_pompa9, kondisi_pompa10, keterangan_pompa10, pemeliharaan_pompa1, pemeliharaan_pompa2,
kondisi_aksesoris1, keterangan_aksesoris1, kondisi_aksesoris2, keterangan_aksesoris2, kondisi_aksesoris3, keterangan_aksesoris3, 
        kondisi_aksesoris4, keterangan_aksesoris4, kondisi_aksesoris5, keterangan_aksesoris5, kondisi_aksesoris6, keterangan_aksesoris6, 
        kondisi_aksesoris7, keterangan_aksesoris7, pemeliharaan_aksesoris,
kondisi_gearbox1, keterangan_gearbox1, kondisi_gearbox2, keterangan_gearbox2, kondisi_gearbox3, keterangan_gearbox3, 
        kondisi_gearbox4, keterangan_gearbox4, kondisi_gearbox5, keterangan_gearbox5, kondisi_gearbox6, keterangan_gearbox6, 
        kondisi_gearbox7, keterangan_gearbox7, pemeliharaan_gearbox1, pemeliharaan_gearbox2,
deskripsi1, deskripsi2, deskripsi3, deskripsi4, deskripsi5,
        jumlah1, jumlah2, jumlah3, jumlah4, jumlah5,
kebutuhan_material, korektif,
        checkbox_motor1, checkbox_motor2, checkbox_motor3, checkbox_motor4, checkbox_motor5, checkbox_motor6, checkbox_motor7, checkbox_motor8,
        checkbox_pompa1, checkbox_pompa2, checkbox_pompa3, checkbox_pompa4, checkbox_pompa5, checkbox_pompa6, checkbox_pompa7, checkbox_pompa8, checkbox_pompa9, checkbox_pompa10,
        checkbox_aksesoris1, checkbox_aksesoris2, checkbox_aksesoris3, checkbox_aksesoris4, checkbox_aksesoris5, checkbox_aksesoris6, checkbox_aksesoris7,
        checkbox_gearbox1, checkbox_gearbox2, checkbox_gearbox3, checkbox_gearbox4, checkbox_gearbox5, checkbox_gearbox6, checkbox_gearbox7
    )
    VALUES (:tanggal, :waktu, :nama_mesin, :paket,
:kondisi_motor1, :keterangan_motor1, :kondisi_motor2, :keterangan_motor2, :kondisi_motor3, :keterangan_motor3, 
        :kondisi_motor4, :keterangan_motor4, :kondisi_motor5, :keterangan_motor5, :kondisi_motor6, :keterangan_motor6, 
        :kondisi_motor7, :keterangan_motor7, :kondisi_motor8, :keterangan_motor8, :pemeliharaan_motor1, :pemeliharaan_motor2,
:kondisi_pompa1, :keterangan_pompa1, :kondisi_pompa2, :keterangan_pompa2, :kondisi_pompa3, :keterangan_pompa3, 
        :kondisi_pompa4, :keterangan_pompa4, :kondisi_pompa5, :keterangan_pompa5, :kondisi_pompa6, :keterangan_pompa6, 
        :kondisi_pompa7, :keterangan_pompa7, :kondisi_pompa8, :keterangan_pompa8, :kondisi_pompa9, :keterangan_pompa9, :kondisi_pompa10, :keterangan_pompa10, :pemeliharaan_pompa1, :pemeliharaan_pompa2,
:kondisi_aksesoris1, :keterangan_aksesoris1, :kondisi_aksesoris2, :keterangan_aksesoris2, :kondisi_aksesoris3, :keterangan_aksesoris3, 
        :kondisi_aksesoris4, :keterangan_aksesoris4, :kondisi_aksesoris5, :keterangan_aksesoris5, :kondisi_aksesoris6, :keterangan_aksesoris6, 
        :kondisi_aksesoris7, :keterangan_aksesoris7, :pemeliharaan_aksesoris,
:kondisi_gearbox1, :keterangan_gearbox1, :kondisi_gearbox2, :keterangan_gearbox2, :kondisi_gearbox3, :keterangan_gearbox3, 
        :kondisi_gearbox4, :keterangan_gearbox4, :kondisi_gearbox5, :keterangan_gearbox5, :kondisi_gearbox6, :keterangan_gearbox6, 
        :kondisi_gearbox7, :keterangan_gearbox7, :pemeliharaan_gearbox1, :pemeliharaan_gearbox2,
:deskripsi1, :deskripsi2, :deskripsi3, :deskripsi4, :deskripsi5, :deskripsi6, :deskripsi7, :deskripsi8, :deskripsi9, :deskripsi10,
        :jumlah1, :jumlah2, :jumlah3, :jumlah4, :jumlah5, :jumlah6, :jumlah7, :jumlah8, :jumlah9, :jumlah10,
:kebutuhan_material ,:korektif,
        :checkbox_motor1, :checkbox_motor2, :checkbox_motor3, :checkbox_motor4, :checkbox_motor5, :checkbox_motor6, :checkbox_motor7, :checkbox_motor8,
        :checkbox_pompa1, :checkbox_pompa2, :checkbox_pompa3, :checkbox_pompa4, :checkbox_pompa5, :checkbox_pompa6, :checkbox_pompa7, :checkbox_pompa8, :checkbox_pompa9, :checkbox_pompa10,
        :checkbox_aksesoris1, :checkbox_aksesoris2, :checkbox_aksesoris3, :checkbox_aksesoris4, :checkbox_aksesoris5, :checkbox_aksesoris6, :checkbox_aksesoris7,
        :checkbox_gearbox1, :checkbox_gearbox2, :checkbox_gearbox3, :checkbox_gearbox4, :checkbox_gearbox5, :checkbox_gearbox6, :checkbox_gearbox7
    )";

// Menggunakan PDO untuk menyiapkan dan mengeksekusi query
$stmt = $pdo->prepare($sql);

// Mengikat nilai untuk setiap placeholder
$stmt->bindParam(':tanggal', $tanggal);
$stmt->bindParam(':waktu', $waktu);
$stmt->bindParam(':nama_mesin', $nama_mesin);
$stmt->bindParam(':Running_Hour', $Running_Hour);

// Motor
$stmt->bindParam(':kondisi_motor1', $kondisi_motor1);
$stmt->bindParam(':keterangan_motor1', $keterangan_motor1);
$stmt->bindParam(':kondisi_motor2', $kondisi_motor2);
$stmt->bindParam(':keterangan_motor2', $keterangan_motor2);
$stmt->bindParam(':kondisi_motor3', $kondisi_motor3);
$stmt->bindParam(':keterangan_motor3', $keterangan_motor3);
$stmt->bindParam(':kondisi_motor4', $kondisi_motor4);
$stmt->bindParam(':keterangan_motor4', $keterangan_motor4);
$stmt->bindParam(':kondisi_motor5', $kondisi_motor5);
$stmt->bindParam(':keterangan_motor5', $keterangan_motor5);
$stmt->bindParam(':kondisi_motor6', $kondisi_motor6);
$stmt->bindParam(':keterangan_motor6', $keterangan_motor6);
$stmt->bindParam(':kondisi_motor7', $kondisi_motor7);
$stmt->bindParam(':keterangan_motor7', $keterangan_motor7);
$stmt->bindParam(':kondisi_motor8', $kondisi_motor8);
$stmt->bindParam(':keterangan_motor8', $keterangan_motor8);

// Pompa
$stmt->bindParam(':kondisi_pompa1', $kondisi_pompa1);
$stmt->bindParam(':keterangan_pompa1', $keterangan_pompa1);
$stmt->bindParam(':kondisi_pompa2', $kondisi_pompa2);
$stmt->bindParam(':keterangan_pompa2', $keterangan_pompa2);
$stmt->bindParam(':kondisi_pompa3', $kondisi_pompa3);
$stmt->bindParam(':keterangan_pompa3', $keterangan_pompa3);
$stmt->bindParam(':kondisi_pompa4', $kondisi_pompa4);
$stmt->bindParam(':keterangan_pompa4', $keterangan_pompa4);
$stmt->bindParam(':kondisi_pompa5', $kondisi_pompa5);
$stmt->bindParam(':keterangan_pompa5', $keterangan_pompa5);
$stmt->bindParam(':kondisi_pompa6', $kondisi_pompa6);
$stmt->bindParam(':keterangan_pompa6', $keterangan_pompa6);
$stmt->bindParam(':kondisi_pompa7', $kondisi_pompa7);
$stmt->bindParam(':keterangan_pompa7', $keterangan_pompa7);
$stmt->bindParam(':kondisi_pompa8', $kondisi_pompa8);
$stmt->bindParam(':keterangan_pompa8', $keterangan_pompa8);
$stmt->bindParam(':kondisi_pompa9', $kondisi_pompa9);
$stmt->bindParam(':keterangan_pompa9', $keterangan_pompa9);
$stmt->bindParam(':kondisi_pompa10', $kondisi_pompa10);
$stmt->bindParam(':keterangan_pompa10', $keterangan_pompa10);

// aksesoris
$stmt->bindParam(':kondisi_aksesoris1', $kondisi_aksesoris1);
$stmt->bindParam(':keterangan_aksesoris1', $keterangan_aksesoris1);
$stmt->bindParam(':kondisi_aksesoris2', $kondisi_aksesoris2);
$stmt->bindParam(':keterangan_aksesoris2', $keterangan_aksesoris2);
$stmt->bindParam(':kondisi_aksesoris3', $kondisi_aksesoris3);
$stmt->bindParam(':keterangan_aksesoris3', $keterangan_aksesoris3);
$stmt->bindParam(':kondisi_aksesoris4', $kondisi_aksesoris4);
$stmt->bindParam(':keterangan_aksesoris4', $keterangan_aksesoris4);
$stmt->bindParam(':kondisi_aksesoris5', $kondisi_aksesoris5);
$stmt->bindParam(':keterangan_aksesoris5', $keterangan_aksesoris5);
$stmt->bindParam(':kondisi_aksesoris6', $kondisi_aksesoris6);
$stmt->bindParam(':keterangan_aksesoris6', $keterangan_aksesoris6);
$stmt->bindParam(':kondisi_aksesoris7', $kondisi_aksesoris7);
$stmt->bindParam(':keterangan_aksesoris7', $keterangan_aksesoris7);

// gearbox
$stmt->bindParam(':kondisi_gearbox1', $kondisi_gearbox1);
$stmt->bindParam(':keterangan_gearbox1', $keterangan_gearbox1);
$stmt->bindParam(':kondisi_gearbox2', $kondisi_gearbox2);
$stmt->bindParam(':keterangan_gearbox2', $keterangan_gearbox2);
$stmt->bindParam(':kondisi_gearbox3', $kondisi_gearbox3);
$stmt->bindParam(':keterangan_gearbox3', $keterangan_gearbox3);
$stmt->bindParam(':kondisi_gearbox4', $kondisi_gearbox4);
$stmt->bindParam(':keterangan_gearbox4', $keterangan_gearbox4);
$stmt->bindParam(':kondisi_gearbox5', $kondisi_gearbox5);
$stmt->bindParam(':keterangan_gearbox5', $keterangan_gearbox5);
$stmt->bindParam(':kondisi_gearbox6', $kondisi_gearbox6);
$stmt->bindParam(':keterangan_gearbox6', $keterangan_gearbox6);
$stmt->bindParam(':kondisi_gearbox7', $kondisi_gearbox7);
$stmt->bindParam(':keterangan_gearbox7', $keterangan_gearbox7);

// deskripsi
$stmt->bindParam(':deskripsi1', $deskripsi1);
$stmt->bindParam(':deskripsi2', $deskripsi2);
$stmt->bindParam(':deskripsi3', $deskripsi3);
$stmt->bindParam(':deskripsi4', $deskripsi4);
$stmt->bindParam(':deskripsi5', $deskripsi5);
$stmt->bindParam(':deskripsi6', $deskripsi6);
$stmt->bindParam(':deskripsi7', $deskripsi7);
$stmt->bindParam(':deskripsi8', $deskripsi8);
$stmt->bindParam(':deskripsi9', $deskripsi9);
$stmt->bindParam(':deskripsi10', $deskripsi10);

// jumlah
$stmt->bindParam(':jumlah1', $jumlah1);
$stmt->bindParam(':jumlah2', $jumlah2);
$stmt->bindParam(':jumlah3', $jumlah3);
$stmt->bindParam(':jumlah4', $jumlah4);
$stmt->bindParam(':jumlah5', $jumlah5);
$stmt->bindParam(':jumlah6', $jumlah6);
$stmt->bindParam(':jumlah7', $jumlah7);
$stmt->bindParam(':jumlah8', $jumlah8);
$stmt->bindParam(':jumlah9', $jumlah9);
$stmt->bindParam(':jumlah10', $jumlah10);

// checkbox_motor
$stmt->bindParam(':checkbox_motor1', $checkbox_motor1);
$stmt->bindParam(':checkbox_motor2', $checkbox_motor2);
$stmt->bindParam(':checkbox_motor3', $checkbox_motor3);
$stmt->bindParam(':checkbox_motor4', $checkbox_motor4);
$stmt->bindParam(':checkbox_motor5', $checkbox_motor5);
$stmt->bindParam(':checkbox_motor6', $checkbox_motor6);
$stmt->bindParam(':checkbox_motor7', $checkbox_motor7);
$stmt->bindParam(':checkbox_motor8', $checkbox_motor8);

// checkbox_pompa
$stmt->bindParam(':checkbox_pompa1', $checkbox_pompa1);
$stmt->bindParam(':checkbox_pompa2', $checkbox_pompa2);
$stmt->bindParam(':checkbox_pompa3', $checkbox_pompa3);
$stmt->bindParam(':checkbox_pompa4', $checkbox_pompa4);
$stmt->bindParam(':checkbox_pompa5', $checkbox_pompa5);
$stmt->bindParam(':checkbox_pompa6', $checkbox_pompa6);
$stmt->bindParam(':checkbox_pompa7', $checkbox_pompa7);
$stmt->bindParam(':checkbox_pompa8', $checkbox_pompa8);
$stmt->bindParam(':checkbox_pompa9', $checkbox_pompa9);
$stmt->bindParam(':checkbox_pompa10', $checkbox_pompa10);

// checkbox_aksesoris
$stmt->bindParam(':checkbox_aksesoris1', $checkbox_aksesoris1);
$stmt->bindParam(':checkbox_aksesoris2', $checkbox_aksesoris2);
$stmt->bindParam(':checkbox_aksesoris3', $checkbox_aksesoris3);
$stmt->bindParam(':checkbox_aksesoris4', $checkbox_aksesoris4);
$stmt->bindParam(':checkbox_aksesoris5', $checkbox_aksesoris5);
$stmt->bindParam(':checkbox_aksesoris6', $checkbox_aksesoris6);
$stmt->bindParam(':checkbox_aksesoris7', $checkbox_aksesoris7);

// checkbox_gearbox
$stmt->bindParam(':checkbox_gearbox1', $checkbox_gearbox1);
$stmt->bindParam(':checkbox_gearbox2', $checkbox_gearbox2);
$stmt->bindParam(':checkbox_gearbox3', $checkbox_gearbox3);
$stmt->bindParam(':checkbox_gearbox4', $checkbox_gearbox4);
$stmt->bindParam(':checkbox_gearbox5', $checkbox_gearbox5);
$stmt->bindParam(':checkbox_gearbox6', $checkbox_gearbox6);
$stmt->bindParam(':checkbox_gearbox7', $checkbox_gearbox7);

$stmt->bindParam(':kebutuhan_material', $kebutuhan_material);
$stmt->bindParam(':korektif', $korektif);

$stmt->bindParam(':pemeliharaan_motor1', $pemeliharaan_motor1);
$stmt->bindParam(':pemeliharaan_motor2', $pemeliharaan_motor2);

$stmt->bindParam(':pemeliharaan_pompa1', $pemeliharaan_pompa1);
$stmt->bindParam(':pemeliharaan_pompa2', $pemeliharaan_pompa2);

$stmt->bindParam(':pemeliharaan_gearbox1', $pemeliharaan_gearbox1);
$stmt->bindParam(':pemeliharaan_gearbox2', $pemeliharaan_gearbox2);

$stmt->bindParam(':pemeliharaan_aksesoris', $pemeliharaan_aksesoris);

// Eksekusi query database
if ($stmt->execute()) {
        // Data berhasil disimpan, sekarang include file PDF
        include './tcpdf.php';

        // Menampilkan alert menggunakan JavaScript
        echo "<script>
                alert('Data berhasil disimpan.');
                window.location.href = 'pump.php?token=" . urlencode($_SESSION['token']) . "';
              </script>";
        exit; // Pastikan tidak ada output lainnya setelah header
} else {
        // Menangani jika terjadi kesalahan
        echo "Gagal menyimpan data: " . $stmt->errorInfo()[2];
}
