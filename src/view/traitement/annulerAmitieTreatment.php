<?php
use App\classes\Amitie\AmitieManager;
$amitieManager=new AmitieManager();
$_SESSION['errors']['annulerAmitie']=$amitieManager->deleteAmitie($_SESSION['user']['id'],$numero)!=null?"Annulation de l'invitation effectuée avec succès":"L'annulation n'a pas pu s'effectuer.Veuillez reéssayer";
header('Location:../../listeMembre');
