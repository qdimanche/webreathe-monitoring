<?php
global $pdo;
require_once "../../config/database.php";
date_default_timezone_set('Europe/Paris');

$createTableSql = "
    CREATE TABLE IF NOT EXISTS vibrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        value FLOAT,
        collectionDate DATETIME
    )
";
$value = rand(10, 200) / 10.0;
$collectionDate = date('Y-m-d H:i:s');
$insertSql = "INSERT INTO vibrations(value, collectionDate) VALUES (:value, :collectionDate)";

$createStmt = $pdo->prepare($createTableSql);
$stmt = $pdo->prepare($insertSql);
$stmt->bindParam(':value', $value);
$stmt->bindParam(':collectionDate', $collectionDate);

$createStmt->execute();
$stmt->execute();
