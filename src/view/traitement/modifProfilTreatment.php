<?php
namespace App\view\traitement;
use App\classes\inscription\Functions;
use App\classes\User\UserManager;
    $functions = new Functions();
    $userManager = new UserManager();
    $functions->save_input_data();
    extract($_POST);
    if(!empty($prenomsModif)){
       $userManager->updatePrenoms($functions->xssControl($prenomsModif),$_SESSION['user']['matricule']);
       $_SESSION['user']['prenoms']=$functions->xssControl($prenomsModif);
    }
    if(!empty($classeModif)){
      $userManager->updateClasse($functions->xssControl($classeModif),$_SESSION['user']['matricule']);
      $_SESSION['user']['classe']=$functions->xssControl($classeModif);
    }
    if(!empty($dateNaissanceModif)){
      $userManager->updateDateNaissance($functions->xssControl($dateNaissanceModif),$_SESSION['user']['matricule']);
      $_SESSION['user']['dateNaissance']=$functions->xssControl($dateNaissanceModif);
    }
    if(!empty($numeroTelephoneModif)){
      $userManager->updateNumeroTelephone($functions->xssControl($numeroTelephoneModif),$_SESSION['user']['matricule']);
      $_SESSION['user']['classe']=$functions->xssControl($numeroTelephoneModif);
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
                            $token=sha1($prenomsModif.$classeModif.$numeroTelephoneModif);
                            $picture='src/public/photo_membre/'.$token.'.'.$extension;
                             move_uploaded_file($_FILES['photoDeProfilModif']['tmp_name'],$picture);
                             $userManager->updatePhotoDeProfil($functions->xssControl($picture),$_SESSION['user']['matricule']);
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

