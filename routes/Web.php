<?php

namespace routes;

use routes\base\Route;
use controllers\Account;
use controllers\AuthControler;
use controllers\TodoWeb;
use controllers\VideoWeb;
use utils\SessionHelpers;
use controllers\SampleWeb;

class Web
{
    function __construct()
    {
        $main = new SampleWeb();
        if (SessionHelpers::isLogin()){
            Route::Add('/', [$main, 'home']);
            Route::Add('/about', [$main, 'about']);
            Route::Add('/deco', [$main, 'deco']);
        } else {
            Route::Add('/', [$main, 'connection']);
            Route::Add('/connection', [$main, 'connection']);
        }

        $auth = new AuthControler();
        Route::Add('/login', [$auth, 'login']);

        Route::Add('/inscription', [$auth, 'inscription']);
        

        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }

        $todo = new TodoWeb();
        if (SessionHelpers::isLogin()){
            Route::Add('/todo/liste', [$todo, 'liste']);
            Route::Add('/todo/ajouter', [$todo, 'ajouter']);
            Route::Add('/todo/terminer', [$todo, 'terminer']);
            Route::Add('/todo/supprimer', [$todo, 'supprimer']);
        }
    }
}
