<?php
require 'bootstrap.php';
try {
    $data = router();
    //o extract faz os indices virarem variaves imprimindo os dados dela.
    extract($data['data']);
    // extract(['name' => 'Fábio']);

    if (!isset($data['view'])){
        throw new exception('Está faltando o índice view');
    }

    if(!file_exists(VIEW.$data['view'])){
        throw new exception("Está view {$data['view']} não existe");
    }

    $view = $data['view'];
    
    require VIEW.'index.view.php';
}catch (Exception $e){
    var_dump($e->getMessage());
}