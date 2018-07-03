<?php
namespace App\view\traitement;
use App\classes\inscription\Functions;
use App\classes\User\UserManager;
use \PDO as PDO;
    $functions = new Functions();
    $functions->save_input_data();
    $userManager=new UserManager();
    if(isset($_SESSION['user']['id'])){
      header('Location:acceuil');
    }
    if($functions->not_empty_by_post(['motpass','confmotpass','email','username'])){
                  if(!$functions->verifyMotpass($_POST['motpass'],$_POST['confmotpass'])){
                        $_SESSION['errors']['errmotpass']="Veuillez bien revérifier votre mot de passe!";
                  }

                  $exist=$userManager->userNotAlreadyExist($_POST['username']);
                  if(!empty($exist)){
                     if(!empty($exist['username'])){
                         $_SESSION['errors']['errusernamealreadyexist']="Nom d'utilisateur déjà existant";
                      }
                  }
                if(isset($_SESSION['errors'])){
                       header('Location:inscription');
                  }
                  else{

                     $picture=null;
                          if(!empty($_FILES['photoDeProfil'])){

                               if($_FILES['photoDeProfil']['error']==0 ){
                                  if($_FILES['photoDeProfil']['size']<=1000000){

                                    $info=pathinfo($_FILES['photoDeProfil']['name']);
                                              $extension=$info['extension'];
                                      if(!in_array($extension,['jpeg','JPEG','jpg','JPG','png','PNG'])){
                                         $_SESSION['errors']['errformatfile']='Format de fichier invalide!Essayez un fichier png ou jpg au niveau de profil';
                                          header('Location:inscription');
                                      }
                                     else{
                                          $token=sha1($_POST['username'].$_POST['email']);
                                          $picture='src/public/photo_membre/'.$token.'.'.$extension;
                                           move_uploaded_file($_FILES['photoDeProfil']['tmp_name'],$picture);
                                         }

                                    }
                                    else{
                                      $_SESSION['errors']['errsizefile']="Fichier trop lourd!";
                                    }
                                }
                              else{
                                  $_SESSION['errors']['errpostfile']="Erreur dans l'upload de la photo.Veuillez reéssayer s'il vous plait";

                                   header('Location:inscription');
                                  }
                          }

                    $username=$_POST['username'];
                    $email=$_POST['email'];
                    $motpass=$_POST['motpass'];
                    $photoDeProfil=$picture;
                    $motpassHash=sha1(md5($motpass));
                    $functions->insertDb($functions->xssControl($username),$functions->xssControl($email),$functions->xssControl($motpassHash),$functions->xssControl($photoDeProfil));

                    $req=$userManager->read($username)->fetch(PDO::FETCH_OBJ);
                    $_SESSION['user']['id']=$req->id;
                    $_SESSION['user']['username']=$req->userName;
                    $_SESSION['user']['email']=$req->email;
                    $_SESSION['user']['motpass']=$req->motpass;
                    $_SESSION['user']['photoDeProfil']=$req->photoDeProfil;


                    header('location:forum');
                  }
   }
    else{
     $_SESSION['errors']['errchamp']="Tous les champs sauf pour la photo sont obligatoires";
    	header('location:inscription');
    }
