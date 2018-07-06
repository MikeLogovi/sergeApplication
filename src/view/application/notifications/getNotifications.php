<?php
session_start();
 require('traitement/AmitieManager.php');
 $amitieManager = new AmitieManager();
 $req=$amitieManager->getDemandeAmitie($_SESSION['user']['id']);
 ob_start();
 ?>
  <li class="nav-item dropdown">
     <a class="nav-link" data-toggle="dropdown" href="#">
       <i class="fa fa-bell-o"></i>
       <?php $nb=$req->rowCount();?>
        <span class="badge badge-warning navbar-badge"><?=$nb;?></span>
     </a>
     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header"> <i class="fa fa-users mr-2"></i>
      <?php if($nb==0):?>
      AUCUNE DEMANDE D'AMI
      <?php elseif($nb==1):?>
        UNE DEMANDE D'AMI
      <?php else:?>
        <?=$nb?> DEMANDES D'AMI
      <?php endif;?>
      </span>
       <div class="dropdown-divider"></div>
         <?php $i=1;?>
            <?php while($data=$req->fetch(PDO::FETCH_OBJ)){?>

                <?php if($data->amitieCree=='false'):?>
                      <div style="<?=$i<=2? 'display:block':'display:none'?>" <?=$i<=2? "id='testo'":"class='destroyThem'"?> >
                          <a href="#" class="dropdown-item">
                             <img src='<?=$data->photoDeProfil;?>' alt='photo' class="img-size-50 mr-3 img-circle"/><?=$data->userName;?><br/>demande une amitie.
                            &nbsp;<a class='btn btn-success accepter' href='#' id='<?=$data->idInvitant;?>'>Accepter invitation</a>
                             <a class='btn btn-danger refuser' href='#' id='<?=$data->idInvite;?>'>Refuser </a>
                            <span class="float-right text-muted text-sm"><?=$data->dateDemande;?></span>
                          </a>
                          <div class="dropdown-divider"></div>
                      </div>
                     <?php $i=$i+1;?>
                <?php endif;?>
            <?php }?>
     <div class="dropdown-divider"></div>
     <?php if($nb>=2):?>
        <a  href='#' class="dropdown-item dropdown-footer" id='showAll'>Voir toutes les notifications</a>
    <?php endif;?>
  </div>
</li>
<script>
    $('#showAll').click(function(e){
          e.preventDefault();
          if($('.destroyThem').css('display','none')){
            $('.destroyThem').css('display','block');
          }
    });
    $('.accepter').click(function(e){
       e.preventDefault();
        var id=$(this).attr('id');

        $.ajax({
          type:'POST',
          url:'src/view/application/notifications/traitement/accepterInvitationTreatment.php',
          data:{
                'id':id
               },
          success:function(){
            alert('cool');
            }
        });


    });

</script>
 <?php
   $data = ob_get_clean();
   echo json_encode($data);
 ?>
