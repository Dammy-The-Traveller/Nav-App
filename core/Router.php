<?php 
namespace core;

use core\middleware\Middleware;
class Router{
    protected $routes=[];

    public function add($method,$uri,$controller){
        $this->routes[] = [
            "uri"=> $uri,
            "controller"=> $controller,
            'method'=> $method,
            'middleware'=> null
        ];
        return $this;
    }
    public function get($uri, $controller){
      return $this->add('GET', $uri, $controller);
    }
    public function post($uri, $controller){
        return $this->add('POST', $uri, $controller);
    }
    public function delete($uri, $controller){
        return $this->add('DELETE', $uri, $controller);
    }
    public function put($uri, $controller){
        return $this->add('PUT', $uri, $controller);
    }
    public function patch($uri, $controller){
        return $this->add('PATCH', $uri, $controller);
    }

    public function only($key){
        $this->routes[array_key_last($this->routes)]['middleware']=$key;
        return $this;
    }

    public function route($uri, $method){
        foreach($this->routes as $route){
            if($route['uri'] == $uri && $route['method'] == strtoupper($method)){
                    Middleware::resolve($route['middleware']);
                return  require base_path('Http/Controllers/'. $route['controller']);
        };
    };

    $this->abort();
}

public function previousUrl(){
    return $_SERVER['HTTP_REFERER'];
}
 
    public function abort($code = 404){
    http_response_code($code);

    require base_path("veiws/{$code}.php");

    die();
}
}




















//  dd($uri);
// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// if($uri === '/'){
//     require 'Controllers/index.php';

//  }else if ($uri === '/about.php'){
   
//     require 'Controllers/about.php';
//  }else if($uri === '/contact'){
//     require 'Controllers/contact.php';
//  }

// $routes = require base_path("route.php");
// function abort($code = 404){
//     http_response_code($code);

//     require base_path("veiws/{$code}.php");

//     die();
// }

// function routeTocontroller($uri, $routes){
//     if(array_key_exists($uri, $routes)){
//         require base_path($routes[$uri]);
//     }else{
//         abort();
//     }
// }

// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// routeTocontroller($uri, $routes);
