<?php
session_start();
require('AmitieManager.php');
$amitieManager=new AmitieManager();

extract($_POST);
$_SESSION['errors']['amitieaccepter']=$amitieManager->accepterInvitation($_SESSION['user']['id'],$id)!=null?'Nouvelle amitié crée':"L'amitié n'a pas pu se créer à cause d'une erreur .Veuillez reéssayer";

