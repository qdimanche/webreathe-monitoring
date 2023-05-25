<?php

echo '
<script>
    function generateValue() {
        var generateValue = ' . ($_SESSION["generate"] === "true" ? "false" : "true") . ';

        $.ajax({
            url: "../../includes/update-session.php",
            type: "POST",
            data: { generate: generateValue },
            success: function(response) {
                console.log(response);
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
    

    window.onload = function() {
        var buttonText = document.getElementById("buttonText");
        if (' . ($_SESSION["generate"] == "false" ? 'true' : 'false') . ') {
            buttonText.innerHTML = "Générer valeurs";
            buttonText.classList.add("background-color-primary");

        } else {
            buttonText.innerHTML = "Arrêter génération";
            buttonText.classList.add("btn-danger");
            setInterval(generateData, 60000);
        }
    };


</script>
';
