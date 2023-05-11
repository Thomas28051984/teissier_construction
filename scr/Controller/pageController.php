<?php


class PageController extends Controller
{
//Je crée la méthode construct et la session start pour la connexion de l'utilisateur
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
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


        $mail = trim($request['mail'] ?? '');
        $check = new GestionSQL();
        $data = $check->find('SELECT mail
                                    FROM client WHERE mail = :mail', ['mail' => $mail]);
        if (count($data) > 0) {
            $_SESSION['mail'] = $data['mail'];
            echo $_SESSION['mail'] = 'Connecté en tant que <br>' . $mail;

            $this->redir('PageClient');
        }

        $this->render('PageConnexion');
    }


//Je crée la méthode qui va servir de déconnexion du client sur sa session

    #[NoReturn] public function logout(): void
    {
        // Détruire la session existante
        session_destroy();

        // Rediriger vers la page index
        header("Location: index.php");
        exit();
    }
}



