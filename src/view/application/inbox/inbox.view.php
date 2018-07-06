<?php

   use App\classes\Inbox\Inbox;
   use App\classes\User\UserManager;
   $userManager= new UserManager();
   $friend=$userManager->read($_SESSION['friend']['name'])->fetch(PDO::FETCH_OBJ);
?>
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?=$site::WEB_SITE_NAME;?>'S INBOX</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active">forum</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title"><img src='<?=$friend->photoDeProfil;?>' alt='photo' class='img-size-50 mr-3 img-circle'/>-<?=$friend->userName;?></h3>

                <div class="card-tools">
                  <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">2</span>
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>

                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">

                <div class="direct-chat-messages" id='inboxMessage'>
                 <div id='centre'>
                     <center>
                      <span ><img style="width:50px ;height:50px;" src="src/public/images/forumMessage.gif" alt='mon loader'/></span><br/>
                       <span id='load' style="color:blue; ">Chargement....</span>
                      </center>
                 </div>

                </div>

              <div class="card-footer">
                <form action="#" method="post">
                   <input type="text" name='Ititre' id='Ititre' placeholder="Ecrire un titre....." class="form-control"><br/>


                    <textarea name='Imessage' id='Imessage' class="form-control">"Ecrire un message....." </textarea>
                      <span >
                      <button type="button" class="btn btn-primary" id='Ienvoyer'>Envoyer</button>
                    </span>


                </form>
              </div>

            </div>
