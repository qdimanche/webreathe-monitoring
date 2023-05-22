<?php
global $pdo;
$createTableSql = "
    CREATE TABLE IF NOT EXISTS brightnesses (
        id INT AUTO_INCREMENT PRIMARY KEY,
        value FLOAT,
        collectionDate DATETIME,
        moduleId VARCHAR(50)                                 
    )
";
$value = rand(10, 20000) / 10.0;
$collectionDate = date('Y-m-d H:i:s');
$insertSql = "INSERT INTO brightnesses(value, collectionDate, moduleId) VALUES (:value, :collectionDate, :moduleId)";
$createStmt = $pdo->prepare($createTableSql);
$stmt = $pdo->prepare($insertSql);
$stmt->bindParam(':value', $value);
$stmt->bindParam(':collectionDate', $collectionDate);
$stmt->bindParam(':moduleId', $moduleId);
