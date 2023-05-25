<?php
global $pdo;
require_once "../../../config/database.php";

$selectAllSql = "SELECT * from modules";
$createStmt = $pdo->prepare($selectAllSql);

if ($createStmt->execute()) {
    $results = $createStmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($results)) {
        $content = '
        <a href="/app/views/modules/registration.php" class="btn background-color-primary position-absolute top-0 end-0">Ajouter</a>
        <div class="mt-5">
            <div class="row pb-4 border-bottom">
                <span class="col">#</span>
                <span class="col">Nom</span>
                <span class="col">Type</span>
                <span class="col"></span>
            </div>';

        foreach ($results as $row) {
            if ($row['type'] == "temperature") {
                $typeTranslate = "Température";
            } else if ($row['type'] == "brightness") {
                $typeTranslate = "Luminosité";
            } else {
                $typeTranslate = "Vibration";
            }
            $id = $row['id'];
            $name = $row['name'];
            $type = $row['type'];

            $content .= '
            <div class="row mt-4">
                <div class="col d-flex align-items-center">' . $id . '</div>
                <div class="col d-flex align-items-center">' . $name . '</div>
                <div class="col d-flex align-items-center">' . $typeTranslate . '</div>
                <div class="col d-flex align-items-center">
                    <a href="./details.php?type=' . urlencode($type) . '" class="btn background-color-secondary">Voir</a>
            </div>
        </div>';
        }

        $content .= '</div>';
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
