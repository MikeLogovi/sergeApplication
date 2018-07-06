<?php


     function homePage(){
          $site=new App\classes\site\Site();
     	require('src/view/acceuil/acceuil.view.php');
     }
     function registration(){
          $site=new App\classes\site\Site();
     	require('src/view/formulaire/formulaire.view.php');
     }
     function formularTreatment(){
          $site=new App\classes\site\Site();
     	require('src/view/traitement/formularTreatment.php');
     }
     function connexionTreatment(){
          $site=new App\classes\site\Site();
          require('src/view/traitement/connexionTreatment.php');
     }
     function connexion(){
          $site=new App\classes\site\Site();
     	require('src/view/connexion/connexion.view.php');
     }

     function application(){

          require('src/view/application/application.view.php');
     }

     function forum(){
          require('src/view/partials/initialize.php');

          ob_start();
          require('src/view/application/forum/forum.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');

     }
      function forumTreatment(){
          $site=new App\classes\site\Site();
          require('src/view/application/forum/traitement/forumTreatment.php');
     }
     function listeMembre(){
          require('src/view/partials/initialize.php');

          ob_start();
          require('src/view/application/liste_membre/listeMembre.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');
     }
     function creerAmitie($numero){
          require('src/view/traitement/createAmitieTreatment.php');
     }
     function deleteAmitie($numero){
          require('src/view/traitement/annulerAmitieTreatment.php');
     }
      function listeMessage(){
          require('src/view/partials/initialize.php');

          ob_start();
          require('src/view/application/liste_message/listeMessage.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');
     }
     function supprimerMessage($numero){
          require('src/view/traitement/supprimerMessageTreatment.php');
     }
     function profil(){
          require('src/view/partials/initialize.php');
          ob_start();
          require('src/view/application/profil/profil.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');
     }
      function modifProfil(){
          require('src/view/partials/initialize.php');
          ob_start();
          require('src/view/application/modif_profil/modifProfil.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');
     }

      function inbox($name){

          $_SESSION['friend']['name']=$name;
          header('Location:../inbox');
     }
     function inboxPerson(){
          require('src/view/partials/initialize.php');
          ob_start();
          require('src/view/application/inbox/inbox.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');
     }
     function modifProfilTreatment(){

          require('src/view/traitement/modifProfilTreatment.php');

     }
     function supprimerProfil(){

          require('src/view/traitement/supprimerProfilTreatment.php');

     }
     function deconnexion(){

          require('src/view/traitement/deconnexionTreatment.php');

     }
