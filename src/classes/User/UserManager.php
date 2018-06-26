<?php
namespace App\classes\User;
use App\classes\database\Manager;
use App\classes\User\User;
use \PDO as PDO;
    Class UserManager extends Manager{

    	public function create(User $user){
           $bdd=$this->baseConnection();
           $req=$bdd->prepare('INSERT INTO etudiant(matricule,prenoms,classe,dateNaissance,numeroTelephone,photoDeProfil) VALUES(:matricule,:prenoms,:classe,:dateNaissance,:numeroTelephone,:photoDeProfil)');
           $req->execute(array(
              'matricule'=>$user->getMatricule(),
              'prenoms'=>$user->getPrenoms(),
              'classe'=>$user->getClasse(),
              'dateNaissance'=>$user->getDateNaissance(),
              'numeroTelephone'=>$user->getNumeroTelephone(),
              'photoDeProfil'=>$user->getPhotoDeProfil()==null?'src/public/photo_membre/anonyme.jpg':$user->getPhotoDeProfil()
           ));
    	}
    	public function read($matricule){
           $bdd=$this->baseConnection();
           $req=$bdd->prepare('SELECT * FROM etudiant WHERE matricule=:matricule');
           $req->execute(array(
            'matricule'=>$matricule)
           );
           return $req;
    	}
    	public function update(User $user,$id=null){
          $tab_user=array('matricule'=>$user->getMatricule(),'prenoms'=>$user->getPrenoms(),'classe'=>$user->getClasse(),'dateNaissance'=>$user->getDateNaissance(),'numeroTelephone'=>$user->getnumeroTelephone(),'photoDeProfil'=>$user->getPhotoDeProfil());
         // var_dump($tab_user);
          //var_dump(get_class_methods(get_class($user)));

          //die();
          foreach($tab_user as $attribute=>$value){
            $ucattr=ucfirst($attribute);
            $method1='get'.$ucattr;
            //var_dump($method1);
           try{
            if(method_exists(get_class($user), $method1)){
              //echo "Parfait";
              //die();
              if($user->$method1()!=null){
                 $method2='set'.$ucattr;
                 if(method_exists(get_class($user),$method2)){
                   $user->$method2($user->$method1());
                   $method3='update'.$ucattr;
                   if(method_exists($this, $method3)){
                    if($user->getPseudo()!=null)
                      {
                         $req=$this->read($user->getPseudo())->fetch(PDO::FETCH_OBJ);
                         $this->$method3($user->$method1(),$req->id);
                      }
                      else{
                         $this->$method3($user->$attribute,$id);
                      }

                   }
                 }
              }
            }
            else{
              echo "ImParfait";
              die();
            }
          }catch(Exception $e){
                die("Erreur ".$e->getMessage());
          }
        }
    	}

      private function updateNumeroTelephone($numeroTelephone,$matricule){
        $bdd=$this->baseConnection();
        $req=$bdd->prepare('UPDATE user SET numeroTelephone=:numeroTelephone WHERE matricule=:matricule');
        $req->execute(array(
             'numeroTelephone'=>$numeroTelephone,
             'matricule'=>$matricule
        ));
      }
      private function updateMatricule($new,$old){
        $bdd=$this->baseConnection();
        $req=$bdd->prepare('UPDATE user SET matricule=:new WHERE matricule=:old');
        $req->execute(array(
             'new'=>$new,
             'old'=>$old
        ));
      }

       private function updateClasse($classe,$matricule){
        $bdd=$this->baseConnection();
        $req=$bdd->prepare('UPDATE user SET classe=:classe WHERE matricule=:matricule');
        $req->execute(array(
             'classe'=>$classe,
             'matricule'=>$matricule
        ));
      }

      private function updatePrenoms($prenoms,$matricule){
        $bdd=$this->baseConnection();
        $req=$bdd->prepare('UPDATE user SET prenoms=:prenoms WHERE matricule=:matricule');
        $req->execute(array(
             'prenoms'=>$prenoms,
             'matricule'=>$matricule
        ));
      }

      private function updateDateNaissance($dateNaissance,$matricule){
        $bdd=$this->baseConnection();
        $req=$bdd->prepare('UPDATE user SET dateNaissance=:dateNaissance WHERE matricule=:matricule');
        $req->execute(array(
             'dateNaissance'=>$dateNaissance,
             'matricule'=>$matricule
        ));
      }

      private function updatePhotoDeProfil($photoDeProfil,$matricule){
        $bdd=$this->baseConnection();
        $req=$bdd->prepare('UPDATE user SET photoDeProfil=:photoDeProfil WHERE matricule=:matricule');
        $req->execute(array(
             'photoDeProfil'=>$photoDeProfil,
             'matricule'=>$matricule
        ));
      }

    	public function delete($user){

    	}
    	public function getList(){


    	}
    	public function userNotAlreadyExist($matricule){
          $exist=[];
          $bdd=$this->baseConnection();
          $req=$bdd->prepare('SELECT matricule from etudiant WHERE matricule=:matricule');
          $req->execute(array(
            'matricule'=>$matricule
          ));
          if($req->rowCount()!=0){
            $exist['matricule']='matricule';
          }
          $req->closeCursor();
          return $exist;
    	}
      public function verifyUser($prenoms,$matricule){
          $bdd=$this->baseConnection();
          $req=$bdd->prepare('SELECT matricule FROM etudiant WHERE prenoms=:prenoms AND matricule=:matricule');
          $req->execute(array(
              'prenoms'=>$prenoms,
              'matricule'=>$matricule
          ));
          return $req->rowCount();
      }

    }
