<?php
namespace App\view\traitement;
use App\classes\inscription\Functions;
use App\classes\User\UserManager;
use \PDO as PDO;
        extract($_POST);
        $functions=new Functions();
        if($functions->not_empty_by_post(['verprenoms','vermatricule'])){
             $userManager=new UserManager;
             $matricule=sha1(md5($vermatricule));
                if($userManager->verifyUser($functions->xssControl($verprenoms),
                  $functions->xssControl( $matricule))){
                    $req=$userManager->read($matricule)->fetch(PDO::FETCH_OBJ);
                    if (isset($souvenir)){
                       setcookie('prenoms', $req->prenoms, time() + 365*24*3600*10, null, null, false, true);
                       setcookie('matricule', $req->matricule, time() + 365*24*3600*10, null, null, false, true);
                    }
                    $_SESSION['user']['matricule']=$req->matricule;
                    $_SESSION['user']['prenoms']=$req->prenoms;
                    $_SESSION['user']['classe']=$req->classe;
                    $_SESSION['user']['numeroTelephone']=$req->numeroTelephone;
                    $_SESSION['user']['dateNaissance']=$req->dateNaissance;
                    $_SESSION['user']['photoDeProfil']=$req->photoDeProfil;
                    header('Location:forum');
                  }

                  else{
                      $site->set_flash("Combinaison Identifiant/Mot de passe incorrect!Veuillez reéssayer s'il vous plait");
                      header('Location:connexion');
                  }
        }
        else{
        	echo "hummm";
        }
