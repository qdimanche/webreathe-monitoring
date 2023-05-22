<?php
global $pdo;
require_once "../../../config/database.php";

$moduleId = $_GET['moduleId'];
$type = $_GET['type'];

if ($type == 'temperature') {
    $tableName = 'temperatures';
} elseif ($type == 'brightness') {
    $tableName = 'brightnesses';
} else {
    $tableName = 'temperatures';
}

if (isset($moduleId)){
    $selectSql = "SELECT * from $tableName WHERE moduleId = $moduleId";
    $selectStmt = $pdo->prepare($selectSql);
}

if ($selectStmt->execute()) {
	$results = $selectStmt->fetchAll(PDO::FETCH_ASSOC);

	if (!empty($results)) {
		foreach ($results as $row) {
			$id = $row['id'];
			$value = $row['value'];
			$collectionDate = $row['collectionDate'];
			$moduleId = $row['moduleId'];

			$content = '
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Value</th>
                  <th scope="col">Collection date</th>
                  <th scope="col">Module Id</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">' . $id . '</th>
                  <th scope="row">' . $value . '</th>
                  <th scope="row">' . $collectionDate . '</th>
                  <th scope="row">' . $moduleId . '</th>
                </tr>
              </tbody>
            </table>';

		}
	} else {
		$content = '
            <div>No registered modules</div>
        ';
	}
} else {
	$content = '
    <div>Error during the SQL request</div>
    ';
}

require_once "../../../templates/layout.php";
