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
        <div>Il y a ' . count($chartData) . ' valeurs. </div>
        <button onclick="generateValue()">Générer valeurs</button>
        <canvas id="myGraph"></canvas>
    ';
} else {
    $content = '
        <div>Error during the SQL request</div>
    ';
}

require_once "../../../templates/layout.php";
require_once "../../components/lineChart.php";

echo '
<script>
function generateData() {
    $.ajax({
        url: "../../includes/generate-data.php",
        type: "POST",
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

function generateValue() {
    var generateValue = ' . ($_SESSION["generate"] === "true" ? "false" : "true") . ';
    $.ajax({
        url: "../../includes/update_session.php",
        type: "POST",
        data: { generate: generateValue },
        success: function(response) {
            console.log(response);
            location.reload(); // Recharger la page après la mise à jour de la session
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}


if (' . ($_SESSION["generate"] === "true" ? "true" : "false") . ') {
    generateData();
    setInterval(generateData, 60000);
}

</script>
';
?>


<?php
var_dump($_SESSION["generate"]);
