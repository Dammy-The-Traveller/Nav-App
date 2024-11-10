<?php 
use core\Session;
use core\ValidationException;
session_start();
const BASE_PATH = __DIR__ .'/../';
require BASE_PATH .'/vendor/autoload.php';
require BASE_PATH . 'core/functions.php';

// spl_autoload_register(function($class){

//     //Core\Database
//     $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
//     require base_path("{$class}.php");
// });
 


require base_path("bootstrap.php");
 // require base_path('core/Router.php');
$router = new \core\Router();

$routes= require base_path('route.php');

$uri= parse_url($_SERVER['REQUEST_URI'])['path'];

$method= isset($_POST['__method'])? $_POST['__method']:$_SERVER['REQUEST_METHOD'];
try {
    $router->route( $uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);
    return redirect($router->previousUrl());
}

Session::unflash();

// $id = $_GET['id'];
// $query = "SELECT * FROM `post` WHERE id =?";
// $posts = $db->query($query, [$id])->fetch();

// foreach($posts as $post){
//     echo "<li>". $post['title']. "</li>";
// }
//dd($posts)
