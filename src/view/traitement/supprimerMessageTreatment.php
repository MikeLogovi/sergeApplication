<?php
use App\view\application\liste_message\ForumManager;
$_SESSION['errors']['errsupprimermessage']=(new ForumManager())->delete($numero)!=null?
'Message supprimé avec succès ':'Erreur dans la suppression du message.Veuillez reéssayer';
header('Location:../../listeMessage');
