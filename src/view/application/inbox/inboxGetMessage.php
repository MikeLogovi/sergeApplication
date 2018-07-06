<?php
/*namespace App\view\application\forum;
use App\classes\application\forum\ForumManager;*/
session_start();
require('traitement/InboxManager.php');
          $inboxManager=new InboxManager();
          $req=$inboxManager->getConversations($_SESSION['user']['id'],$_SESSION['friend']['name']);
          $userManager = new UserManager();
          //$nbMessage=$forumManager->getNbMessage()->fetch(PDO::FETCH_OBJ);
          //if($nbMessage->rowCount()!=0){
          ob_start();
 ?>

<!------------------------------------------------------------------------------------------>
<?php while($data=$req->fetch(PDO::FETCH_OBJ)){ ?>
        <?php if(!($data->idAuteur==$_SESSION['user']['id'])):?>
                <?php
                 $data2=$userManager->readById($data->idAuteur)->fetch(PDO::FETCH_OBJ);
             ?>
                <div class="direct-chat-msg">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name float-left"><?=$data2->userName;?></span>
                            <span class="direct-chat-timestamp float-right"><?=$data->datePost;?></span>
                          </div>

                          <img class="direct-chat-img" src="<?=$data2->photoDeProfil;?>" alt="message user1 image">
                          <div class='titre'>
                            <?=$data->titre;?>
                          </div>
                          <div class="direct-chat-text">
                            <?=$data->contenu;?>
                          </div>

                </div>
        <?php else:?>
             <?php
                 $data2=$userManager->readById($data->idAuteur)->fetch(PDO::FETCH_OBJ);
               ?>
                <div class="direct-chat-msg right">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name float-right">Moi</span>
                            <span class="direct-chat-timestamp float-left"><?=$data->datePost;?></span>
                          </div>
                          <img class="direct-chat-img" src="<?=$data2->photoDeProfil;?>" alt="message user image">
                          <div class='titre'>
                            <?=$data->titre;?>
                          </div>
                          <div class="direct-chat-text">
                            <?=$data->contenu;?>
                          </div>
                </div>
       <?php endif ?>
 <?php } ?>

<?php
       $data=ob_get_clean();
       echo json_encode($data);
      /* else{
       $json['message']="Aucun message posté pour l'instant";
       echo json_encode($json['message']);
       }*/
?>
