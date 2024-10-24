<?php
require 'db.php'; // menghubungkan dengan database

$id = $_GET['id']; // mengambil id dari url

$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?'); // query untuk mengambil data berdasarkan ID
$stmt->execute([$id]); //menjalankan query
$user = $stmt->fetch(); // menampilkan hasil query

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare('UPDATE users SET name = ?, email = ? WHERE id = ?'); //query untuk update data
    $stmt->execute([$name, $email, $id]); // jalankan query

    header('Location: index.php'); // Redirect ke halaman index setelah 'berhasil' update
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- menambahkan bootstrap -->
</head>
<body class="container my-5">
    <h1 class="mb-4">Edit User</h1>
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" value="<?= $user['name']; ?>" class="form-control" required> <!-- input nama -->
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" value="<?= $user['email']; ?>" class="form-control" required> <!-- input email -->
        </div>
        <button type="submit" class="btn btn-warning">Update</button> <!-- Tombol Submit -->
        <a href="index.php" class="btn btn-secondary">Back</a> <!-- Tombol kemabali ke index -->
    </form>
</body>
</html>
