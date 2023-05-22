<?php

require_once('config.php');

require_once('scr/GestionSQL.php');
require_once('scr/Controller.php');

require_once('scr/Controller/accueilController.php');

require_once('scr/Controller/pageController.php');
require_once('scr/Repository/ClientRepository.php');

require_once('scr/Repository/AvisRepository.php');
require_once('scr/Controller/avisController.php');

require_once('scr/Repository/ChantierRepository.php');
require_once('scr/Controller/chantierController.php');

require_once('scr/Repository/DocumentRepository.php');
require_once('scr/Controller/documentController.php');



try {

//    init_php_session();
    $gestionSQL = new GestionSQL();


} catch (Exception $exception) {
    die('Merci de revenir plus tard !');
}

if (!empty($_GET['security'])) {

    $pageController = new PageController();


    switch ($_GET['security']) {
        case 'inscription':
            $pageController->register($gestionSQL, $_POST);
            break;

        case 'connexion':
            $pageController->login($gestionSQL, $_POST);
            break;

        case 'deconnexion':
            $pageController->logout();

    }

} elseif (!empty($_GET['chantier'])) {
    $chantierController = new chantierController();

    switch ($_GET['chantier']) {
        case '':
            $chantierController->addchantier($gestionSQL, $_POST);
            break;
    }

} else {
    $accueilController = new AccueilController();
    $accueilController->accueil($gestionSQL);
}




