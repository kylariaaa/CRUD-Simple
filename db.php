<?php
// koneksi dengan DB
$host = 'localhost';
$db   = 'simple_crud';
$user = 'root'; // Sesuaikan dengan username MySQL yang dimiliki
$pass = '';     // Sesuaikan dengan password MySQL yang dimiliki
$charset = 'utf8mb4';

//untuk mengidentifikasikan tipe database
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  //untuk menampilkan error
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  //untuk menampilkan data dalam bentuk array
    PDO::ATTR_EMULATE_PREPARES   => false, //untuk memberikan kejalasan error yang lebih jelas
];

try {
//PDO PHP Data Object
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
