<?php
global $pdo;
$createTableSql = "
    CREATE TABLE IF NOT EXISTS temperatures (
        id INT AUTO_INCREMENT PRIMARY KEY,
        value FLOAT,
        collectionDate DATETIME
    )
";

$value = rand(0, 30);
$collectionDate = date('Y-m-d H:i:s');
$insertSql = "INSERT INTO temperatures(value, collectionDate) VALUES (:value, :collectionDate)";
$createStmt = $pdo->prepare($createTableSql);
$stmt = $pdo->prepare($insertSql);
$stmt->bindParam(':value', $value);
$stmt->bindParam(':collectionDate', $collectionDate);

if (!$createStmt->execute() && !$stmt->execute()) {
    header("location:../module-registration.php");
}



