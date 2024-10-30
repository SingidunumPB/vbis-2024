<?php

namespace app\controllers;

use app\core\BaseController;
use app\models\UserModel;

class UserController extends BaseController
{
    public function readUser()
    {
        $model = new UserModel();
        $model->email = 'pbisevac@singidunum.ac.rs';
        $model->firstName = 'Nikola';
        $model->lastName = 'Bisevac';

        $this->view->render('getUser', 'main', $model);
    }
}