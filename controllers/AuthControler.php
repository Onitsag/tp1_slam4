<?php
namespace controllers;

use utils\Template;
use controllers\base\Web;
use utils\SessionHelpers;

class AuthControler extends Web
{
    function login($login = "", $password = ""): void
    {
        if (SessionHelpers::isLogin()) {
            $this->redirect("/");
        }

        $erreur = "";
        if (!empty($login) && !empty($password)) {
            $equipeM = new \models\AuthModel();
           
            $lequipe = $equipeM->login($login, $password);
            if ($lequipe != null) {
                SessionHelpers::login($lequipe);
                $this->redirect("/");
            } else {
                SessionHelpers::logout();
                $erreur = "Connexion impossible avec vos identifiants";
            }
        }

        Template::render("views/global/connection.php", array("erreur" => $erreur));
    }

    function inscription($login = "", $password = ""): void
    {
        if (SessionHelpers::isLogin()) {
            $this->redirect("/");
        }

        $erreur = "";
        if (!empty($login) && !empty($password)) {
            $equipeM = new \models\AuthModel();
           
            $equipeM->inscription($login, $password);

            $this->redirect("/connection");
        }

        Template::render("views/global/inscription.php", array("erreur" => $erreur));
    }
}