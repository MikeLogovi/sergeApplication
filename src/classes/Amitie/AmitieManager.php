<?php
namespace App\classes\Amitie;
use App\classes\database\Manager;

Class AmitieManager extends Manager{
    public function createAmitie($idInvitant,$idInvite){
        $bdd = $this->baseConnection();
        $req = $bdd->prepare('INSERT INTO amitie(idInvitant,idInvite,dateDemande) VALUES(:idInvitant,:idInvite,NOW())');
        $req->execute(compact('idInvitant','idInvite'));
        return $req;
    }
     public function deleteAmitie($idInvitant,$idInvite){
        $bdd = $this->baseConnection();
        $req = $bdd->prepare('DELETE FROM amitie WHERE idInvitant=:idInvitant AND idInvite=:idInvite');
        $req->execute(compact('idInvitant','idInvite'));
        return $req;
    }

    public function amitieEnvoye($idInvitant,$idInvite){
      $bdd = $this->baseConnection();
      $req=$bdd->prepare('SELECT * FROM amitie WHERE idInvitant=:idInvitant AND idInvite=:idInvite');
      $req->execute(compact('idInvitant','idInvite'));
        return $req;
    }
}
