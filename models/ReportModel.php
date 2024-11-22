<?php

namespace app\models;

use app\core\Application;
use app\core\BaseModel;
use DateTime;

class ReportModel extends BaseModel
{
    public string $from = '';
    public string $to = '';

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

    public function getPricePerUser()
    {
        if (!$this->from || $this->from == '') {
            $fromDate = new DateTime('2024-01-01');
            $this->from = $fromDate->format('Y-m-d');
        }

        if (!$this->to  || $this->to == '') {
            $toDate = new DateTime();
            $this->to = $toDate->format('Y-m-d');
        }

        $dbResult = $this->con->query("select u.email,
                                                     sum(price) as price
                                              from reservations r
                                              left join users u on r.id_user = u.id
                                              where date(reservation_time) between  '$this->from' and  '$this->to'
                                              group by u.email;");

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