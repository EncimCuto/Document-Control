<?php
include 'config2.php';

$id = $_GET['id'];
$sql = "SELECT * FROM massa_balance WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(array());
}
$conn->close();
?>
