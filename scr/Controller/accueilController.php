<?php

class AccueilController extends Controller
{

    public function accueil(GestionSQL $gestionSQL)
    {
        try {
            $avisrepository = new AvisRepository($gestionSQL);
            $avis_client = $avisrepository->avisLimit(limit: 2);
            $this->render('accueil',
                [
                    'avisclient' => $avis_client
                ]);

        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }

}

?>