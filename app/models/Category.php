<?php
require_once 'app/core/Model.php';

class Category extends Model
{
    protected $table = 'categories';

    public function __construct()
    {
        parent::__construct();
    }

}