<?php
require_once 'app/core/Controller.php';

class HomeController extends Controller
{
    public function index(){
        return $this->views('frontend/pages/home');
    }
}