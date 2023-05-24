<?php
global $pdo;
require_once "../../../config/database.php";

$type = $_GET['type'];

if ($type == 'temperature') {
    $tableName = 'temperatures';
} elseif ($type == 'brightness') {
    $tableName = 'brightnesses';
} else {
    $tableName = 'temperatures';
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

    $content = '
        <div>Il ya '. count($chartData).' valeurs. </div>
        <canvas id="myGraph"></canvas>
    ';

} else {
    $content = '
    <div>Error during the SQL request</div>
    ';
}


require_once "../../../templates/layout.php";
require_once "../../components/lineChart.php";

