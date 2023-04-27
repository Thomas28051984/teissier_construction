<?php

require_once('config.php');

require_once('scr/GestionSQL.php');
require_once('scr/Controller.php');

require_once ('scr/Controller/accueilController.php');

require_once('scr/Controller/pageController.php');
require_once ('scr/Repository/ClientRepository.php');

require_once ('scr/Repository/AvisRepository.php');
require_once ('scr/Controller/avisController.php');

try {

    session_start();
    $gestionSQL = new GestionSQL();
    $gestionSQL->connexion();

} catch (Exception $exception) {
    die('Merci de revenir plus tard !');
}

if (!empty($_GET['security'])) {

    $pageController = new pageController();


    switch ($_GET['security']) {
        case 'inscription':
            $pageController->register($gestionSQL, $_POST);
            break;

        case 'connexion':
            $pageController->login($gestionSQL, $_POST);
            break;

        case 'deconnexion':
            $pageController->logout($gestionSQL);

    }
}
else {
        $accueilController = new AccueilController();
        $accueilController->accueil($gestionSQL);

}


