<?php
include '../connection/connection.php';

$id = $_GET['id_buku'] ?? null;

if ($id) {
    $sql = "DELETE FROM buku WHERE id_buku=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Buku berhasil dihapus'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php';</script>";
}
?>
