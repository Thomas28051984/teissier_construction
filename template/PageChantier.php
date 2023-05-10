<?php
require_once ('doctype.php');
?>
<h1>Ajouter un chantier</h1>

<form method="post" action="">
    <label for="adresse" class="form-label"><b>Adresse</b></label>
    <input type="text" class="form-control" name="adresse" id="adresse" placeholder="adresse"><br>

    <label for="code_postale" class="form-label"><b>Code postal</b></label>
    <input type="number" class="form-control" name="code_postale" id="code_postale" placeholder="code postal"><br>

    <label for="ville" class="form-label"><b>Ville</b></label>
    <input type="text" class="form-control" name="ville" id="ville" placeholder="ville"><br>

    <button type="submit" class="btn btn-primary">Inscription</button>

</form>


<?php
require_once ('footer.php');
?>