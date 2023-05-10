<?php

require_once('config.php');

require_once('scr/GestionSQL.php');
require_once('scr/Controller.php');

require_once ('scr/Controller/accueilController.php');

require_once('scr/Controller/pageController.php');
require_once ('scr/Repository/ClientRepository.php');

require_once ('scr/Repository/AvisRepository.php');
require_once ('scr/Controller/avisController.php');

require_once ('scr/Repository/ChantierRepository.php');
require_once ('scr/Controller/chantierController.php');

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
            $pageController->logout();

    }

//} elseif (!empty($_GET['immo'])) {
//    $addImmoController = new ImmoController();
//
//    switch ($_GET['immo']) {
//        case '':
//            $addImmoController->ajouterBien($gestionSQL, $_POST);
//            break;
//    }
//} elseif (!empty($_GET['achat'])) {
//    $immoController = new ImmoController();
//
//    switch ($_GET['achat']) {
//        case '':
//            $immoController->recherche($gestionSQL, $_POST);
//            break;
//    }

} else {
    $accueilController = new AccueilController();
    $accueilController->accueil($gestionSQL);
}




