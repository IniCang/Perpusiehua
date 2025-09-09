<?php include '../connection/connection.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar User</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #f4f4f4;
        }
        a.btn {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            color: white;
        }
        a.edit { background: #3498db; }
        a.delete { background: #e74c3c; }
        a.add { background: #2ecc71; display:block; width:150px; margin:20px auto; text-align:center; }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Daftar User</h1>
    <a href="add_user.php" class="btn add">Tambah User Baru</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id_user']."</td>
                        <td>".$row['nama']."</td>
                        <td>".$row['email']."</td>
                        <td><a href='edit_user.php?id_user=".$row['id_user']."' class='btn edit'>Edit</a></td>
                        <td><a href='remove_user.php?id_user=".$row['id_user']."' class='btn delete' onclick=\"return confirm('Yakin ingin menghapus user ini?');\">Hapus</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada user tersedia</td></tr>";
        }
        ?>
    </table>
</body>
</html>
