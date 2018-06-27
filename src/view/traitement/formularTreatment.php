<?php
namespace App\view\traitement;
use App\classes\inscription\Functions;
use App\classes\User\UserManager;
use \PDO as PDO;
    $functions = new Functions();
    $functions->save_input_data();
    $userManager=new UserManager();
    if($functions->not_empty_by_post(['matricule','confmatricule','prenoms','classe','dateNaissance','numeroTelephone'])){
                  if(!$functions->verifyMatricule($_POST['matricule'],$_POST['confmatricule'])){
                        $_SESSION['errors']['errmatricule']="Veuillez bien revérifier votre matricule!";
                  }

                  $exist=$userManager->userNotAlreadyExist($_POST['matricule']);
                  if(!empty($exist)){
                     if(!empty($exist['matricule'])){
                         $_SESSION['errors']['errmatriculealreadyexist']="Matricule déjà existant";
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
                                          $token=sha1($_POST['prenoms'].$_POST['classe'].$_POST['numeroTelephone']);
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
                    $matricule=$_POST['matricule'];
                    $prenoms=$_POST['prenoms'];
                    $classe=$_POST['classe'];
                    $dateNaissance=$_POST['dateNaissance'];
                    $numeroTelephone=$_POST['numeroTelephone'];
                    $photoDeProfil=$picture;
                    $matriculeHash=sha1(md5($matricule));
                    $functions->insertDb($functions->xssControl($matriculeHash),$functions->xssControl($prenoms),
                    $functions->xssControl($classe),$functions->xssControl($dateNaissance),$functions->xssControl($numeroTelephone),$functions->xssControl($photoDeProfil));

                    $req=$userManager->read( $matriculeHash)->fetch(PDO::FETCH_OBJ);
                    $_SESSION['user']['matricule']=$req->matricule;
                    $_SESSION['user']['prenoms']=$req->prenoms;
                    $_SESSION['user']['classe']=$req->classe;
                    $_SESSION['user']['numeroTelephone']=$req->numeroTelephone;
                    $_SESSION['user']['dateNaissance']=$req->dateNaissance;
                    $_SESSION['user']['photoDeProfil']=$req->photoDeProfil;

                    header('location:forum');
                  }
   }
    else{
      $_SESSION['errors']['errchamp']="Tous les champs sauf pour la photo sont obligatoires";
    	header('location:inscription');
    }
