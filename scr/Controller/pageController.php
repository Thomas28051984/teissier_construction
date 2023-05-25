<?php


class PageController extends Controller
{
//Je crée la méthode construct et la session start pour la connexion de l'utilisateur
    public function init_php_session(): bool
    {
        $user = [''];
        if (!session_id()) {
            session_start();
            $_SESSION['user'] = [
                "id" => $user['id'],
                "nom" => $user['nom'],
                "prenom" => $user['prenom'],
                "email" => $user['mail'],
                "role" => $user['id_role'],
                "societe" => $user['id_societe']
            ];
            session_regenerate_id();

            return true;
        }
        return false;

        $this->render('PageConnexion', [

        ]);
    }


    public function register(GestionSQL $gestionSQL, $request): void
    {
//        Je crée les variables du formulaire et je supprime les espaces
        $nom = trim($request['nom'] ?? '');
        $prenom = trim($request['prénom'] ?? '');
        $mail = trim($request['mail'] ?? '');
        $password = trim($request['password'] ?? '');
        $messageErreur = '';
        $messagereussite = '';

        try {

//            Je vérifie que les champs existent et qu'ils ne sont pas vide
            if (!empty($password) && !empty($prenom) && !empty($nom) && !empty($mail)) {
                //            Je vérifie que le mail est correctement tapé
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $messageErreur .= 'mail invalide';

                }
                $data = [
                    'nom' => htmlspecialchars($nom),
                    'prenom' => htmlspecialchars($prenom),
                    'mail' => htmlspecialchars($mail),
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),

                ];

                $clientRepository = new ClientRepository($gestionSQL);
                $clientRepository->insert($data);
                $messagereussite .= 'Inscription réussie !';


            } else {
                $messageErreur .= 'Veuillez completer tous les champs';

            }

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
        global $gestionSQL;
        $password = trim($request['password'] ?? '');
        $userRole = 'role';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $messageErreur = '';
        $messageErreurMail = '';
        $messagereussite = '';

        try {

//            Je vérifie que les champs ne sont pas vide
            if (!empty($mail) && !empty($password)) {
                //            Je vérifie que le mail est correctement tapé
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $messageErreurMail .= 'mail invalide';

                }

                $data = [
                    'mail' => htmlspecialchars($mail),
                    'password' => htmlspecialchars($password),
                ];

                if (password_verify($password, $hashedPassword)) {


                    $clientRepository = new ClientRepository($gestionSQL);
                    $clientRepository->find($data);

                    // Authentification réussie
                    $messagereussite .= 'Connexion réussie !';
                }

                if ($_SESSION['id_role'] = 1) {
                    header('location: PageClient.php');
                } elseif ($_SESSION['id_role'] = 2) {
                    header('location: PageAdmin.php');
                } else {
                    // Authentification échouée
                    $messageErreur .= 'Mail et/ou mot de passe incorrect!';
                    header("location: PageConnexion.php");
                }

            }

            $this->render('PageConnexion', [
                'messageErreur' => $messageErreur,
                'messageReussite' => $messagereussite,
                'messageErreurMail' => $messageErreurMail
            ]);
        } catch (Exception $exception) {
            die($exception->getMessage());
        }

    }


//Je crée la méthode qui va servir de déconnexion du client sur sa session


}

