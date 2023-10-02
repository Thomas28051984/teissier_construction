<header role="banner" class="wrapper">

    <nav class="menu-container">
        <!-- burger menu -->
        <input type="checkbox" aria-label="Toggle menu" />
        <span></span>
        <span></span>
        <span></span>

        <!-- logo -->
        <a href="../index.php" title="lien vers l'accueil">
            <img src="../assets/images/logoentreprise.jpg" alt="Logo de la société" class="logo">
        </a>

        <!-- menu items -->
        <div class="menu">
            <ul>
                <li>
                    <a href="pageprestation.php">
                        Nos prestations
                    </a>
                </li>
                <li>
                    <a href="pagerealisations.php">
                        Nos réalisations
                    </a>
                </li>

            </ul>
            <ul>
                <?php if(empty($_SESSION['mail'])) {?>
                <li>
                    <a href="?security=inscription">
                        Inscription
                    </a>
                </li>
                <li>
                    <a href="?security=connexion">
                        Connexion
                    </a>
                </li>
                <?php  } else { ?>
                <li><a href="?security=deconnexion">Déconnexion</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>
