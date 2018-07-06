<?php
session_start();
require('AmitieManager.php');
$amitieManager=new AmitieManager();
extract($_POST);

$_SESSION['errors']['amitierompu']=$amitieManager->rompreAmitie($_SESSION['user']['id'],$id)!=null?'Amitié rompu avec succès':"L'amitié n'a pas pu se rompre à cause d'une erreur .Veuillez reéssayer";
