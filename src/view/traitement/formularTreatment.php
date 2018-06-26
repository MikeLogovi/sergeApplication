<?php
namespace App\view\traitement;
use App\classes\inscription\Functions;
use App\classes\User\UserManager;
use App\classes\User\MailerManager\PHPMailer\MailerManager;
    $functions = new Functions();
    $functions->save_input_data();
    if($functions->not_empty_by_post(['matricule','confmatricule','prenoms','classe','dateNaissance','numeroTelephone'])){
                  if(!$functions->verifyMatricule($_POST['matricule'],$_POST['confmatricule'])){
                        $_SESSION['errors']['errmatricule']="Veuillez bien revérifier votre matricule!";
                  }
                  $userManager=new UserManager();
                  $exist=$userManager->userNotAlreadyExist($_POST['matricule']);
                  if(!empty($exist)){
                     if(!empty($exist['matricule'])){
                         $_SESSION['errors']['errmatriculealreadyexist']="Matricule déjà existant";
                  }
                }
                if(isset($_SESSION['errors'])){
                       header('Location:inscription');
                  }
                  else{     $picture=null;
                            if(!empty($_FILES['photoDeProfil']['name'])){
                                  if($functions->good_files(['photoDeProfil'])){

                                            $info=pathinfo($_FILES['photoDeProfil']['name']);
                                            $extension=$info['extension'];
                                            if(!in_array($extension,['jpeg','JPEG','jpg','JPG','png','PNG'])){
                                                                $site->set_flash('Format de fichier invalide!Essayez un fichier png ou jpg au niveau de profil','danger');
                                                                header('Location:connexion');
                                            }
                                             else{
                                                    $token=sha1($prenoms.$classe.$numeroTelephone);
                                                    $picture='src/public/photo_membre/'.$token.'.'.$extension;
                                                    move_uploaded_file($_FILES['photoDeProfil']['tmp_name'],$picture);
                                             }

                                  }
                                  else{
                                         set_flash("Erreur dans l'upload de la photo.Veuillez reéssayer s'il vous plait","danger");
                                    header('Location:messagerie');
                                  }
                          }


                    $matricule=$_POST['matricule'];
                    $prenoms=$_POST['prenoms'];
                    $classe=$_POST['classe'];
                    $dateNaissance=$_POST['dateNaissance'];
                    $numeroTelephone=$_POST['numeroTelephone'];
                    $photoDeProfil=$picture;
                    $functions->insertDb($functions->xssControl(sha1(md5($matricule))),$functions->xssControl($prenoms),
                    $functions->xssControl($classe),$functions->xssControl($dateNaissance),$functions->xssControl($numeroTelephone),$functions->xssControl($photoDeProfil));
                    header('location:application');
                  }
   }
    else{
      $_SESSION['errors']['errchamp']="Tous les champs sauf pour la photo sont obligatoires";
    	header('location:inscription');
    }
