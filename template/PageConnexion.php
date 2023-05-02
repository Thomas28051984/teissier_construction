<?php
require_once('doctype.php');
?>

       <section class="pageConnexion" role="contentinfo">
        <h4 class="connexionTitre">Me connecter à mon compte :</h4>
        <div class="mb-3 ms-5 me-5">
            <form method="post" action="">
                <label for="mail" class="form-label"><b>Email</b></label>
                    <input type="email" class="form-control" name="mail" required>

                <br>
                <label for="password" class="mb-3"><b>Password</b></label>
                    <input type="password" class="form-control" name="password" required>

                <br><br>
                <button type="submit" class="btn btn-primary">connexion</button>
            </form>
        </div>

    </section>

</body>

<?php
require_once ('footer.php');
