<?php

class chantierController extends Controller

{
    public function addchantier(GestionSQL $gestionSQL, $request){

//        Je crée les variables du formulaire et je supprime les espaces
            $adresse = trim($request['adresse'] ?? '');
            $codepostale = trim($request['code_posale'] ?? '');
            $ville = trim($request['ville'] ?? '');
            $messageErreur = '';
            $messagereussite = '';

            try {
//
//            Je vérifie que les champs existent et qu'ils ne sont pas vide
                if (!empty($adresse) && !empty($codepostale) && !empty($ville)) {
                    $data = [
                        'adresse' => htmlspecialchars($adresse),
                        'code_postale' => htmlspecialchars($codepostale),
                        'ville' => htmlspecialchars($ville),

                    ];


                    $chantierRepository = new ChantierRepository($gestionSQL);
                    $chantierRepository->insert($data);
                    $messagereussite .= 'Inscription réussie !';

                } else {
                    $messageErreur .= 'Veuillez completer tous les champs';
                }

                $this->render('PageClient', [
                    'messageErreur' => $messageErreur,
                    'messageReussite' => $messagereussite
                ]);

            } catch (Exception $exception) {
                die($exception->getMessage());
            }

        }
    }
