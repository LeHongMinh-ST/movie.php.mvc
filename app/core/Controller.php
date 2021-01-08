<?php

class Controller
{
    const HOME_ADMIN = URL . '/admin/dashboard';
    const LOGIN = URL . '/admin/login';

    public function views($view, $data = [], $master = MASTER_BACKEND)
    {
        extract($data);
        require_once "./app/views/" . $master . ".php";
    }

    public function redirect($path)
    {
        header("location: $path");
    }

    public function isAuth(){
        return !empty($_SESSION['auth']);
    }
}

?>