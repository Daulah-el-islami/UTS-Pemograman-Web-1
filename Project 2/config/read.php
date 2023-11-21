<?php
include '../koneksi/koneksi.php';

header('Content-Type: application/json');

// Membaca data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $conn->query('SELECT * FROM mahasiswa');
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}
?>
