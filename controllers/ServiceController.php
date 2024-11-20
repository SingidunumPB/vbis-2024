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

    public function listForUsers()
    {
        $model = new ServiceModel();

        $results = $model->all("");

        $this->view->render('servicesForUser', 'auth', $results);
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

        $target_dir = __DIR__ . "/../public/assets/uploads/";
        $original_file_name = basename($_FILES["file"]["name"]);
        $file_extension = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));
        $new_file_name = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_file_name;

        if (file_exists($target_file)) {
            Application::$app->session->set('errorNotification', 'File already exists!');
            $this->view->render('createService', 'main', $model);
            exit;
        }

        if ($_FILES["file"]["size"] > 5000000) {
            Application::$app->session->set('errorNotification', 'File is too large!');
            $this->view->render('createService', 'main', $model);
            exit;
        }

        if ($file_extension != "jpg" && $file_extension != "png" && $file_extension != "jpeg") {
            Application::$app->session->set('errorNotification', 'File format is not allowed!');
            $this->view->render('createService', 'main', $model);
            exit;
        }

        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            Application::$app->session->set('errorNotification', 'Failed upload!');
            $this->view->render('createService', 'main', $model);
            exit;
        }

        $model->image_name = $new_file_name;
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

        $target_dir = __DIR__ . "/../public/assets/uploads/";
        $original_file_name = basename($_FILES["file"]["name"]);
        $file_extension = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));
        $new_file_name = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_file_name;

        if (file_exists($target_file)) {
            Application::$app->session->set('errorNotification', 'File already exists!');
            $this->view->render('createService', 'main', $model);
            exit;
        }

        if ($_FILES["file"]["size"] > 5000000) {
            Application::$app->session->set('errorNotification', 'File is too large!');
            $this->view->render('createService', 'main', $model);
            exit;
        }

        if ($file_extension != "jpg" && $file_extension != "png" && $file_extension != "jpeg") {
            Application::$app->session->set('errorNotification', 'File format is not allowed!');
            $this->view->render('createService', 'main', $model);
            exit;
        }

        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            Application::$app->session->set('errorNotification', 'Failed upload!');
            $this->view->render('createService', 'main', $model);
            exit;
        }

        $model->image_name = $new_file_name;

        $model->update("where id = $model->id");

        Application::$app->session->set('successNotification', 'Uspesna promena!');

        header("location:" . "/services");
    }


    public function accessRole()
    {
        return ['Administrator'];
    }
}