<?php
namespace App\classes\User;
    Class User{
    	protected $id;
    	protected $userName;
        protected $email;
        protected $motpass;
        protected $photoDeProfil;
    	public function __construct($id=null,$userName=null,$email=null,$motpass=null,$photoDeProfil=null){
            if($id!=null){
                $this->setId($id);
            }
            if($userName!=null){
                $this->setUserName($userName);
            }
            if($email!=null){
                $this->setEmail($email);
            }

            if($photoDeProfil!=null){
                $this->setPhotoDeProfil($photoDeProfil);
            }
            if($motpass!=null){
                $this->setMotpass($motpass);
            }

        }
        public function setId($id){
             $this->id=$id;
        }
    	public function getId(){
            return $this->id;
    	}
    	public function getUserName(){
    		return $this->userName;
    	}
    	public function setUserName($userName){
    		$this->userName=$userName;
    	}
    	public function getEmail(){
    		return $this->email;
    	}
    	public function setEmail($email){
    		$this->email=$email;
    	}

        public function getPhotoDeProfil(){
            return $this->photoDeProfil;
        }
        public function setPhotoDeProfil($photoDeProfil){
            $this->photoDeProfil=$photoDeProfil;
        }
         public function getMotpass(){
            return $this->motpass;
        }
        public function setMotpass($motpass){
            $this->motpass=$motpass;
        }

    }
