<?php
include '../koneksi/koneksi.php';

header('Content-Type: application/json');

// Menambah data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];


    if (!empty($nama) && !empty($nim) && !empty($jurusan)) {
        try {

            $stmt = $conn->prepare('INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (?, ?, ?)');
            $stmt->execute([$nama, $nim, $jurusan]);

            echo json_encode(['message' => 'Data berhasil ditambahkan']);
        } catch (PDOException $e) {

            http_response_code(500); 
            echo json_encode(['message' => 'Gagal menambahkan data. ' . $e->getMessage()]);
        }
    } else {
        http_response_code(400); 
        echo json_encode(['message' => 'Gagal menambahkan data. Pastikan semua field terisi.']);
    }
}
?>
