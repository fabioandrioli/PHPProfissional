<?php
namespace app\controllers;
class Login{
    public function index(){
        return [
            'view' => 'login/login.view.php',
            'data' => ['login' => 'login'],
        ];
    }
} 