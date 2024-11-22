<?php

namespace app\controllers;

use app\core\BaseController;
use app\models\ReportModel;

class AdminReportController extends BaseController
{
    public function adminReports()
    {
        $this->view->render('adminReports', 'main', null);
    }

    public function getPricePerUser()
    {
        $model = new ReportModel();
        $model->mapData($_GET);
        $model->getPricePerUser();
    }

    public function accessRole(): array
    {
        return ['Administrator'];
    }
}