<?php
namespace App\view\traitement;
use App\classes\inscription\Functions;
use App\classes\User\UserManager;
use \PDO as PDO;
        extract($_POST);
        $functions=new Functions();
        if($functions->not_empty_by_post(['verusername','vermotpass'])){
             $userManager=new UserManager;
             $vermotpass=sha1(md5($vermotpass));
                if($userManager->verifyUser($functions->xssControl($verusername),
                  $functions->xssControl( $vermotpass))){
                    $req=$userManager->read($verusername)->fetch(PDO::FETCH_OBJ);
                    if (isset($souvenir)){
                      setcookie('id', $req->id, time() + 365*24*3600*10, null, null, false, true);

                       setcookie('username', $req->userName, time() + 365*24*3600*10, null, null, false, true);
                       setcookie('email', $req->email, time() + 365*24*3600*10, null, null, false, true);
                       setcookie('motpass', $req->motpass, time() + 365*24*3600*10, null, null, false, true);
                       setcookie('photoDeProfil', $req->photoDeProfil, time() + 365*24*3600*10, null, null, false, true);

                    }
                    $_SESSION['user']['id']=$req->id;
                    $_SESSION['user']['username']=$req->userName;
                    $_SESSION['user']['email']=$req->email;
                    $_SESSION['user']['motpass']=$req->motpass;
                    $_SESSION['user']['photoDeProfil']=$req->photoDeProfil;
                    header('Location:forum');
                  }

                  else{
                      $_SESSION['errors']['errconnect']="Combinaison Identifiant/Mot de passe incorrect!Veuillez reéssayer s'il vous plait";
                      header('Location:connexion');
                  }
        }
        else{
        	echo "hummm";
        }
