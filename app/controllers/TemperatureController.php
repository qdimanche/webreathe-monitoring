<?php
global $pdo;
require_once "/Applications/MAMP/htdocs/Webreathe/config/database.php";
date_default_timezone_set('Europe/Paris');

$createTableSql = "
    CREATE TABLE IF NOT EXISTS temperatures (
        id INT AUTO_INCREMENT PRIMARY KEY,
        value FLOAT,
        collectionDate DATETIME                                                                                            
    )
";

$value = rand(1, 400) / 10.0;
$collectionDate = date('Y-m-d H:i:s');
$insertSql = "INSERT INTO temperatures(value, collectionDate) VALUES (:value, :collectionDate)";
$createStmt = $pdo->prepare($createTableSql);
$stmt = $pdo->prepare($insertSql);
$stmt->bindParam(':value', $value);
$stmt->bindParam(':collectionDate', $collectionDate);

$createStmt->execute();
$stmt->execute();


