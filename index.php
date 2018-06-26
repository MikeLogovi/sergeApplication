<?php
session_start();
require('src/controller/frontend.php');
require('vendor/autoload.php');
$router=new App\Router\Router($_GET['url']);
$router->get('/',function(){homePage();});
$router->get('/acceuil',function(){homePage();});
$router->get('/inscription',function(){registration();});
$router->get('/connexion',function(){ connexion();});
$router->get('/application',function(){ application();});
$router->run();
