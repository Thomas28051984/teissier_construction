<?php
require_once('doctype.php');
?>

    <section class="pageConnexion" role="contentinfo">
        <h1>Connexion</h1>
        <hr>
        <h4 class="connexionTitre">Me connecter à mon compte :</h4>
        <div class="mb-3 ms-5 me-5">
            <form method="post" action="">
                <label for="mail" class="form-label"><b>Email</b>
                    <input type="email" class="form-control" name="mail" required></label>

                <br>
                <label for="password" class="mb-3"><b>Password</b>
                    <input type="password" class="form-control" name="password" required></label>

                <br><br>
                <button type="submit" class="btn btn-primary">connexion</button>
            </form>

            <?= $messageErreur ?>
            <br>
            <?= $messageReussite ?>
            <br>
            <?= $messageErreurMail ?>

        </div>

    </section>



<?php
require_once('footer.php');
