<?php
include '../connection/connection.php';

$id = $_GET['id_user'] ?? null;
if (!$id) {
    echo "<script>alert('ID user tidak ditemukan'); window.location.href='index.php';</script>";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE id_user=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "<script>alert('Data user tidak ditemukan'); window.location.href='index.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'];

    $stmt = $conn->prepare("UPDATE users SET nama=?, email=?, password=? WHERE id_user=?");
    $stmt->bind_param("sssi", $nama, $email, $password, $id);

    if ($stmt->execute()) {
        echo "<script>alert('User berhasil diperbarui'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo $user['nama']; ?>" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>

        <label>Password (kosongkan jika tidak diubah):</label>
        <input type="password" name="password"><br><br>

        <input type="submit" value="Simpan Perubahan">
    </form>
    <a href="index.php">Batal</a>
</body>
</html>
