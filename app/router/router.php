<?php

    function exactMatchUriInArrayRoutes($uri,$routes)
    {
        return (array_key_exists($uri,$routes)) ? 
        [$uri => $routes[$uri]] :
        [];
    }

    function regularExpressionMatchArrayRoutes($routes,$uri){
        return  array_filter(
            $routes,
            function($value) use($uri){
                $regex = str_replace('/','\/',ltrim($value,'/'));
                return preg_match("/^$regex$/",ltrim($uri,'/'));
            },
            ARRAY_FILTER_USE_KEY
        );
    }

    function params($uri,$matchedUri){
        if(!empty($matchedUri)){
            $matchedToGetParams = array_keys($matchedUri)[0];
           return array_diff(
               $uri,
                explode('/',ltrim($matchedToGetParams,'/')),
            );
        }
        return [];
    }

    function formatParams($uri,$params){
       
        $paramsData = [];
        foreach ($params as $index => $params){
            $paramsData[$uri[$index - 1]] = $params;
        }
        return $paramsData;
    }

    function router()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        $routes = require 'routes.php';
        $requestMethod = $_SERVER['REQUEST_METHOD'];
    
        $matchedUri = exactMatchUriInArrayRoutes($uri,$routes[$requestMethod]);

        $params = [];
        if(empty($matchedUri)){
       
            $matchedUri = regularExpressionMatchArrayRoutes($routes[$requestMethod],$uri);
            $uri = explode('/',ltrim($uri,'/'));
            $params = params($uri,$matchedUri);
            $params = formatParams($uri,$params);
        }
        
        if(!empty($matchedUri)){
            return controller($matchedUri,$params);
        }

        throw new Exception('Algo deu errado');
    }