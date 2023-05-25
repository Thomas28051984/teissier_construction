<?php
require_once('doctype.php');

?>

    <main role="main">
        <div class="histoire">
            <h1>Accueil</h1>
            <hr>
            <h1>Histoire de l'entreprise</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Praesent id mollis dolor. Aenean vel finibus erat. Sed sit amet pretium sapien.
                Integer vitae consectetur felis. Morbi id ipsum in mauris dapibus euismod.
                Nulla porta euismod nulla vitae dictum. Nulla semper luctus molestie.
                Donec sagittis efficitur orci et condimentum. Orci varius natoque penatibus et magnis dis parturient
                montes,
                nascetur ridiculus mus.
                Mauris arcu risus, venenatis et vulputate quis, semper at nisl. Etiam tincidunt leo sit amet elit
                accumsan
                porttitor.
                Mauris tincidunt placerat vulputate. Fusce viverra porta magna.
            </p>
        </div>

        <div>

            <a href="mailto:votreadresse@mail.fr" class="btn btn-primary">Contactez-moi !</a>

            <a href="tel:+33626953786" class="btn btn-primary">Appeler le 06 26 95 37 86</a>


        </div>

        <br>

<!--        <div id="image_maçon">-->
<!--            <img src="../assets/images/industrial-builder.jpg" alt="image maçon">-->
<!--        </div>-->

        <div>
        <?php
        foreach ($avisclients as $avis) {

            echo '<h3>' . $avis['avis'] . '</h3>';

        }
        ?>
        </div>

    </main>


<?php
require_once('footer.php');



