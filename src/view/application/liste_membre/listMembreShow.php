<?php
session_start();
require('traitement/UserManager.php');
require('traitement/AmitieManager.php');
$userManager=new UserManager();
$amitieManager=new AmitieManager();
$req=$userManager->getList();
ob_start();
?>
   <?php while($data=$req->fetch(PDO::FETCH_OBJ)){?>
                    <tr>
                      <td><?=$data->id!=$_SESSION['user']['id']?$data->userName:'<strong style="color:green">Moi</strong>';?></td>
                      <td><a href='<?=$data->photoDeProfil;?>'><img class="brand-image img-circle elevation-3" src='<?=$data->photoDeProfil;?>'/></a></td></td>
                      <td>
<?php if($data->id!=$_SESSION['user']['id']):?>
                            <?php if(!$data2=$amitieManager->AmitieEnvoye($_SESSION['user']['id'],$data->id)->fetch(PDO::FETCH_OBJ)):?>
                               <?php if(!$data3=$amitieManager->AmitieEnvoye($data->id,$_SESSION['user']['id'])->fetch(PDO::FETCH_OBJ)):?>
                                        <a href='listeMembre/creerAmitie/<?=$data->id;?>' class='btn btn-warning'>Creer une amitié</a>
                               <?php else:?>
                                       <a href='#' class='btn btn-success'>Demande d'ami recu</a>
                                       <a href='#' class='btn btn-success accepterInvitation' id='<?=$data->id;?>'>Accepter</a>
                              <?php endif;?>
                            <?php else:?>
                                  <?php if($data2->amitieCree == 'false'):?>
                                       <a href='#' class='btn btn-primary'>Invitation d'ami envoyée</a>
                                       <a href='listeMembre/deleteAmitie/<?=$data->id;?>' class='btn btn-danger'>Annuler l'invitation</a>
                                  <?php else:?>
                                 <a href='#' class='btn btn-success'>Ami</a>
                                  <a href='#' class='btn btn-info inbox' id='<?=$data->userName;?>'>Inboxer</a>
                                  <a href='#' class='btn btn-danger rompre' id='<?=$data->id;?>'>Rompre l'amitié</a>
                                  <?php endif;?>
                            <?php endif;?>
<?php endif;?>

                      </td>
                    </tr>
  <?php }?>
  <script>
    $('.inbox').click(function(e){
      e.preventDefault();
      var nom = $(this).attr("id");
      document.location.href="/forumBluebeard/inbox/"+nom;
    });
    $('.rompre').click(function(e){
       e.preventDefault();
       var idt = $(this).attr("id");
        $.ajax({
          type:'POST',
          url:'src/view/application/liste_membre/traitement/rompreAmitieTreatment.php',
          data:{
                'id':idt
               },
          success:function(){
               alert('ok');
            }
        });

    });

    $('.accepterInvitation').click(function(e){
       e.preventDefault();
        var id=$(this).attr('id');

        $.ajax({
          type:'POST',
          url:'src/view/application/notifications/traitement/accepterInvitationTreatment.php',
          data:{
                'id':id
               },
          success:function(){

            }
        });


    });
  </script>
<?php
   $data=ob_get_clean();
   echo json_encode($data);
?>
