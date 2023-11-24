<?php

class logoutController extends Controller
{

//Je crée la méthode qui va servir de déconnexion du client sur sa session

    public function logout()
    {
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
    }
}
