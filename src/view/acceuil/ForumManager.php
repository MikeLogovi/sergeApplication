<?php
namespace App\view\acceuil;


       Class ForumManager extends Managerf{
             public function postMessage($matricule,$contenu,$titre){
                  $bdd=$this->baseConnection();
                  $req=$bdd->prepare('INSERT INTO message(matriculemembre,titre,contenu,datePublication) VALUES(:matricule,:titre,:contenu,NOW())');
                  $req->execute(array(
                  'matricule'=>$matricule,
                  'titre'=>htmlspecialchars($titre),
                  'contenu'=>htmlspecialchars($contenu)
                  ));
                  return $req;
             }
             public function getMessage(){
                   $bdd=$this->baseConnection();
                   $req=$bdd->query("SELECT membre.userName, message.titre,membre.photoDeProfil,message.contenu,message.datePublication FROM membre,message WHERE membre.id=message.idMembre ORDER BY message.id DESC LIMIT 10 ");
                   return $req;
             }
             public function getNbMessage(){
                   $bdd=$this->baseConnection();
                   $req=$bdd->query("SELECT COUNT(titre) as count FROM message");
                   return $req;
             }

       }
