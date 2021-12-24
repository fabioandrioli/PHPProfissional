<?php
require 'bootstrap.php';
try {
    $data = router();
    //o extract faz os indices virarem variaves imprimindo os dados dela.
    // extract(['name' => 'Fábio']);
    
    if (!isset($data['data'])){
        throw new exception('Está faltando o índice data');
    }
    
    if (!isset($data['view'])){
        throw new exception('Está faltando o índice view');
    }
    
    if(!file_exists(VIEW.$data['view'])){
        throw new exception("Está view {$data['view']} não existe");
    }
    
    extract($data['data']);
    
    $view = $data['view'];

    require VIEW.'index.view.php';
}catch (Exception $e){
    var_dump($e->getMessage());
}