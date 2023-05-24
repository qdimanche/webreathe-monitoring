<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "/Applications/MAMP/htdocs/Webreathe/app/controllers/TemperatureController.php";
    require_once "/Applications/MAMP/htdocs/Webreathe/app/controllers/BrightnessController.php";
    require_once "/Applications/MAMP/htdocs/Webreathe/app/controllers/VibrationController.php";

} else {
    echo 'Erreur : cette page ne peut être accédée que par une demande POST.';
}


