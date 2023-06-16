<?php

namespace App\Controllers;

class View
{
    public function render($template, $data = [])
    {
        extract($data);
        $viewPath = dirname(__DIR__) . '/views/' . strtolower($template) . '.php';
        include $viewPath;
    }  
}    
