<?php
namespace app\controllers;
class User{
    function show($params){
        if(!isset($params['user'])){
            return redirect("/");
        }

        // $user = findBy('users','id',$params['user'],'id,email');
        $user = findBy('users','id',$params['user']);
        return [
            'view' => 'user/show.view.php',
            'data' => ['user' => $user],
        ];
    }
}