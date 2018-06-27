<?php
session_start();
require('src/controller/frontend.php');
require('vendor/autoload.php');

$router=new App\Router\Router($_GET['url']);

$router->get('/',function(){homePage();});

$router->get('/acceuil',function(){homePage();});

$router->get('/inscription',function(){registration();});

$router->get('/formularTreatment',function(){ formularTreatment();});
$router->post('/formularTreatment',function(){ formularTreatment();});

$router->get('/connexion',function(){ connexion();});

$router->get('/connexionTreatment',function(){connexionTreatment();});
$router->post('/connexionTreatment',function(){connexionTreatment();});

$router->get('/application',function(){ application();});

$router->get('/forum',function(){ forum();});
$router->post('/forum',function(){ forum();});

$router->get('/listeEtudiant',function(){ listeEtudiant();});
$router->post('/listeEtudiant',function(){ listeEtudiant();});

$router->get('/listeMessage',function(){ listeMessage();});
$router->post('/listeMessage',function(){ listeMessage();});

$router->get('/listeMessage/supprimer/:numero',function($numero){supprimerMessage($numero);})->with('numero','[0-9]+');
$router->post('/listeMessage/supprimer/:numero',function($numero){supprimerMessage($numero);})->with('numero','[0-9]+');

$router->get('/profil',function(){ profil();});
$router->post('/profil',function(){ profil();});

$router->get('/modifProfil',function(){ modifProfil();});
$router->post('/modifProfil',function(){ modifProfil();});

$router->get('/modifProfilTreatment',function(){ modifProfilTreatment();});
$router->post('/modifProfilTreatment',function(){ modifProfilTreatment();});

$router->get('/supprimerProfil',function(){ supprimerProfil();});
$router->post('/supprimerProfil',function(){ supprimerProfil();});

$router->get('/deconnexion',function(){ deconnexion();});
$router->post('/deconnexion',function(){ deconnexion();});

$router->run();
