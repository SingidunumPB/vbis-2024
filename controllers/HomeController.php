<?php

namespace app\controllers;

use app\core\BaseController;

class HomeController extends BaseController
{
    public function home()
    {
        $this->view->render('home', 'main', null);
    }

    public function about()
    {
        $this->view->render('home', 'main', null);
    }
}