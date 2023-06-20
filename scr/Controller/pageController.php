<?php


class PageController extends Controller
{
//Je crée la méthode construct et la session start pour la connexion de l'utilisateur
//    public function init_php_session(): bool
//    {
//        $user = [''];
//        if (!session_id()) {
//            session_start();
//            $_SESSION['user'] = [
//                "id" => $user['id'],
//                "nom" => $user['nom'],
//                "prenom" => $user['prenom'],
//                "email" => $user['mail'],
//                "role" => $user['id_role'],
//                "societe" => $user['id_societe']
//            ];
//            session_regenerate_id();
//
//            return true;
//        }
//        return false;
//
//        $this->render('index', [
//
//        ]);
//    }


    public function register(GestionSQL $gestionSQL, $request): void
    {
//        Je crée les variables du formulaire et je supprime les espaces
        $nom = trim($request['nom'] ?? '');
        $prenom = trim($request['prénom'] ?? '');
        $mail = trim($request['mail'] ?? '');
        $password = trim($request['password'] ?? '');

        //je crée les varibles de mes messages vides à afficher dans le render
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
                    //Je hash le password afin de le protéger contre les utilisitateurs malveillants
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

        try {

//            Je vérifie que les champs ne sont pas vide
            if (!empty($mail) && !empty($password)) {
                //            Je vérifie que le mail est correctement tapé
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $messageErreurMail .= 'mail invalide';

                }

                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['flash'] = "Utilisateur valid";
                    $_SESSION['password'] = $user['password'];

                    $clientRepository = new ClientRepository($gestionSQL);
                    $clientRepository->findUserByMail($mail);

                    // Authentification réussie
                    $messageReussite .= 'Connexion réussie !';
                }
                if ($_SESSION['id_role'] = 1) {
                    header("location: PageClient.php");
                } elseif ($_SESSION['id_role'] = 2) {
                    header("location: PageAdmin.php");
                } else {
                    // Authentification échouée
                    $messageErreur .= 'Mail et/ou mot de passe incorrect!';
                }
            }

            $this->render('PageConnexion', [
                'messageErreur' => $messageErreur,
                'messageReussite' => $messageReussite,
                'messageErreurMail' => $messageErreurMail
            ]);
        } catch (Exception $exception) {
            die($exception->getMessage());
        }

    }


//Je crée la méthode qui va servir de déconnexion du client sur sa session


}

