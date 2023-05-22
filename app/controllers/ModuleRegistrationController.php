<?php
global $pdo;
require_once "../../config/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $createTableSql = "
    CREATE TABLE IF NOT EXISTS modules (
        id INT AUTO_INCREMENT PRIMARY KEY,
        type VARCHAR(100)
    )
    ";

    $type = $_POST["type"];
    $insertSql = "INSERT INTO modules(type) VALUES (:type)";
    $createStmt = $pdo->prepare($createTableSql);
    $insertStmt = $pdo->prepare($insertSql);
    $insertStmt->bindParam(':type', $type);

    if ($createStmt->execute() && $insertStmt->execute()) {
        header("location:../../index.php");
    } else {
        header("location:../module-registration.php");
    }

    if ($type == "temperature") {
        require_once(__DIR__ . "/TemperatureController.php");
    }
}
