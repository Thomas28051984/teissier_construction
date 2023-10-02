<?php

class chantierController extends Controller

{
    public function addchantier(GestionSQL $gestionSQL, $request)
    {

//        Je crée les variables du formulaire et je supprime les espaces
        $adresse = trim($request['adresse'] ?? '');
        $codepostale = trim($request['code_posale'] ?? '');
        $ville = trim($request['ville'] ?? '');
        $messageerreur = '';
        $messagereussite = '';
        $erreurchantier = '';

        try {
//
//            Je vérifie que les champs existent et qu'ils ne sont pas vide

            if (!empty($adresse) && !empty($codepostale) && !empty($ville)) {
                $data = [
                    'adresse' => htmlspecialchars($adresse),
                    'code_postale' => htmlspecialchars($codepostale),
                    'ville' => htmlspecialchars($ville),
                ];
                    if ($data('adresse') >0 && $data('code_postale') >0 && $data('ville') >0){
                        $erreurchantier .= 'Ce chantietr exite déjà';
                    }

                $chantierRepository = new ChantierRepository($gestionSQL);
                $chantierRepository->insert($data);
                $messagereussite .= 'Votre chantier a bien été ajouté!';

            } else {
                $messageerreur .= 'Veuillez completer tous les champs!';
            }

            $this->render('PageChantier', [
                'messageErreur' => $messageerreur,
                'messageReussite' => $messagereussite,
                'erreurchantier' => $erreurchantier
            ]);

        } catch (Exception $exception) {
            die($exception->getMessage());
        }

    }
}
