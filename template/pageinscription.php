<?php
require_once('doctype.php');
?>

    <div class="main">
        <section class="pageInscription" role="contentinfo">
            <h1>Inscription</h1>
            <hr>
            <h4>Je crée mon compte client:</h4>
            <div class="mb-3 ms-5 me-5">
                <form method="post" action="">

                    <label for="nom" class="form-label"><b>Nom</b></label>
                    <input type="text" class="form-control" name="nom" id="nom" required>

                    <br>

                    <label for="prénom" class="form-label"><b>Prénom</b></label>
                    <input type="text" class="form-control" name="prénom" id="prénom" required>

                    <br>

                    <label for="mail" class="form-label"><b>Mail</b></label>
                    <input type="email" name="mail" class="form-control" required id="mail"
                           aria-describedby="emailHelp"/>

                    <div class="mb-3">
                        <label for="password" class="form-label"><b>Mot de passe</b></label>
                        <input type="password" class="form-control" id="password" name="password" required>

                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Inscription</button>

                </form>

                <?= $messageErreur ?>
                <br>
                <?= $messageReussite ?>

            </div>
        </section>
    </div>


<?php
require_once('footer.php');