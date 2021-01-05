<?php
require_once 'app/core/Model.php';

class Movie extends Model
{
    protected $table = 'movies';

    public function __construct()
    {
        parent::__construct();
    }

}