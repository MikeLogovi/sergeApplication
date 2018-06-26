<?php
namespace App\classes\inscription;
use App\classes\User\UserManager;
use App\classes\User\User;

    Class Functions{


            public function not_empty_by_post($fields=[]){
                if(count($fields)!=0){
                    foreach($fields as $field){
                        if(empty($_POST[$field])||trim($_POST[$field])==""){
                            return false;
                        }
                    }
                    return true;
                }
            }
            public function not_empty_by_get($fields=[]){
                if(count($fields)!=0){
                    foreach($fields as $field){
                        if(empty($_GET[$field])||trim($_GET[$field])==""){
                            return false;
                        }
                    }
                    return true;
                }
            }
            public function good_files($fields=[]){
                if(count($fields)!=0){
                    foreach($fields as $field){
                        if(empty($_FILES[$field])||$_FILES[$field]['error']!=0 ||$_FILES[$field]['size']>1000000){
                            return false;
                        }
                    }
                    return true;
                }
            }


           public function realy_isset($fields=[]){
                if(count($fields)!=0){
                    foreach($fields as $field){
                        if(isset($_POST[$field])){
                            return true;
                        }
                    }
                    return false;
                }
           }

        	public function verifyMatricule($matricule,$confmatricule){
                 if($matricule==$confmatricule){
                 	return true;
                 }
                 return false;
        	}


            public function insertDb($matricule,$prenoms,$classe,$dateNaissance,$numeroTelephone,$photoDeProfil){
                  $user=new User($matricule,$prenoms,$classe,$dateNaissance,$numeroTelephone,$photoDeProfil);
                  $userManager=new UserManager();
                  $userManager->create($user);
            }
            public function uploadpicture($pseudo,$email,$motpass,$extension){
                   $token=sha1($pseudo.$email.$motpass);
                   $picture='src/public/photo_membre/'.$token.'.'.$extension;
                   move_uploaded_file($_FILES['photoDeProfil']['tmp_name'],$picture);
                   $userManager=new UserManager();
                   $user=new User($pseudo,$email,$motpass,null,null,$picture,null);
                   $userManager->update($user);
            }
            public function xssControl($value){
              return htmlspecialchars(trim($value));
            }
            public function save_input_data(){
               foreach($_POST as $key => $value){
                  if(!strpos($key, 'matricule')){
                  $_SESSION['input'][$key]=$value;
                 }
               }
            }
            public function get_input($key){
              return !empty($_SESSION['input'][$key])? $_SESSION['input'][$key] : null;
            }
    }

