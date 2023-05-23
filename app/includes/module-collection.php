<?php
global $pdo;
require_once "../../config/database.php";


while (true) {
    $selectAllSql = "SELECT * from modules";
    $createStmt = $pdo->prepare($selectAllSql);

    if ($createStmt->execute()) {
        $results = $createStmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($results)) {
            foreach ($results as $row) {
                $type = $row['type'];
                $moduleId = $row['id'];
                $collectionDate = date('Y-m-d H:i:s');
                $value = 0;

                switch ($type) {
                    case "temperature":
                        $value = rand(1, 400) / 10.0;
                        $insertSql = "INSERT INTO temperatures(value, collectionDate) VALUES (:value, :collectionDate)";
                        break;
                    case "vibration":
                        $value = rand(10, 200) / 10.0;
                        $insertSql = "INSERT INTO vibrations(value, collectionDate) VALUES (:value, :collectionDate)";
                        break;
                    case "brightness" :
                        $value = rand(10, 20000) / 10.0;
                        $insertSql = "INSERT INTO brightnesses(value, collectionDate) VALUES (:value, :collectionDate)";
                        break;
                }

                if (isset($insertSql)) {
                    $insertStmt = $pdo->prepare($insertSql);
                    $insertStmt->bindParam(':value', $value);
                    $insertStmt->bindParam(':collectionDate', $collectionDate);
                    $insertStmt->execute();
                }
            }
        }
    }
    sleep(60);
}