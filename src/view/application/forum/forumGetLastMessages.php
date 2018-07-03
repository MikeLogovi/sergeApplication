<?php
session_start();
require('traitement/ForumManager.php');
          $forumManager=new ForumManager();
          $req=$forumManager->getLastMessages();

          //if($nbMessage->rowCount()!=0){
          ob_start();
 ?>
 <?php while($data=$req->fetch(PDO::FETCH_OBJ)){?>
   <?php if($data->id!=$_SESSION['user']['id']):?>
     <a href="#" class="dropdown-item">
            <!-- Message Start-->
            <div class="media">
              <img src="<?=$data->photoDeProfil?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <strong><?=$data->userName;?></strong>
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm"><?=$data->contenu;?></p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> <?=$data->datePublication;?></p>
              </div>
            </div>
            <!-- Message End -->
     </a>
   <?php endif;?>
<?php }?>
<?php
       $data=ob_get_clean();
       echo json_encode($data);
      /* else{
       $json['message']="Aucun message posté pour l'instant";
       echo json_encode($json['message']);
       }*/
?>
