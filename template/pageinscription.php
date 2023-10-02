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
                    <input type="text" class="form-control" name="nom" id="nom" required placeholder="Mon nom">

                    <br>
                    <br>

                    <label for="prénom" class="form-label"><b>Prénom</b></label>
                    <input type="text" class="form-control" name="prénom" id="prénom" required placeholder="Mon prénom">

                    <br>
                    <br>

                    <label for="mail" class="form-label"><b>Mail</b></label>
                    <input type="email" name="mail" class="form-control" required id="mail"
                           placeholder="monemail@mail.com"
                           aria-describedby="emailHelp"/>

                    <br>
                    <br>

                    <label for="password" class="form-label"><b>Mot de passe</b></label>
                    <input type="password" class="form-control" id="password" name="password" required
                           pattern=”^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"
                           placeholder="Ce champ attend entre 8 et 16 caractères et , un chiffre, une lettre majuscule et une minuscule">


            </div>
            <br>
            <?= $messageErreur ?>
            <br><br>
            <button type="submit" class="btn btn-primary">Inscription</button>

            </form>


            <br>
            <?= $messageReussite ?>


    </section>
    </div>


<?php
require_once('footer.php');
