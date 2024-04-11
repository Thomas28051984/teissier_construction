<?php
require_once('doctype.php');

?>

    <main role="main">
        <div class="histoire">
            <h1>Accueil</h1>
            <hr>
            <h1>Histoire de l'entreprise</h1>
            <p>
                L’entreprise TEISSIER construction a été créée le 16 mai 2014, situé au 6 CHE DE TRANSIDE ET CABRIE,
                34820 TEYRAN. <br>
                Elle est gérée par Monsieur Lary et Kévin TEISSIER. Elle compte quatres salariés maçons dont les deux
                gérants. <br>
                Monsieur Lary TEISSIER a fait l’école des compagnons du devoirs à Nîmes, et a travaillé comme salarié
                pour un patron où il à continuer d’apprendre le métier. <br>

                Puis il a décidé de se mettre en auto-entrepreneur pendant quelques années où il a pu faire sa clientèle
                et continuer d’évoluer. <br>

                Monsieur Lary TEISSIER a fini par proposer à son frère jumeau de monter une entreprise dans la maçonnerie et
                ont donc fondé l’entreprise SARL TEISSIER Construction.

            </p>
        </div>
        <hr>
        <br>
        <div>

            <a href="mailto:votreadresse@mail.fr" class="btn btn-primary">Contactez-moi par mail</a>

            <a href="tel:+33626953786" class="btn btn-primary">Appeler directement le 06 26 95 37 86</a>


        </div>

        <br>
        <br>

        <h2>Les avis laissés par nos clients</h2>
        <h4>(Les deux derniers en date)</h4>

        <div class="avis">

            <?php
            foreach ($avisclients as $avis) {
                echo '<h2>' . $avis['date_publication'] . '</h2>';

                echo '<h3>' . $avis['avis'] . '</h3>';

            }
            ?>

        </div>
        <br>
        <div>
            <iframe src="https://www.google.com/maps/d/embed?mid=1ZKRNIxCRWNgXe_d8Wr9E7hxTsYmFxL4&ehbc=2E312F"
                    width="640" height="480"></iframe>
        </div>

    </main>


<?php
require_once('footer.php');



