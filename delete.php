<?php
require 'db.php'; // mengubungkan dengan database

$id = $_GET['id']; // mengambil id dari URL

$stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');  //persiapan query untuk menghapus id
$stmt->execute([$id]); // jalankan perintar penghapusan

header('Location: index.php'); //setelah berhasil dikembalikan ke index
?>
