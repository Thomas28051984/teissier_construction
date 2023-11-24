<?php

class AccueilController extends Controller
{

    public function accueil(GestionSQL $gestionSQL)
    {
        try {
            $avisRepository = new AvisRepository($gestionSQL);
            $avisClient = $avisRepository->limit(limit: 2);

            $this->render('accueil',
                [
                    'avisclients' => $avisClient
                ]);

        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }
}

