<?php

namespace app\controllers;

use app\core\BaseController;
use app\models\UserModel;

class UserController extends BaseController
{
    public function readUser()
    {
        $model = new UserModel();
        $model->one("where id = 2");

        $this->view->render('getUser', 'main', $model);
    }

    public function readAll()
    {
        $model = new UserModel();

        $results = $model->all("");

        $this->view->render('users', 'main', $results);
    }

    public function updateUser()
    {
        $model = new UserModel();

        $model->mapData($_GET);

        $model->one("where id = $model->id");

        $this->view->render('updateUser', 'main', $model);
    }

    public function processUpdateUser()
    {
        $model = new UserModel();

        $model->mapData($_POST);

        $model->update("where id = $model->id");

        header("location:" . "/users");
    }


    public function createUser()
    {

        $model = new UserModel();

        $this->view->render('createUser', 'main', $model);
    }

    public function processCreate()
    {
        $model = new UserModel();

        $model->mapData($_POST);

        $model->validate();

        if ($model->errors) {
            $this->view->render('createUser', 'main', $model);
            exit;
        }

        $model->insert();

        header("location:" . "/users");
    }
}