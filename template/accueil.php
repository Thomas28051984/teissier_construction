<?php
require_once('doctype.php');

?>

    <main role="main">
        <div class="histoire">
            <h1>Accueil</h1>
            <hr>
            <h1>Histoire de l'entreprise</h1>
            <p>
                L’entreprise TEISSIER construction à été créée le 16 mai 2014, situé au 6 CHE DE TRANSIDE ET CABRIE, 34820 TEYRAN.
                Elle est gérée par Monsieur Lary et Kévin TEISSIER. Elle compte trois salariés maçons dont les deux gérants.
                Monsieur Lary TEISSIER a fait l’école des compagnons du devoirs à Nîmes, et a travaillé comme salarié pour un patron où il à continuer d’apprendre le métier.

                Puis il a décidé de se mettre en auto-entrepreneur pendant quelques années où il a pu faire sa clientèle et continuer d’évoluer.

                Son frère jumeau, Monsieur Kévin TEISSIER, a fait ses études à la fac de science mais à décider d’en partir pour travailler pour une société qui travaille dans l’installation de canalisation d’eau. La société à déposer le bilan. Monsieur Kévin TEISSIER s’est donc retrouvé sans emploi.

                Monsieur Lary TEISSIER à donc proposé à son frère jumeau de monter une entreprise dans la maçonnerie et ont donc construit l’entreprise la SARL TEISSIER Construction.

                Depuis l’entreprise fonctionne très bien et continue de procéder aux chantiers qu’elle a avec ses clients dans l’hérault.

            </p>
        </div>

<br>
        <div>

            <a href="mailto:votreadresse@mail.fr" class="btn btn-primary">Contactez-moi !</a>

            <a href="tel:+33626953786" class="btn btn-primary">Appeler le 06 26 95 37 86</a>


        </div>

        <br>
        <br>

        <div id="image_maçon">
            <img src="../assets/images/industrial-builder.jpg" alt="image maçon">
        </div>

        <div>
        <?php
        foreach ($avisclients as $avis) {

            echo '<h3>' . $avis['avis'] . '</h3>';

        }
        ?>
        </div>

        <di>
            MapBox
        </di>

    </main>


<?php
require_once('footer.php');



