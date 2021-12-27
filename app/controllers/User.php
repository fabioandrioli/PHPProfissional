<?php
namespace app\controllers;
class User{

    public function create(){
        return [
            'view' => 'user/create.view.php',
            'data' => [''],
        ];
    }


    public function store()
    {
        $validate = validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|email|maxlen',
        ]);

        if(!$validate){
            return redirect('/user/create');
        }
        
    }

    function show($params)
    {
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