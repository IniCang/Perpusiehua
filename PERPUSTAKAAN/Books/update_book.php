<?php
include '../connection/connection.php';

if ($_POST) {
    $id = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];
    $stok = $_POST['stok'];

    $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit',
            tahun_terbit='$tahun', genre='$genre', stok='$stok' WHERE id_buku=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data buku berhasil diperbarui'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
