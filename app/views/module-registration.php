<?php
$content = '  
  <div class="vh-100 d-flex justify-content-center align-items-center">
  <form class="" method="post" action="../controllers/ModuleRegistrationController.php">
   <div class="form-group">
    <label for="type">Type</label>
    <select name="type" id="type" required>
        <option value="temperature">Temperature</option>
        <option value="brightness">Brightness</option>
        <option value="motion">Motion</option>
        <option value="sound">Vibration</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
';

require_once '../../templates/layout.php';