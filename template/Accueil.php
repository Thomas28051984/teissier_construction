<?php
require_once ('doctype.php');
?>

<main>
    <div class="histoire">
    <h1>Histoire de l'entreprise</h1>
<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    Praesent id mollis dolor. Aenean vel finibus erat. Sed sit amet pretium sapien.
    Integer vitae consectetur felis. Morbi id ipsum in mauris dapibus euismod.
    Nulla porta euismod nulla vitae dictum. Nulla semper luctus molestie.
    Donec sagittis efficitur orci et condimentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    Mauris arcu risus, venenatis et vulputate quis, semper at nisl. Etiam tincidunt leo sit amet elit accumsan porttitor.
    Mauris tincidunt placerat vulputate. Fusce viverra porta magna.
</p>
    </div>

    <div id="image_maçon">
        <img  src="../assets/images/industrial-builder.jpg">
    </div>

<div>
    <form>
        <button class="mailto"><a href="mailto:votreadresse@mail.fr" class="btn btn-primary">Contactez-moi !</a></button>
        <button class="telephoner"><a href="tel:+33626953786">Cliquez ici pour appeler le 06 26 95 37 86</a></button>
    </form>
</div>

<section class="avis-clients">
    <div>
        <?php
        $avis_client = [];
        foreach ($avis_client as $avis){
            echo '<h2>' . $avis['date_publication'] . '</h2>';
            echo '<p>' . $avis['avis'] . '</p>';
        }
        ?>
    </div>

</section>

    <div class="map">

    <p>Map API</p>

    </div>

</main>

</body>

<?php
require_once ('footer.php')
?>
