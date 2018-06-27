<?php
namespace App\classes\site;

      Class Site{
      	   const WEB_SITE_NAME="ESGIS'S FORUM";
      	   const WEB_SITE_URL='http://localhost/forumEsgis';
      	   public function set_flash($message,$type='info'){
      	   	   $_SESSION['notification']['message']=$message;
      	   	   $_SESSION['notification']['type']=$type;

      	   }
      }
