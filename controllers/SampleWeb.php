<?php

namespace controllers;

use controllers\base\Web;
use utils\Template;

class SampleWeb extends Web
{
    function home()
    {
        Template::render("views/global/home.php", array("date" => date("d-m-Y à H:i")));
    }

    function about()
    {
        Template::render("views/global/about.php", array("titre" => "A propos", "date" => date("d-m-Y à H:i")));
    }

}