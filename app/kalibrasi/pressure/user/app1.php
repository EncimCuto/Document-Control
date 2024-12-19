<?php
// koneksi
require_once '../../../../src/config/config2.php';
// menyimpan data ke session
$username = $_SESSION['username'] ?? '';
$bagian = $_SESSION['bagian'] ?? '';
// ambil data dari url
$username = $_GET['username'] ?? $username;
$bagian = $_GET['bagian'] ?? $bagian;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ids']) && is_array($_POST['ids'])) {
        $ids = $_POST['ids'];
        
        $escapedIds = array_map(function($id) use ($conn) {
            return $conn->real_escape_string($id);
        }, $ids);
        
        $idsString = "'" . implode("','", $escapedIds) . "'";
        $name = $username;

        $sql = "SELECT img FROM assets LIMIT 1";
        $stmt_select = $conn->prepare($sql);

        if ($stmt_select) {
            $stmt_select->execute();
            $result = $stmt_select->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $img = $row['img'];

                if (is_null($img)) {
                    echo "Gambar tidak ditemukan.<br>";
                } else {
                    $conn->begin_transaction();
                    try {
                        // Daftar tabel sing arep diupdate
                        $tables = [
                            "pressure_handover",
                            "temprature_handover",
                            "volumetrik_handover",
                            "instrument_handover",
                            "balance_handover"
                        ];

                        // Looping kanggo update kabeh tabel
                        foreach ($tables as $table) {
                            $sql_update = "UPDATE $table SET app4 = ?, user = ? WHERE id IN ($idsString)";
                            $stmt_update = $conn->prepare($sql_update);
                            if (!$stmt_update) {
                                throw new Exception("Prepare statement gagal kanggo tabel $table: " . $conn->error);
                            }
                            $stmt_update->bind_param("ss", $img, $name);
                            $stmt_update->execute();
                        }

                        // Commit transaksi
                        $conn->commit();

                        header("Location: http://10.11.11.199/dokument-control/app/kalibrasi/pressure/user/belumapprove.php?username=" . urlencode($username) . "&bagian=" . urlencode($bagian));
                        exit();
                    } catch (Exception $e) {
                        $conn->rollback();
                        echo "Terjadi kesalahan: " . $e->getMessage();
                    }
                }
            } else {
                echo "Tidak ada gambar yang ditemukan di tabel assets.";
            }
            $stmt_select->close();
        } else {
            echo "Gagal menyiapkan statement select: " . $conn->error;
        }
        $conn->close();
    }
}
?>