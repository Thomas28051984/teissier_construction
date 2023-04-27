<?php

class avisController extends Controller
{
    public function ajoutavis(GestionSQL $gestionSQL, $request)
    {
        $messageerreur = 'Tapez votre avis dans la zone texte';
        $messagereussite = 'Votre avis a bien été enregistrer';
        $message = trim(string: $request ['message'] ?? '');
        try {
            if (isset($message)){
                echo ($messagereussite);
            }
            else {
                echo($messageerreur);
            }
            $this->render('PageAvis');
            } catch (Exception $exception) {
            die($exception->getMessage());
        }
        $this->render('PageAvis');
    }

//    public function readavis(GestionSQL $gestionSQL)
//    {
//        try {
//            if
//        }
//    }
//
//



}

?>

