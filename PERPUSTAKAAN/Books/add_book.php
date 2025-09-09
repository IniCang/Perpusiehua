<?php include '../connection/connection.php'; ?>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
    <h2>Tambah Buku Baru</h2>
    <form method="POST">
        Judul: <input type="text" name="judul" required><br>
        Penulis: <input type="text" name="penulis" required><br>
        Penerbit: <input type="text" name="penerbit" required><br>
        Tahun Terbit: <input type="number" name="tahun_terbit" required><br>
        Genre: <input type="text" name="genre" required><br>
        Stok: <input type="number" name="stok" required><br>
        <input type="submit" name="submit" value="Tambah Buku">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun_terbit'];
        $genre = $_POST['genre'];
        $stok = $_POST['stok'];

        $sql = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, genre, stok)
                VALUES ('$judul','$penulis','$penerbit','$tahun','$genre','$stok')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Buku berhasil ditambahkan'); window.location.href='index.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</body>
</html>
