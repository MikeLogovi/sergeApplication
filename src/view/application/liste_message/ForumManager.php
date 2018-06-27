<?php
namespace App\view\application\liste_message;


       Class ForumManager extends Managerf{
             public function postMessage($matricule,$contenu,$titre){
                  $bdd=$this->baseConnection();
                  $req=$bdd->prepare('INSERT INTO message(matriculeEtudiant,titre,contenu,datePublication) VALUES(:matricule,:titre,:contenu,NOW())');
                  $req->execute(array(
                  'matricule'=>$matricule,
                  'titre'=>htmlspecialchars($titre),
                  'contenu'=>htmlspecialchars($contenu)
                  ));
                  return $req;
             }
             public function getMessage(){
                   $bdd=$this->baseConnection();
                   $req=$bdd->query("SELECT etudiant.matricule,message.id, message.titre,etudiant.photoDeProfil,etudiant.prenoms,message.contenu,message.datePublication FROM etudiant,message WHERE etudiant.matricule=message.matriculeEtudiant ORDER BY message.id DESC");
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
