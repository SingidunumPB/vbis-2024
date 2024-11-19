<?php

namespace app\core;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? false;
    }

    public function delete($key)
    {
        unset($_SESSION[$key]);
    }

    public function showSuccessNotification()
    {
        $message = $this->get("successNotification");
        if ($message) {
            echo "
            <script>
                toastr.success('$message')
            </script>
            ";

            $this->delete("successNotification");
        }
    }

    public function showErrorNotification()
    {
        $message = $this->get("errorNotification");

        if ($message) {
            echo "
            <script>
                toastr.error('$message')
            </script>
            ";

            $this->delete("errorNotification");
        }
    }

    public function isInRole($role): bool
    {
        $isInRole = false;

        $sessions = Application::$app->session->get('user');

        foreach ($sessions as $session) {
            if ($session['role'] == $role) {
                $isInRole = true;
            }
        }

        return $isInRole;
    }
}