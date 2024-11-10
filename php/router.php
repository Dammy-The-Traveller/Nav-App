<?php 
//  dd($uri);
// if($uri === '/php/index.php'){
//     require 'Controllers/index2.php';
//  }else if ($uri === '/php/index.php/about'){
//     require 'Controllers/about.php';
//  }else if($uri === '/php/index.php/contact'){
//     require 'Controllers/contact.php';
//  }

$routes = require ("route.php");
function abort($code = 404){
    http_response_code($code);

    require "veiws/{$code}.php";

    die();
}

function routeTocontroller($uri, $routes){
    if(array_key_exists($uri, $routes)){
        require $routes[$uri];
    }else{
        abort();
    }
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
routeTocontroller($uri, $routes);
?>