<?php
namespace App\classes\User;
    Class User{
    	protected $matricule;
    	protected $prenoms;
        protected $classe;
        protected $dateNaissance;
        protected $numeroTelephone;
         protected $photoDeProfil;
    	public function __construct($matricule=null,$prenoms=null,$classe=null,$dateNaissance=null,$numeroTelephone=null,$photoDeProfil=null){
            if($matricule!=null){
                $this->setMatricule($matricule);
            }
            if($prenoms!=null){
                $this->setPrenoms($prenoms);
            }
            if($classe!=null){
                $this->setClasse($classe);
            }

            if($photoDeProfil!=null){
                $this->setPhotoDeProfil($photoDeProfil);
            }
            if($dateNaissance!=null){
                $this->setDateNaissance($dateNaissance);
            }
            if($numeroTelephone!=null){
                $this->setNumeroTelephone($numeroTelephone);
            }

        }
        public function setMatricule($matricule){
             $this->matricule=$matricule;
        }
    	public function getMatricule(){
            return $this->matricule;
    	}
    	public function getPrenoms(){
    		return $this->prenoms;
    	}
    	public function setPrenoms($prenoms){
    		$this->prenoms=$prenoms;
    	}
    	public function getClasse(){
    		return $this->classe;
    	}
    	public function setClasse($classe){
    		$this->classe=$classe;
    	}
    	public function getNumeroTelephone(){
    		return $this->numeroTelephone;
    	}
    	public function setNumeroTelephone($numeroTelephone){
    		$this->numeroTelephone=$numeroTelephone;
    	}
        public function getPhotoDeProfil(){
            return $this->photoDeProfil;
        }
        public function setPhotoDeProfil($photoDeProfil){
            $this->photoDeProfil=$photoDeProfil;
        }
         public function getDateNaissance(){
            return $this->dateNaissance;
        }
        public function setDateNaissance($dateNaissance){
            $this->dateNaissance=$dateNaissance;
        }

    }
