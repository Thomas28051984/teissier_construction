<?php

class avisController extends Controller
{
    public function ajoutavis(GestionSQL $gestionSQL, $request): void
    {
        $messageErreurAvis = '';
        $messageReussiteAvis = '';
        $avis = trim(string: $request ['avis'] ?? '');

        try {
            if (!empty($message)) {

                $data = [
                    'avis' => htmlspecialchars($avis), stripslashes($avis)
                ];

                $avisrepository = new AvisRepository($gestionSQL);
                $avisrepository->insertavis($data);
                $messageReussiteAvis .= 'Votre avis a bien été enregistrer';

            } else {
                $messageErreurAvis .= 'Veuillez completer tous les champs';
            }
            $this->render('PageAvis', [
                'messageErreurAvis' => $messageErreurAvis,
                'messageReussite' => $messageReussiteAvis
            ]);
        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }
}



