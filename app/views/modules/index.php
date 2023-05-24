<?php
global $pdo;
require_once "../../../config/database.php";

$selectAllSql = "SELECT * from modules";
$createStmt = $pdo->prepare($selectAllSql);

if ($createStmt->execute()) {
	$results = $createStmt->fetchAll(PDO::FETCH_ASSOC);

	if (!empty($results)) {
		foreach ($results as $row) {
			$id = $row['id'];
			$name = $row['name'];
			$type = $row['type'];

			$content = '
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Type</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">' . $id . '</th>
                  <th scope="row">' . $name . '</th>
                  <th scope="row">' . $type . '</th>
                  <th scope="row">
                    <a href="./details.php?type='.urlencode($type).'" class="btn btn-primary">View</a>
                  </th>
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
