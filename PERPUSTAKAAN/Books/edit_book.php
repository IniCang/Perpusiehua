<?php
include '../connection/connection.php';

$id = $_GET['id_buku'] ?? null;
if (!$id) {
    echo "<script>alert('ID buku tidak ditemukan'); window.location.href='index.php';</script>";
    exit;
}

$result = $conn->query("SELECT * FROM buku WHERE id_buku=$id");
$book = $result->fetch_assoc();
?>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>
    <h2>Edit Data Buku</h2>
    <form method="POST" action="update_book.php">
        <input type="hidden" name="id_buku" value="<?php echo $book['id_buku']; ?>">
        Judul: <input type="text" name="judul" value="<?php echo $book['judul']; ?>" required><br>
        Penulis: <input type="text" name="penulis" value="<?php echo $book['penulis']; ?>" required><br>
        Penerbit: <input type="text" name="penerbit" value="<?php echo $book['penerbit']; ?>" required><br>
        Tahun Terbit: <input type="number" name="tahun_terbit" value="<?php echo $book['tahun_terbit']; ?>" required><br>
        Genre: <input type="text" name="genre" value="<?php echo $book['genre']; ?>" required><br>
        Stok: <input type="number" name="stok" value="<?php echo $book['stok']; ?>" required><br>
        <button type="submit">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
