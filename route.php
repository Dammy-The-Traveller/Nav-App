<?php

// return [
//     '/' => 'Controllers/index.php',
   
//     '/index.php/about.php' => 'Controllers/about.php',
   
//     '/index.php/Notes.php' => 'Controllers/Notes/Index.php',
    
//     '/index.php/Notes' => 'Controllers/Notes/Show.php',
    
//     '/index.php/Notes/Create.php' => 'Controllers/Notes/Create.php',
   
//     '/index.php/contact.php' => 'Controllers/contact.php',
// ];

$router->get("/","index.php");
$router->get("/index.php/about.php","about.php");
$router->get("/index.php/contact.php","contact.php");

$router->get("/index.php/Notes.php","Notes/Index.php")->only("auth");
$router->get("/index.php/Notes","Notes/Show.php");
$router->delete("/index.php/Notes","Notes/destroy.php");

$router->get("/index.php/Notes/edit.php","Notes/edit.php");
$router->patch("/index.php/Notes","Notes/update.php");

$router->get("/index.php/Notes/Create.php","Notes/Create.php");
$router->post("/index.php/Notes","Notes/store.php");

$router->get("/index.php/register.php","registration/Create.php")->only("guest");
$router->post("/index.php/register","registration/store.php")->only("guest");


$router->get("/index.php/login.php","Sessions/Create.php")->only("guest");
$router->post("/index.php/login","Sessions/store.php")->only("guest");

$router->delete("/index.php/logout","Sessions/destroy.php")->only("auth");