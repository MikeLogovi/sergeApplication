<?php
namespace App\view\formulaire;
use App\classes\inscription\Functions;
$function=new Functions();
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
  <input id='matricule' name='password' placeholder='Matricule' type='password'>
  <input name='Prenoms' placeholder='Prenoms' type='text' id='prenom'>
  <select name='classe' >
       <option value='1ere annee'>1ere annee</option>
       <option value='1ere annee'>1ere annee</option>
       <option value='1ere annee'>1ere annee</option>
  </select><br/>
  <input name='dateNaissance' placeholder='Date de naissance' type='date'>
  <input name='numero' placeholder='Numéro de téléphone' type='text'>
  <br/>Photo de profil<br/><input name='photoProfil' placeholder='Photo de profil' type='file'><br/><br/><br/>
  <input class='animated' type='submit' value="S'inscrire">
  <a class='forgot' href='connexion'>Avez vous déjà un compte?</a>
</div>

</body>
</html>
