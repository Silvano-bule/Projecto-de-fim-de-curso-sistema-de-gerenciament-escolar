<?php 
namespace App\controllers;

class homeController
{
    public function render()
    {
        require_once __DIR__ . '/../views/homeViews.php';
    }
}