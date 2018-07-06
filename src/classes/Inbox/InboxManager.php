<?php
namespace App\classes\Inbox;
use App\classes\User\UserNanager;
use App\classes\database\Manager;
use \PDO as PDO;
$userManager = new UserManager();
        Class InboxManager extends Manager{
             public function createConversation($idAuteur,$nomRecepteur,$contenu){
                  $bdd=$this->baseConnection();
                  $idRecepteur=$userManager->read($nomRecepteur)->fetch(PDO::FETCH_OBJ)->id;
                  $req=$bdd->prepare('INSERT INTO inbox(idAuteur,idRecepteur,contenu,datePost) VALUES(:idAuteur,:idRecepteur,:contenu,NOW())');
                  $req->execute(compact('idAuteur','idRecepteur','contenu'));
                  return $req;
             }
        }
