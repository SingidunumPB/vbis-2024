<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\models\ReservationModel;
use app\models\ServiceModel;

class ReservationController extends baseController
{
    public function processReservation()
    {
        $model = new ReservationModel();

        $model->mapData($_POST);

        $model->one("where date(reservation_time) = '$model->reservation_time' and id_services = $model->id_services");

        if(isset($model->id)){
            Application::$app->session->set('errorNotification', 'Vec postoji zakazani termin za izabrani datum!');
            header("location:" . "/servicesForUser");
        }

        $sessions = Application::$app->session->get('user');

        foreach ($sessions as $session) {
            $model->id_user = $session['id_user'];
        }

        $model->insert();
        Application::$app->session->set('successNotification', 'Uspesno rezervisan termin!');

        header("location:" . "/");
    }

    public function accessRole()
    {
        return ['Korisnik', 'Administrator'];
    }
}