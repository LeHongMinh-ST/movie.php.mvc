<?php
require_once 'app/core/Model.php';

class Video extends Model
{
    protected $table = 'videos';

    public function __construct()
    {
        parent::__construct();
    }

}