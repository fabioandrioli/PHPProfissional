<?php

    function connect(){
        return new PDO("mysql:host=localhost;dbname=php","root","",[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            //isso faz com que podemos trabalhar no formato objeto
            // antigo user['name']
            //novo user->name
        ]);
    }