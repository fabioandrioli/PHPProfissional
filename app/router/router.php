<?php

    function routes()
    {
       return require 'routes.php';
    }

    function exactMatchUriInArrayRoutes($uri,$routes){
        if(array_key_exists($uri,$routes)){
            return [$uri => $routes[$uri]];
        }
        return [];
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
        $routes = routes();
        $matchedUri = exactMatchUriInArrayRoutes($uri,$routes);

        if(empty($matchedUri)){
             
            $matchedUri = regularExpressionMatchArrayRoutes($routes,$uri);
            $uri = explode('/',ltrim($uri,'/'));
            $params = params($uri,$matchedUri);
            $params = formatParams($uri,$params);
        }
        
        if(!empty($matchedUri)){
            controller($matchedUri);
            return;
        }

        throw new Exception('Algo deu errado');
    }