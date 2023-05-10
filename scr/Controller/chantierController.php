<?php

class chantierController extends Controller

{
    public function addchantier(GestionSQL $gestionSQL, $request){

//        Je crée les variables du formulaire et je supprime les espaces
            $adresse = trim($request['adresse'] ?? '');
            $codepostale = trim($request['code_posale'] ?? '');
            $ville = trim($request['ville'] ?? '');
            $messageErreur = 'Veuillez completer tous les champs';
            $messagereussite = 'Ajout réussi !';

            try {
//
//            Je vérifie que les champs existent et qu'ils ne sont pas vide
                if (!empty($adresse) && !empty($codepostale) && !empty($ville) && isset($_POST[$adresse]) && isset($_POST[$codepostale]) && isset($_POST[$ville])) {
                    $data = [
                        'adresse' => htmlspecialchars($adresse),
                        'code_postale' => htmlspecialchars($codepostale),
                        'ville' => htmlspecialchars($ville),

                    ];
                    var_dump($data);

                    $inscriptionRepository = new ChantierRepository($gestionSQL);
                    $inscriptionRepository->insert($data);

                    echo $messagereussite;

                } else {
                    echo $messageErreur;
                }

                $this->render('Accueil');
            } catch (Exception $exception) {
                die($exception->getMessage());
            }

        }
    }
