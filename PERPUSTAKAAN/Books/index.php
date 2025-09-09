<?php include '../connection/connection.php'; ?>
<html>
<head>
    <title>Daftar Buku</title>
    <style>
        table { width: 80%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background: #f4f4f4; }
        a.btn { padding: 5px 10px; border-radius: 4px; text-decoration: none; }
        .edit { background: #3498db; color: white; }
        .delete { background: #e74c3c; color: white; }
        .add { background: #2ecc71; color: white; display: inline-block; margin: 20px auto; }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Daftar Buku Perpustakaan</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Genre</th>
            <th>Stok</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        $sql = "SELECT * FROM buku";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id_buku']."</td>
                        <td>".$row['judul']."</td>
                        <td>".$row['penulis']."</td>
                        <td>".$row['penerbit']."</td>
                        <td>".$row['tahun_terbit']."</td>
                        <td>".$row['genre']."</td>
                        <td>".$row['stok']."</td>
                        <td><a class='btn edit' href='edit_book.php?id_buku=".$row['id_buku']."'>Edit</a></td>
                        <td><a class='btn delete' href='delete_book.php?id_buku=".$row['id_buku']."' onclick=\"return confirm('Yakin ingin menghapus buku ini?');\">Hapus</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Tidak ada buku tersedia</td></tr>";
        }
        ?>
    </table>
    <div style="text-align:center;">
        <a class="btn add" href="add_book.php">Tambah Buku Baru</a>
    </div>
</body>
</html>
