<?php
//namespace App\classes\database;

       Class Managerf{
       	protected function baseConnection(){
       		$bdd=new PDO('mysql:host=localhost;dbname=forumBlueBeard;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
       		return $bdd;
       	}
       }
