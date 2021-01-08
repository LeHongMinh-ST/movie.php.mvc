<?php
require_once 'app/core/Controller.php';

class DashboardController extends Controller
{
    public function __construct()
    {
        if (!$this->isAuth()) {
            return $this->redirect(URL . '/admin/login');
        }
    }

    public function index()
    {
        return $this->views('dashboard');
    }

}