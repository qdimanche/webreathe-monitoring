<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['generate'])) {
        $_SESSION["generate"] = $_POST['generate'];
    } else {
        echo 'Erreur : clé "generate" manquante dans les données postées.';
    }
} else {
    echo 'Erreur : cette page ne peut être accédée que par une demande POST.';
}