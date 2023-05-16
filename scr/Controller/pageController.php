<?php


class PageController extends Controller
{
//Je crée la méthode construct et la session start pour la connexion de l'utilisateur
    public function init_php_session() :bool
    {
        if (!session_id()){
            session_start();
            session_regenerate_id();

            return true;
        }
        return false;

        $this->render('PageConnexion',[

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
//    public function login($request): void
//    {
//        $mail = trim($request['mail'] ?? '');
//        $check = new GestionSQL();
//        $data.=
//        $data = $check->find('SELECT * FROM client',$data);
//        if (count($data) > 0) {
//            $_SESSION['mail'] = $data['mail'];
//            echo $_SESSION['mail'] = 'Connecté en tant que <br>' . $mail;
//
//
//        }
//
//        $this->render('PageConnexion',[
//
//        ]);
//    }


//Je crée la méthode qui va servir de déconnexion du client sur sa session

    public function clean_php_session(): void
    {
        session_unset();
        // Détruire la session existante
        session_destroy();

        // Rediriger vers la page index
        header("Location: index.php");
        exit();
    }
}



