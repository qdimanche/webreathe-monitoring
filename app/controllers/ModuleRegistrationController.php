<?php
global $pdo;
require_once "../../config/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $createTableSql = "
        CREATE TABLE IF NOT EXISTS modules (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100),
            type VARCHAR(100)
        )
    ";

    $type = $_POST["type"];
    $name = $_POST["name"];
    $status = "active";
    $insertSql = "INSERT INTO modules(name, type) VALUES (:name, :type)";
    $createStmt = $pdo->prepare($createTableSql);
    $insertStmt = $pdo->prepare($insertSql);
    $insertStmt->bindParam(':type', $type);
    $insertStmt->bindParam(':name', $name);

    if ($createStmt->execute()) {
        if ($insertStmt->execute()){
            $moduleId = $pdo->lastInsertId();
            if ($type == "temperature") {
                require_once(__DIR__ . "/TemperatureController.php");
            } else if ($type == "brightness") {
                require_once(__DIR__ . "/BrightnessController.php");
            } else if ($type == "vibration") {
                require_once(__DIR__ . "/VibrationController.php");
            }
            header("location:../../index.php");
        }
    } else {
        header("location:/app/views/modules/index.php");
    }
}
