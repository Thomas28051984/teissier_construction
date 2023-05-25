<?php

class avisController extends Controller
{
    public function ajoutavis(GestionSQL $gestionSQL, $request)
    {
        $messageErreurAvis = '';
        $messageReussiteAvis = '';
        $message = trim(string: $request ['message'] ?? '');
        try {
            if (!empty($message)) {


                $avisrepository = new AvisRepository($gestionSQL);
                $avisrepository->insertavis($message);
                $messageReussiteAvis .= 'Votre avis a bien été enregistrer';

            } else {
                $messageErreurAvis .= 'Veuillez completer tous les champs';
            }
            $this->render('PageAvis', [
                'messageErreur' => $messageErreurAvis,
                'messageReussite' => $messageReussiteAvis
            ]);
        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }
}



