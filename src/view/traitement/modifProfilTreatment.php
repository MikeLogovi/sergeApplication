<?php
namespace App\view\traitement;
use App\classes\inscription\Functions;
use App\classes\User\UserManager;
    $functions = new Functions();
    $userManager = new UserManager();
    $functions->save_input_data();
    extract($_POST);
    if(!empty($usernameModif)){
       $userManager->updateUserName($functions->xssControl($usernameModif),$_SESSION['user']['id']);
       $_SESSION['user']['username']=$functions->xssControl($usernameModif);
    }
    if(!empty($emailModif)){
      $userManager->updateEmail($functions->xssControl($emailModif),$_SESSION['user']['id']);
      $_SESSION['user']['email']=$functions->xssControl($emailModif);
    }
    if(!empty($newmotpassModif) AND !empty($oldmotpassModif)){
      $newPass=sha1(md5($newmotpassModif));
      $userManager->updateMotpass($functions->xssControl($newPass),$_SESSION['user']['id']);
      $_SESSION['user']['motpass']=$functions->xssControl($newPass);
    }
    $picture=null;
    if(!empty($_FILES['photoDeProfilModif'])){
        if($_FILES['photoDeProfilModif']['error']==0 ){
                if($_FILES['photoDeProfilModif']['size']<=1000000){

                      $info=pathinfo($_FILES['photoDeProfilModif']['name']);
                      $extension=$info['extension'];
                      if(!in_array($extension,['jpeg','JPEG','jpg','JPG','png','PNG'])){
                         $_SESSION['errors']['errformatfile']='Format de fichier invalide!Essayez un fichier png ou jpg au niveau de profil';
                          header('Location:modifProfil');
                      }
                       else{
                            $token=sha1($usernameModif.$emailModif);
                            $picture='src/public/photo_membre/'.$token.'.'.$extension;
                             move_uploaded_file($_FILES['photoDeProfilModif']['tmp_name'],$picture);
                             $userManager->updatePhotoDeProfil($functions->xssControl($picture),$_SESSION['user']['id']);
                             header('location:forum');
                           }

                }
                else{
                  $_SESSION['errors']['errsizefile']="Fichier trop lourd!";
                }
       }
        else{
            $_SESSION['errors']['errpostfile']="Erreur dans l'upload de la photo.Veuillez reéssayer s'il vous plait";
             header('Location:modifProfil');
            }
   }

