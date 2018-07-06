<?php
require('Managera.php');

Class AmitieManager extends Managera{
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
    public function getDemandeAmitie($idInvite){
        $bdd = $this->baseConnection();
        $req = $bdd->prepare('SELECT * FROM amitie,membre WHERE amitie.idInvite=:idInvite AND amitie.idInvitant=membre.id AND amitie.amitieCree="false"');
        $req->execute(compact('idInvite'));
        return $req;
    }
    public function amitieEnvoye($idInvitant,$idInvite){
      $bdd = $this->baseConnection();
      $req=$bdd->prepare('SELECT * FROM amitie WHERE idInvitant=:idInvitant AND idInvite=:idInvite');
      $req->execute(compact('idInvitant','idInvite'));
        return $req->rowCount();
    }

    public function accepterInvitation($idInvite,$idInvitant){
        $true='true';
        $bdd = $this->baseConnection();
        $req=null;
        if(!$this->amitieEnvoye($idInvite,$idInvitant)){
          $this->createAmitie($idInvite,$idInvitant);
             $req = $bdd->prepare('UPDATE amitie SET dateCreation=NOW(),amitieCree=:true WHERE idInvitant=:idInvite AND idInvite=:idInvitant');
             $req->execute(compact('true','idInvitant','idInvite'));


        }
        else{

            $req = $bdd->prepare('UPDATE amitie SET dateCreation=NOW(),amitieCree=:true WHERE idInvitant=:idInvite AND idInvite=:idInvitant');
             $req->execute(compact('true','idInvitant','idInvite'));

        }
        if(!$this->amitieEnvoye($idInvitant,$idInvite)){
             $this->createAmitie($idInvitant,$idInvite);
             $req1 = $bdd->prepare('UPDATE amitie SET dateCreation=NOW(),amitieCree=:true WHERE idInvitant=:idInvitant AND idInvite=:idInvite');
              $req1->execute(compact('true','idInvitant','idInvite'));



        }
        else{

            $req1 = $bdd->prepare('UPDATE amitie SET dateCreation=NOW(),amitieCree=:true WHERE idInvitant=:idInvitant AND idInvite=:idInvite');
              $req1->execute(compact('true','idInvitant','idInvite'));

        }

        return $req;
    }

}
