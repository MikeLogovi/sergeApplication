<?php

          $site=new App\classes\site\Site();
          $userManager=new App\classes\User\UserManager();
          $username= $_SESSION['user']['username'];

          $person=$userManager->read($username)->fetch(PDO::FETCH_OBJ);


          $user = new App\classes\User\User($person->id,$person->userName,$person->email,$person->motpass,$person->photoDeProfil);

          $userManager->update($user);

          $user->setId($person->id);
          $_SESSION['user']['photoDeProfil']=$user->getPhotoDeProfil();


