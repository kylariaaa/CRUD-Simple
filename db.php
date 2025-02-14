<?php
// koneksi dengan DB
$host = 'localhost';
$db   = 'simple_crud';
$user = 'root'; // Sesuaikan dengan username MySQL yang dimiliki
$pass = '';     // Sesuaikan dengan password MySQL yang dimiliki
$charset = 'utf8mb4';

//untuk mengidentifikasikan tipe database menggunakan PDO
$dsn = "mysql:host=$host;dbname=$db;charset=$charset"; //mengambil dari database yang sudah dimasukan
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  //untuk menampilkan error
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  //untuk menampilkan data dalam bentuk array
    PDO::ATTR_EMULATE_PREPARES   => false, //untuk memberikan kejalasan error yang lebih jelas
];

try {
//PDO PHP Data Object, PDO untuk melakukan operasi database
    $pdo = new PDO($dsn, $user, $pass, $options); //membuat koneksi ke database menggunakan PDO
} catch (\PDOException $e) {
    //untuk menangani EROR
    throw new \PDOException($e->getMessage(), (int)$e->getCode()); //tampilkan ulang Exception dengan pesan eror
}
?>
