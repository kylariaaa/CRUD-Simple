<?php
require 'db.php'; //menghubungkan dengan database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare('INSERT INTO users (name, email) VALUES (?, ?)'); //query untuk insert data
    $stmt->execute([$name, $email]); // jalankan query

    header('Location: index.php'); //redirect ketika berhasil ditambahkan ke halaman index
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- menambahkan Bootstrap -->
</head>
<body class="container my-5">
    <h1 class="mb-4">Create New User</h1> <!-- Tombil untuk membuat pengguna baru -->
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" required> <!-- input nama -->
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required> <!-- input email -->
        </div>
        <button type="submit" class="btn btn-success">Create</button> <!-- Tombol buat jika sudah yakin -->
        <a href="index.php" class="btn btn-secondary">Back</a> <!-- tombol untuk diaarahkan kehalaman utama ketika tidak yakin -->
    </form>
</body>
</html>
