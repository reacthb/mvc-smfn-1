<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomeController {
    public function home() {
        //var_dump(__DIR__, __LINE__, __CLASS__);die();  
        require(__DIR__ . '\..\..\templates\view\homeView.php');
        return(new Response());
    }
}
