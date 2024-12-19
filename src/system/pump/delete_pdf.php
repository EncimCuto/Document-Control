<?php
// Pastikan untuk menyertakan koneksi database
require_once '../../config/config5.php'; // Menggunakan MySQLi

// Periksa apakah ID dikirim melalui GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Konversi ID menjadi integer

    // Siapkan perintah SQL untuk menghapus data berdasarkan ID
    $sql_delete = "DELETE FROM pump_pdf WHERE id = ?";
    $stmt_delete = $conn->prepare($sql_delete); // Menggunakan MySQLi prepare
    $stmt_delete->bind_param("i", $id); // Bind parameter ID

    if ($stmt_delete->execute()) {
        // Jika penghapusan berhasil, redirect dengan status
        header('Location: ../../pages/Maintenance/1-Pump/list_pdf.php?status=deleted');
        exit;
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo "Gagal menghapus data.";
    }
    $stmt_delete->close(); // Tutup statement
} else {
    echo "ID tidak valid.";
}
$conn->close(); // Tutup koneksi
