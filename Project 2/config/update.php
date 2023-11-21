<?php
include '../koneksi/koneksi.php';

header('Content-Type: application/json');

// Memperbarui data
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    parse_str(file_get_contents("php://input"), $input);

    $id = $input['id'] ?? '';
    $nama = $input['nama'] ?? '';
    $nim = $input['nim'] ?? '';
    $jurusan = $input['jurusan'] ?? '';


    if (!empty($id) && !empty($nama) && !empty($nim) && !empty($jurusan)) {
        try {

            $stmt = $conn->prepare('UPDATE mahasiswa SET nama=?, nim=?, jurusan=? WHERE id=?');
            $stmt->execute([$nama, $nim, $jurusan, $id]);

            echo json_encode(['message' => 'Data berhasil diperbarui']);
        } catch (PDOException $e) {

            http_response_code(500); 
            echo json_encode(['message' => 'Gagal memperbarui data. ' . $e->getMessage()]);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Gagal memperbarui data. Pastikan semua field terisi.']);
    }
}
?>
