<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\models\ServiceModel;

class UserServicesController extends BaseController
{
    public function listForUsers()
    {
        $model = new ServiceModel();

        $results = $model->all("");

        $this->view->render('servicesForUser', 'auth', $results);
    }

    public function processReservation()
    {
        echo "<pre>";
        var_dump($_POST); exit;
        $model = new ServiceModel();

        $results = $model->all("");

        $this->view->render('servicesForUser', 'auth', $results);
    }

    public function accessRole()
    {
        return [];
    }
}