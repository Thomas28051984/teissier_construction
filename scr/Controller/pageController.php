<?php


class PageController extends Controller
{

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
    public function login(): void
    {


        if (!empty($_POST)) {
            if (!empty($_POST['mail']) && !empty($_POST['password'])) {
                if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    die("Ce n'est pas un E-mail!");
                }
                if (!password_verify($_POST['password'], $user['password'])) {
                    die("L'utilisateur et/ou le mot de passe est incorrect!");
                }

                $clientRepository = new ClientRepository($gestionSQL);
                $clientRepository->connexionUser();


                session_start();
                $_SESSION['user'] = [
                    "id" => $user['id'],
                    "nom" => $user['nom'],
                    "prenom" => $user['prenom'],
                    "email" => $user['mail'],
                    "role" => $user['id_role'],
                    "societe" => $user['id_societe']
                ];

                if ($_SESSION['id_role'] = 1) {
                    header("location: PageClient.php");
                } elseif ($_SESSION['id_role'] = 2) {
                    header("location: PageAdmin.php");
                } else {
                    header("location: index.php");
                }
            }
        }
    }
}









