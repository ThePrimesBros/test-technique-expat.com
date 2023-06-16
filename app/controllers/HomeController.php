<?php

namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\Article;

class HomeController extends Controller
{
    protected $hommeController;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('layout');
    }
}
