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

//    Je crée la méthode pour permettre la connexion du client
    public function login(GestionSQL $gestionSQL, $request): void
    {
        $password = trim($request['password'] ?? '');
        $mail = trim($request['mail'] ?? '');
        $messageErreur = '';
        $messageErreurMail = '';
        $messageReussite = '';
        $user = [''];
        $_SESSION['id_role'] = '0';

        try {

//            Je vérifie que les champs ne sont pas vide
            if (!empty($mail) && !empty($password)) {
                //            Je vérifie que le mail est correctement tapé
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $messageErreurMail .= 'mail invalide';

                }

                if ($mail && password_verify($password, $mail)) {
                    $_SESSION['flash'] = "Utilisateur valid";
                    $_SESSION['mail'] = $user['mail'];

                    $clientRepository = new ClientRepository($gestionSQL);
                    $clientRepository->findUserByMail($mail);

                    // Authentification réussie
                    $messageReussite .= 'Connexion réussie !';
                }

                if ('client' == $_SESSION['id_role']) {
                    header("location: PageClient.php");
                    die();
                } elseif ('admin' == $_SESSION['id_role']) {
                    header("location: PageAdmin.php");
                    die();
                } else {
                    // Authentification échouée
                    $messageErreur .= 'Mail et/ou mot de passe incorrect!';
                }
            }

            $this->render('pageconnexion', [
                'messageErreur' => $messageErreur,
                'messageReussite' => $messageReussite,
                'messageErreurMail' => $messageErreurMail
            ]);
        } catch (Exception $exception) {
            die($exception->getMessage());
        }

    }


//Je crée la méthode qui va servir de déconnexion du client sur sa session

    public function logout() {
        // Supprimer toutes les variables de session
        $_SESSION = array();

        // Si vous utilisez des cookies de session, détruisez-les également
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Détruire la session
        session_destroy();

        echo "Déconnexion réussie !";
    }

}

