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
            if (!empty($password) && !empty($prenom) && !empty($nom)) {
                $data = [
                    'nom' => htmlspecialchars($nom),
                    'prenom' => htmlspecialchars($prenom),
                    'mail' => htmlspecialchars($mail),
                    'password' => md5($password),

                ];
                $inscriptionRepository = new ClientRepository($gestionSQL);
                $inscriptionRepository->insert($data);
                $messageReussite = 'Inscription réussie !';
                echo $messageReussite;
            } else {

                $messageErreur = 'Veuillez completer tous les champs';
            }


            $this->render('PageInscription');
        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }
}

//
//    public function login(GestionSQL $gestionSQL, $request)
//    {
//        $message = '';
//        $mail = trim($request['mail'] ?? '');
//        $password = trim($request['password'] ?? '');
//        $check = new GestionSQL();
//        $data = $check->find('SELECT mail
//                                    FROM user WHERE mail = :mail', ['mail' => $mail]);
//        if (count($data) > 0) {
//            $_SESSION['mail'] = $data['mail'];
//            echo $_SESSION['mail'] = 'connecté en tant que <br>' . $mail;
//
//            $this->redir('index');
//        }
//        $this->render('pageConnexion');
//    }
//
//
//    public function logout(GestionSQL $gestionSQL)
//    {
//        session_destroy();
//        $this->render('accueil');
//    }
//
//}
