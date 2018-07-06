<?php
use App\classes\Amitie\AmitieManager;
$amitieManager=new AmitieManager();
$_SESSION['errors']['createAmitie']=$amitieManager->createAmitie($_SESSION['user']['id'],$numero)!=null?"Demande d'amitié envoyée avec succès":"La demande d'amitié n'a pas pu s'effectuer.Veuillez reéssayer";
header('Location:../../listeMembre');
