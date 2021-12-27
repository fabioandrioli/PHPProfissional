<?php

$result = [];
function validate(array $validations){
    foreach($validations as $field => $validate){
        if(!str_contains($validate,'|')){
           $result[$field] = $validate($field);
        }else{
            $explodePipeValidade = explode('|',$validate );
            foreach($explodePipeValidade as $validate){
                $result[$field] = $validate($field);
            }
        }
    }
    if(in_array(false,$result)){
        return false;
    }

    return $result;
}

function required($field)
{
    if($_POST[$field] === ''){
        setFlash($field,'O campo é obrigatório');
        return false;
    }

    return filter_input(INPUT_POST,$field, FILTER_SANITIZE_STRING);
}

function email($field){
    $emailValidate = filter_input(INPUT_POST,$field, FILTER_VALIDATE_EMAIL);
    if(!$emailValidate){
        setFlash($field,'Por favor, informe um email válido!');
        return false;
    }

    return filter_input(INPUT_POST,$field, FILTER_SANITIZE_STRING);
}

function maxlen(){
    
}

