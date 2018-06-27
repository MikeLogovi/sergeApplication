<?php
namespace App\view\traitement;
use App\view\application\liste_message\ForumManager;
$forumManager = new ForumManager();
if($forumManager->delete($numero)){
  $_SESSION['errors']['errsupprimermessage']='Message supprimé avec succès';
  header('Location:listeMessage');
}
else{
   $_SESSION['errors']['errsupprimermessage']='Erreur dans la suppression du message.Veuillez reéssayer';
   header('Location:listeMessage');
}
