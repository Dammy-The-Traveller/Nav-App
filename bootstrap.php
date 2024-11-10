<?php 
use core\App;
use core\Container;
use core\Database;

$container = new Container();

$container->bind('core\Database', function(){
    $config = require base_path('config.php');
    return new Database($config['database']);
    
});

// $db = $container->resolve('core\Database');

App::setContainer($container);

