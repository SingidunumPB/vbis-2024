<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\models\ServiceModel;

class ServiceController extends BaseController
{
    public function list()
    {
        $model = new ServiceModel();

        $results = $model->all("");

        $this->view->render('services', 'main', $results);
    }


    public function create()
    {
        $model = new ServiceModel();

        $this->view->render('createService', 'main', $model);
    }

    public function update()
    {
        $model = new ServiceModel();

        $model->mapData($_GET);

        $model->one("where id = $model->id");

        $this->view->render('updateService', 'main', $model);
    }


    public function processCreate()
    {
        $model = new ServiceModel();

        $model->mapData($_POST);

        $model->validate();

        if ($model->errors) {
            Application::$app->session->set('errorNotification', 'Neuspesno kreiranje!');
            $this->view->render('createService', 'main', $model);
            exit;
        }

        $model->insert();

        Application::$app->session->set('successNotification', 'Uspesno kreiranje!');

        header("location:" . "/services");
    }

    public function processUpdate()
    {
        $model = new ServiceModel();

        $model->mapData($_POST);

        $model->validate();

        if ($model->errors) {
            Application::$app->session->set('errorNotification', 'Neuspesna promena!');
            $this->view->render('updateService', 'main', $model);
            exit;
        }

        $model->update("where id = $model->id");

        Application::$app->session->set('successNotification', 'Uspesna promena!');

        header("location:" . "/services");
    }


    public function accessRole()
    {
        return ['Administrator'];
    }
}