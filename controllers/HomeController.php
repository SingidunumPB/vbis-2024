<?php

namespace app\controllers;

use app\core\BaseController;
use app\models\UserModel;
use app\models\UserReservedModel;

class HomeController extends BaseController
{
    public function home()
    {
        $model = new UserReservedModel();
        $results = $model->getReservedData();

        $this->view->render('home', 'main', $results);
    }

    public function about()
    {
        $this->view->render('home', 'main', null);
    }

    public function accessRole(): array
    {
        return ['Korisnik', 'Administrator'];
    }
}