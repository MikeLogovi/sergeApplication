<?php
require('Managerlm2.php');
Class AmitieManager extends Managerlm2{
    public function createAmitie($idInvitant,$idInvite){
        $bdd = $this->baseConnection();
        $req = $bdd->prepare('INSERT INTO amitie(idInvitant,idInvite,dateDemande) VALUES(:idInvitant,:idInvite,NOW())');
        $req->execute(compact('idInvitant','idInvite'));
        return $req;
    }
    public function rompreAmitie($idInvitant,$idInvite){
        $bdd = $this->baseConnection();
        $req1 = $bdd->prepare('DELETE FROM amitie WHERE idInvitant=:idInvitant AND idInvite=:idInvite');
        $req1->execute(compact('idInvitant','idInvite'));
        $req1->closeCursor();
        $req = $bdd->prepare('DELETE FROM amitie WHERE idInvitant=:idInvite AND idInvite=:idInvitant');
        $req->execute(compact('idInvite','idInvitant'));
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
