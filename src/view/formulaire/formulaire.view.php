<?php
namespace App\view\formulaire;
use App\classes\inscription\Functions;
$function=new Functions();
if(isset($_SESSION['user']['id'])){
      header('Location:acceuil');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$site::WEB_SITE_NAME.'-INSCRIPTION';?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="src/public/inscription/css/main.css"/>
	<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
</head>
<body>
<div class='login'>
  <h2>Inscription</h2>
   <?php require('src/view/partials/errors_form.php');?>
  <form method='POST' action='formularTreatment' enctype="multipart/form-data">

      <input name='username' placeholder="Nom d'utilisateur" type='text' id='username'  <?='value='.$function->get_input('username');?>>

      <input name='email' placeholder='Adresse email' type='email'  <?='value='.$function->get_input('email');?>>
      <input id='motpass' name='motpass' placeholder='Mot de passe' type='password'>
      <input id='confmotpass' name='confmotpass' placeholder='Reverifier votre mot de passe' type='password'>

      <br/>Photo de profil<br/><input name='photoDeProfil' type='file'/><br/><br/><br/>
      <input class='animated' type='submit' value="S'inscrire">
  </form>
  <a class='forgot' href='connexion'>Avez vous déjà un compte?</a>
</div>

</body>
</html>
