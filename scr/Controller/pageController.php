<?php


class pageController extends Controller
{

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }


    public function register(GestionSQL $gestionSQL, $request)
    {
        $nom = trim($request['nom'] ?? '');
        $prenom = trim($request['prenom'] ?? '');
        $mail = trim($request['mail'] ?? '');
        $password = trim($request['password'] ?? '');
        $messageErreur = '';
        try {
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $messageErreur = 'mail invalide';
            }
            if (!empty($password) && !empty($prenom) && !empty($nom) && !empty($mail)) {
                $data = [
                    'nom' => htmlspecialchars($nom),
                    'prenom' => htmlspecialchars($prenom),
                    'mail' => htmlspecialchars($mail),
                    'password' => md5($password),

                ];
                $inscriptionRepository = new ClientRepository($gestionSQL);
                $inscriptionRepository->insert($data);
                $messagereussite = 'Inscription réussie !';
                echo $messagereussite;
            } else {

                $messageErreur = 'Veuillez completer tous les champs';
            }



            $this->render('Accueil');
        } catch (Exception $exception) {
            die($exception->getMessage());
        }

    }


    public function login(GestionSQL $gestionSQL, $request)
    {
        $message = '';
        $mail = trim($request['mail'] ?? '');
        $password = trim($request['password'] ?? '');
        $check = new GestionSQL();
        $data = $check->find('SELECT mail
                                    FROM user WHERE mail = :mail', ['mail' => $mail]);
        $messageErreur = '';
        if (count($data) > 0) {
            $_SESSION['mail'] = $data['mail'];
            echo $_SESSION['mail'] = 'Connecté en tant que <br>' . $mail;

            $this->redir('index');
        }

        $this->render('PageClient');
    }





public function logout() {
    // Détruire la session existante
    session_destroy();

    // Rediriger vers la page index
    header("Location: index.php");
    exit();
}
}



