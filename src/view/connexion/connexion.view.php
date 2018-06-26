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
  <h2>Connexion</h2>
  <form method='post' action='connexionTreatment'>
  <input id='matricule' name='vermatricule' placeholder='Matricule' type='password'>
  <input name='verprenoms' placeholder='Prenoms' type='text' id='prenom'><br/><br/>
  <input type="checkbox" name='souvenir' id='souvenir'style='float:left'>&nbsp;&nbsp;Se souvenir de moi<br/><br/>
  <input class='animated' type='submit' value="Se connecter" style='clear:both'>
</form>
  <a class='forgot' href='inscription'>Pas encore inscrit?</a>
</div>

</body>
</html>
