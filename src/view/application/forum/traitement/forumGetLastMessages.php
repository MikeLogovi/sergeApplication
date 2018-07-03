<?php
session_start();
require('traitement/ForumManager.php');
          $forumManager=new ForumManager();
          $req=$forumManager->getMessage();
          $nbMessage=$forumManager->getNbMessage()->fetch(PDO::FETCH_OBJ);
          //if($nbMessage->rowCount()!=0){
          ob_start();
 ?>

<?php

?>
<?php
       $data=ob_get_clean();
       echo json_encode($data);
      /* else{
       $json['message']="Aucun message posté pour l'instant";
       echo json_encode($json['message']);
       }*/
?>
