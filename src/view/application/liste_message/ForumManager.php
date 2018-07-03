<?php
namespace App\view\application\liste_message;


       Class ForumManager extends Managerf{
             public function postMessage($id,$contenu,$titre){
                  $bdd=$this->baseConnection();
                  $req=$bdd->prepare('INSERT INTO message(idMembre,titre,contenu,datePublication) VALUES(:id,:titre,:contenu,NOW())');
                  $req->execute(array(
                  'id'=>$id,
                  'titre'=>htmlspecialchars($titre),
                  'contenu'=>htmlspecialchars($contenu)
                  ));
                  return $req;
             }
             public function getMessage(){
                   $bdd=$this->baseConnection();
                   $req=$bdd->query("SELECT membre.id as idMembre,message.id, message.titre,membre.photoDeProfil,membre.userName,message.contenu,message.datePublication FROM membre,message WHERE membre.id=message.idMembre ORDER BY message.id DESC");
                   return $req;
             }
             public function delete($numero){
                   $bdd=$this->baseConnection();
                   $req=$bdd->prepare('DELETE FROM message WHERE id=:numero');
                   $req->execute(array(
                    'numero'=>$numero
                   ));
                   return $req;
             }
             public function getNbMessage(){
                   $bdd=$this->baseConnection();
                   $req=$bdd->query("SELECT COUNT(titre) as count FROM message");
                   return $req;
             }

       }
