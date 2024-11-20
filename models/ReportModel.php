<?php

namespace app\models;

use app\core\Application;
use app\core\BaseModel;

class ReportModel extends BaseModel
{
    public function getNumberOfReservationsPerMonth()
    {
        $id_user = 0;
        $sessions = Application::$app->session->get('user');

        foreach ($sessions as $session) {
            $id_user = $session['id_user'];
        }

        $dbResult = $this->con->query("SELECT MONTHNAME(reservation_time) as 'month', count(id) as 'number_of_reservations' FROM reservations where id_user = $id_user group by MONTHNAME(reservation_time);");

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);
    }

    public function getPricePerMonth()
    {
        $id_user = 0;
        $sessions = Application::$app->session->get('user');

        foreach ($sessions as $session) {
            $id_user = $session['id_user'];
        }

        $dbResult = $this->con->query("SELECT MONTHNAME(reservation_time) as 'month',  sum(price) as 'price' FROM reservations where id_user = $id_user group by MONTHNAME(reservation_time);");

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);
    }

    public function tableName()
    {
        return '';
    }

    public function readColumns()
    {
        return [];
    }

    public function editColumns()
    {
        return [];
    }

    public function validationRules()
    {
        return [];
    }
}