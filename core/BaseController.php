<?php

namespace app\core;

abstract class BaseController
{
    public View $view;

    abstract public function accessRole();

    public function __construct()
    {
        $this->view = new View();

        $controllerRoles = $this->accessRole();

        $sessionUserData = Application::$app->session->get('user');

        if ($controllerRoles == [])
        {
            return;
        }
    }
}