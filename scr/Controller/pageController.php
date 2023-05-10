<?php


class pageController extends Controller
{
//Je crée la méthode construct et la session start pour la connexion de l'utilisateur
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }


    public function register(GestionSQL $gestionSQL, $request)
    {
//        Je crée les variables du formulaire et je supprime les espaces
        $nom = trim($request['nom'] ?? '');
        $prénom = trim($request['prénom'] ?? '');
        $mail = trim($request['mail'] ?? '');
        $password = trim($request['password'] ?? '');
        $messageErreur = 'mail invalide';

        try {
//            Je vérifie que le mail est correctement tapé
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                echo $messageErreur;
                die();
            }
//            Je vérifie que les champs existent et qu'ils ne sont pas vide
            if (!empty($password) && !empty($prenom) && !empty($nom) && !empty($mail) && isset($_POST[$nom]) && isset($_POST[$prenom]) && isset($_POST[$mail])) {
                $data = [
                    'nom' => htmlspecialchars($nom),
                    'prenom' => htmlspecialchars($prénom),
                    'mail' => htmlspecialchars($mail),
                    'password' => md5($password),

                ];
                $clientRepository = new ClientRepository($gestionSQL);
                $clientRepository->insert($data);
                $messagereussite = 'Inscription réussie !';
                $messageErreur == 'Veuillez completer tous les champs';
                echo $messagereussite;

            } else {
                echo $messageErreur;
            }



            $this->render('Accueil');
        } catch (Exception $exception) {
            die($exception->getMessage());
        }

    }

//    Je crée la méthode pour permettre la connexion du client
    public function login(GestionSQL $gestionSQL, $request)
    {


        $mail = trim($request['mail'] ?? '');
        $check = new GestionSQL();
        $data = $check->find('SELECT mail
                                    FROM client WHERE mail = :mail', ['mail' => $mail]);
        $messageErreur = 'hyterhtyh';
        if (count($data) > 0) {
            $_SESSION['mail'] = $data['mail'];
            echo $_SESSION['mail'] = 'Connecté en tant que <br>' . $mail;

            $this->redir('index');
        }

        $this->render('PageClient');
    }



//Je crée la méthode qui va servir de déconnexion du client sur sa session

public function logout() {
    // Détruire la session existante
    session_destroy();

    // Rediriger vers la page index
    header("Location: index.php");
    exit();
}
}



