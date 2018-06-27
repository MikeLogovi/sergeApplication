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
   <?php require('src/view/partials/errors_form.php');?>
  <form method='POST' action='formularTreatment' enctype="multipart/form-data">
      <input id='matricule' name='matricule' placeholder='Matricule' type='password'>
      <input id='confmatricule' name='confmatricule' placeholder='Reverifier votre matricule' type='password'>
      <input name='prenoms' placeholder='Prenoms' type='text' id='prenom'  <?='value='.$function->get_input('prenoms');?>>
      <select name='classe'  id='classe'<?='value='.$function->get_input('classe');?> >
           <option value='1ere annee'>1ere annee</option>
           <option value='2eme annee'>2eme annee</option>
           <option value='3eme annee'>3eme annee</option>
      </select><br/>
      <input name='dateNaissance' placeholder='Date de naissance' type='date'  <?='value='.$function->get_input('dateNaissance');?>>
      <input name='numeroTelephone' placeholder='Numéro de téléphone' type='text'  <?='value='.$function->get_input('numeroTelephone');?>>
      <br/>Photo de profil<br/><input name='photoDeProfil' placeholder='Photo de profil' type='file'  <?='value='.$function->get_input('photoDeProfil');?>><br/><br/><br/>
      <input class='animated' type='submit' value="S'inscrire">
  </form>
  <a class='forgot' href='connexion'>Avez vous déjà un compte?</a>
</div>

</body>
</html>
