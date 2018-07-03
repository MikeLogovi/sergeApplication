<?php
namespace App\classes\site;

      Class Site{
      	   const WEB_SITE_NAME="BLUEBEARD";
           const WEB_SITE_DEVELOPPER="Mike LOGOVI";
      	   const WEB_SITE_URL='http://localhost/forumBlueBeard';
           const WEB_SITE_DB_NAME='forumBlueBeard';
      	   public function set_flash($message,$type='info'){
      	   	   $_SESSION['notification']['message']=$message;
      	   	   $_SESSION['notification']['type']=$type;

      	   }
      }
