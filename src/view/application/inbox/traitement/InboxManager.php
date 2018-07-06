<?php
require('UserManager.php');
require('ManagerI2.php');

        Class InboxManager extends ManagerI2{
             public function createConversation($idAuteur,$nomRecepteur,$titre,$contenu){
                  $bdd=$this->baseConnection();
                  $userManager = new UserManager();
                  $idRecepteur=$userManager->read($nomRecepteur)->fetch(PDO::FETCH_OBJ)->id;
                  $req=$bdd->prepare('INSERT INTO inbox(idAuteur,idRecepteur,titre,contenu,datePost) VALUES(:idAuteur,:idRecepteur,:titre,:contenu,NOW())');
                  $req->execute(compact('idAuteur','idRecepteur','titre','contenu'));
                  return $req;
             }
             public function getConversations($idAuteur,$nomRecepteur){
                 $bdd=$this->baseConnection();
                 $userManager = new UserManager();
                 $idRecepteur=$userManager->read($nomRecepteur)->fetch(PDO::FETCH_OBJ)->id;
                 $req=$bdd->prepare('SELECT * FROM inbox WHERE (inbox.idAuteur=:idAuteur AND inbox.idRecepteur=:idRecepteur) OR (inbox.idAuteur=:idRecepteur AND inbox.idRecepteur=:idAuteur)');
                 $req->execute(compact('idAuteur','idRecepteur'));

                 return $req;
             }
        }
