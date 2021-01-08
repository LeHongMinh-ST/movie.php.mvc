<?php

class Controller
{
    public function getController($controllers)
    {
        require_once "app/controllers/" . $controllers . ".php";
        return new $controllers;
    }

    public function views($view, $data = [], $master = MASTER_BACKEND)
    {
        extract($data);
        require_once "./app/views/" . $master . ".php";
    }

    public function redirect($path)
    {
        header("location: $path");
    }
}

?>