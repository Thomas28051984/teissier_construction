<?php
require_once ('doctype.php');
?>

<section class="avis">
    <h1>Laissez nous votre avis:</h1>
    <form>
        <label for="avis"></label>
        <textarea id="avis" name="avis"
                  rows="5" cols="33" placeholder="Donne nous ton avis sur ton expérience avec nous..."></textarea><br>
        <button>Déposer</button>
    </form>
</section>

<?= $messageErreurAvis ?>
    <br>
<?= $messageReussiteAvis ?>

</body>

<?php
require_once ('footer.php');
