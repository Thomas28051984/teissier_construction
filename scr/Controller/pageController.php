<?php

session_start();

class PageController extends Controller
{

    public function register(GestionSQL $gestionSQL, $request): void
    {
//        Je crée les variables du formulaire et je supprime les espaces
        $nom = trim($request['nom'] ?? '');
        $prenom = trim($request['prénom'] ?? '');
        $mail = trim($request['mail'] ?? '');
        $password = trim($request['password'] ?? '');

        //je crée les variables de mes messages vides à afficher dans le render
        $messageErreur = '';
        $messagereussite = '';

        try {

//            Je vérifie que les champs existent et qu'ils ne sont pas vide
            if (!empty($password) && !empty($prenom) && !empty($nom) && !empty($mail)) {
//            Je vérifie que le mail est correctement tapé
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $messageErreur .= 'mail invalide';

                }

                // Je collecte les données dans ma variable $data comprenant un tableau
                $data = [
                    'nom' => htmlspecialchars($nom),
                    'prenom' => htmlspecialchars($prenom),
                    'mail' => htmlspecialchars($mail),
                    //Je hash le password afin de le protéger contre les utilisateurs malveillants
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),

                ];

                //Je crée mon instance et récupère la requête
                $clientRepository = new ClientRepository($gestionSQL);
                $clientRepository->insert($data);

                // J'affiche le message de réussite si tout se passe bien
                $messagereussite .= 'Inscription réussie !';

                // Sinon j'affiche le message d'erreur
            } else {
                $messageErreur .= 'Veuillez completer tous les champs';

            }
            // Et j'envoie tout sur ma page inscription
            $this->render('PageInscription', [
                'messageErreur' => $messageErreur,
                'messageReussite' => $messagereussite
            ]);
        } catch (Exception $exception) {
            die($exception->getMessage());
        }

    }
}


//// Détruire la session
//session_destroy();
//
//echo "Déconnexion réussie !";
//}



