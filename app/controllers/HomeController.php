<?php
require_once 'app/core/Controller.php';

class HomeController extends Controller
{
    public function index(){
        $user = new User();

        return $this->views("home");
    }

}