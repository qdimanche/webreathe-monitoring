<?php
$content = '  
<div class="d-flex justify-content-center align-items-center h-100">
    <form class="" method="post" action="../../controllers/ModuleRegistrationController.php">
          <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Entrer un nom" required>
          </div> 
          <div class="form-group mt-3 d-flex flex-column">
            <label for="type">Type</label>
            <select name="type" id="type" required class="form-select">
                <option value="temperature">Température</option>
                <option value="brightness">Luminosité</option>
                <option value="sound">Vibration</option>
            </select>
          </div>
          <button type="submit" class="btn background-color-primary mt-5">Ajouter</button>
    </form>
</div>
';

require_once '../../../templates/layout.php';
