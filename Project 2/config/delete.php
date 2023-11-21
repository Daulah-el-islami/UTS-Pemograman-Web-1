<?php
include '../koneksi/koneksi.php';

header('Content-Type: application/json');

// Menghapus data
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    $data = json_decode(file_get_contents('php://input'), true);


    if (!empty($data['id'])) {
        $id = $data['id'];

        try {

            $stmt = $conn->prepare('DELETE FROM mahasiswa WHERE id=?');
            $stmt->execute([$id]);

            echo json_encode(['message' => 'Data berhasil dihapus']);
        } catch (PDOException $e) {

            http_response_code(500);
            echo json_encode(['message' => 'Gagal menghapus data. ' . $e->getMessage()]);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Gagal menghapus data. ID tidak valid.']);
    }
}
?>
