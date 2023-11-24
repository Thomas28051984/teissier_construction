<?php

class connexionController extends Controller
{

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
}