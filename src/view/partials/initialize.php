<?php

          $site=new App\classes\site\Site();
          $userManager=new App\classes\User\UserManager();
          $matricule= $_SESSION['user']['matricule'];
          $person=$userManager->read($matricule)->fetch(PDO::FETCH_OBJ);
          $user = new App\classes\User\User($person->matricule,$person->prenoms,$person->classe,$person->dateNaissance,$person->numeroTelephone,$person->photoDeProfil);
          $userManager->update($user);
          $user->setMatricule($person->matricule);
          $_SESSION['user']['photoDeProfil']=$user->getPhotoDeProfil();


