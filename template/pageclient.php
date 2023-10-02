<?php
require_once('doctype.php');
?>

<h1>Page client</h1>
<!-- --><?php
//    foreach ($clients as $client){
//    echo $ } ?><!--</h2>-->
<hr>
    <h1>Mes documents</h1>


    <h2><a href="PageDevis.php">Mes devis</a></h2>

    <h2>Mes factures</h2>
    <form action="pagefactures.php">
        <button type="submit" class="btn btn-primary">Cliquez sur moi</button>
    </form>
    <h2>Photos chantier</h2>
    <form action="pageavis.php">
        <button type="submit" class="btn btn-primary">Cliquez sur moi</button>
    </form>
    <h1>Déposer un avis</h1>
    <form action="pageavis.php">
        <button type="submit" class="btn btn-primary">Cliquez sur moi</button>
    </form>
    </body>
<?php
require_once('footer.php');
