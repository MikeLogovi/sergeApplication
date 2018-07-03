<?php
namespace App\view\formulaire;
use App\classes\inscription\Functions;
$function=new Functions();
if(isset($_SESSION['user']['id'])){
  header('Location:forum');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$site::WEB_SITE_NAME.'-CONNEXION';?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="src/public/inscription/css/main.css"/>
	<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
</head>
<body>
<div class='login'>
  <h2>Connexion</h2>
   <?php require('src/view/partials/errors_form.php');?>
  <form method='post' action='connexionTreatment'>
  <input id='username' name='verusername' placeholder="Nom d'utilisateur" type='text'>
  <input name='vermotpass' placeholder='Mot de passe' type='text' id='vermotpass'><br/><br/>
  <input type="checkbox" name='souvenir' id='souvenir'style='float:left'>&nbsp;&nbsp;Se souvenir de moi<br/><br/>
  <input class='animated' type='submit' value="Se connecter" style='clear:both'>
</form>
  <a class='forgot' href='inscription'>Mot de passe oublié?</a>
</div>
</form>
  <a class='forgot' href='inscription'>Pas encore inscrit?</a>
</div>

</body>
</html>
