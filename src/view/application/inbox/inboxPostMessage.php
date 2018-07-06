<?php
session_start();
require('traitement/InboxManager.php');
extract($_POST);

$inboxManager=new InboxManager();

if($inboxManager->createConversation($_SESSION['user']['id'],$_SESSION['friend']['name'],
  htmlspecialchars($titre),$message))
{










  echo '1';
}
else echo'0';
