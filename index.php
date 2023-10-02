<?php

require_once('config.php');

require_once('scr/GestionSQL.php');
require_once('scr/Controller.php');

require_once('scr/Controller/accueilController.php');

require_once('scr/Controller/pageController.php');
require_once('scr/Repository/ClientRepository.php');

require_once('scr/Repository/DocumentRepository.php');
require_once('scr/Controller/documentController.php');

require_once('scr/Controller/avisController.php');
require_once('scr/Repository/AvisRepository.php');

require_once('scr/Controller/chantierController.php');
require_once('scr/Repository/ChantierRepository.php');

try {


    $gestionSQL = new GestionSQL();


} catch (Exception $exception) {
    die('Merci de revenir plus tard !');
}

if (!empty($_GET['security'])) {

    $pageController = new PageController();
    $avisController = new  AvisController();
    $chantierController = new ChantierController();


    switch ($_GET['security']) {
        case 'inscription':
            $pageController->register($gestionSQL, $_POST);
            break;

        case 'connexion':
            $pageController->login($gestionSQL, $_POST);
            break;

        case 'deconnexion':
            $pageController->logout();
            break;
    }

} else {
    $accueilController = new AccueilController();
    $accueilController->accueil($gestionSQL);
}




