<?php

$dsn = 'mysql:host=127.0.0.1;dbname=webreathe;charset=utf8';
$username = 'root';
$password = 'rootroot';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection error with the database : " . $e->getMessage();
    exit();
}
