<?php
require_once ('doctype.php');
?>

<h1>Page administrateur</h1>

<hr>

<h2>Demande de devis</h2>

<h2>Messages reçus</h2>

<h2>Avis déposés</h2>

<hr>

<h2>Ajouter un chantier</h2>

    <form action="pagechantier.php">
        <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<h2>Envoyer une facture</h2>

    <form action="pagefactures.php">
        <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<h2>Transférer des photos</h2>

    <form action="pagephoto.php">
        <button type="submit" class="btn btn-primary">Transférer</button>
</form>

</body>

<?php

require_once ('footer.php');

?>
