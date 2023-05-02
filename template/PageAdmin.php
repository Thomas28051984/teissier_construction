<?php
require_once ('doctype.php');
?>

<h1>Page administrateur</h1>

<h2>Demande de devis</h2>

<h2>Messages reçus</h2>

<h2>Avis déposés</h2>

<h2>Ajouter un chantier</h2>

    <form action="PageChantier.php">
        <button type="submit">Ajouter</button>
</form>

<h2>Envoyer une facture</h2>

    <form action="PageFactures.php">
        <button type="submit">Envoyer</button>
</form>

<h2>Transférer des photos</h2>

    <form action="PagePhotos.php">
        <button type="submit">Transférer</button>
</form>

</body>

<?php

require_once ('footer.php');

?>
