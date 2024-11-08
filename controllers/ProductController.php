<?php

namespace app\controllers;

use app\core\BaseController;
use app\models\ProductModel;
use app\models\UserModel;

class ProductController extends BaseController
{

    public function products()
    {
        $model = new ProductModel();

        $results = $model->all("");

        $this->view->render('products', 'main', $results);
    }

    public function update()
    {
        $model = new ProductModel();

        $model->mapData($_GET);

        $model->one("where id = $model->id");

        $this->view->render('updateProduct', 'main', $model);
    }

    public function processUpdate()
    {
        $model = new ProductModel();

        $model->mapData($_POST);

        $model->validate();

        if ($model->errors) {
            $this->view->render('updateProduct', 'main', $model);
            exit;
        }

        $model->update("where id = $model->id");

        header("location:" . "/products");
    }
}