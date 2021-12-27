<?php
namespace app\controllers;
class Login{
    public function index(){
        return [
            'view' => 'login/login.view.php',
            'data' => ['login' => 'login'],
        ];
    }

    public function store(){
        
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);

        if(empty($email) || empty($password)){
            return setMessageAndRedirect('message','Email ou senha incorretos!','/login');
        }

        $user = findBy('users','email',$email);

        
        if(!$user){
            return setMessageAndRedirect('message','Email ou senha incorretos!','/login');
        }

        // var_dump(password_verify($password,$user->password));

        if(!($password === $user->password)){
            return setMessageAndRedirect('message','Email ou senha incorretos!','/login');
        }

        $_SESSION[LOGGED] = $user;
        return redirect("/"); 
    }

    public function destroy(){
        unset($_SESSION[LOGGED]);
        return redirect("/");
    }
} 