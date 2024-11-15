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

        if ($controllerRoles == []) {
            return;
        }

        $hasAccess = false;

        foreach ($sessionUserData as $userData) {
            $userRole = $userData['role'];

            foreach ($controllerRoles as $controllerRole) {
                if ($userRole == $controllerRole) {
                    $hasAccess = true;
                }
            }
        }

        if ($hasAccess) {
            return;
        } else {
            header("location:" . "/accessDenied");
        }
    }
}