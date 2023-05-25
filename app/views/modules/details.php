<?php
global $pdo;
require_once "../../../config/database.php";

if (!isset($_SESSION["generate"])) {
    $_SESSION["generate"] = "false";
}

$type = $_GET['type'];

if ($type == 'temperature') {
    $tableName = 'temperatures';
} elseif ($type == 'brightness') {
    $tableName = 'brightnesses';
} else {
    $tableName = 'vibrations';
}

function table_exists($tableName, $pdo): bool
{
    $sql = "SHOW TABLES LIKE '$tableName'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($result !== false);
}

if (!table_exists($tableName, $pdo)) {
    if ($type == 'temperature') {
        require_once "../../controllers/TemperatureController.php";
    } elseif ($type == 'brightness') {
        require_once "../../controllers/BrightnessController.php";
    } else {
        require_once "../../controllers/VibrationController.php";
    }
}

$selectSql = "SELECT * FROM $tableName";
$selectStmt = $pdo->prepare($selectSql);

if ($selectStmt->execute()) {
    $results = $selectStmt->fetchAll(PDO::FETCH_ASSOC);

    $chartData = [];
    foreach ($results as $row) {
        $value = $row['value'];

        $chartData[] = array(
            'x' => $row['collectionDate'],
            'y' => $value
        );
    }

    if ($_SESSION["generate"] == "false") {
        $buttonContent = "Générer valeurs";
    } else {
        $buttonContent = "Arrêter la génération";
    }

    $content = '
        <div>Il y a ' . count($chartData) . ' valeurs qui ont été prélevées </div>
        <button class="btn mt-3 mb-5" onclick="generateValue()" id="buttonText">
            ' . $buttonContent . '
        </button>
        <canvas id="myGraph"></canvas>
    ';
} else {
    $content = '
        <div>Error during the SQL request</div>
    ';
}

require_once "../../../templates/layout.php";
require_once "../../components/lineChart.php";

require_once "../../includes/generate-data-automation.php";
require_once "../../includes/update-data.php";


