<?php
//menampilkan data PHP
require 'db.php'; // database

$stmt = $pdo->query('SELECT * FROM users'); // Mengambil semua data dari tabel 'users'
$users = $stmt->fetchAll(); // Menyimpan hasilnya dalam array
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Menyertakan Bootstrap -->
</head>
<body class="container my-5">
    <h1 class="mb-4">User List</h1>
    <a href="create.php" class="btn btn-primary mb-3">Create New User</a>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th> <!-- menampilkan ID -->
                <th>Name</th> <!-- menampilkan nama -->
                <th>Email</th> <!-- menampilkan email -->
                <th>Actions</th> <!-- menampilkan Actions -->
            </tr>
        </thead>
        <tbody>

<!-- mengintegrasikan elemen dalam array dan objek -->
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id']; ?></td> <!-- menjalankan query id nama dan email sesuai isi pengguna -->
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>

            <!-- mengarahkan fungsi edit dan delete -->
                    <a href="edit.php?id=<?= $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('seriusan yakin?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
