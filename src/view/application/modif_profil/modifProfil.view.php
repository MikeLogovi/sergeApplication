<?php
namespace App\view\application\modif_profil;
use App\classes\inscription\Functions;
$function=new Functions();
?>
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">MODIFICATION DE PROFIL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="acceuil">Acceuil</a></li>
              <li class="breadcrumb-item active">Modification de profil </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
 <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">PROFIL</h3>
              </div>
               <?php require('src/view/partials/errors_form.php');?>
              <form role="form" method='POST' action='modifProfilTreatment' enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="username" name="usernameModif" placeholder="Votre prénom" <?='value='.$function->get_input('usernameModif');?>>
                  </div>

                   <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" class="form-control" name="emailModif" id="email" <?='value='.$function->get_input('emailModif');?>>
                  </div>

                  <div class="form-group">
                    <label for="oldmotpass">Mot de passe actuel</label>
                    <input type="password" class="form-control" id="oldmotpass" name="oldmotpassModif" <?='value='.$function->get_input('oldmotpassModif');?>>
                  </div>

                   <div class="form-group">
                    <label for="newmotpass">Nouveau Mot de passe</label>
                    <input type="password" class="form-control" id="newmotpass" name="newmotpassModif"<?='value='.$function->get_input('newmotpassModif');?>>
                  </div>
                  <div class="form-group">
                    <label for="photoDeProfil">Photo de profil</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photoDeProfil" name="photoDeProfilModif">
                        <label class="custom-file-label" for="photoDeProfil">Choisissez un fichier</label>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
              </form>
            </div>
        </div>

      </div>
    </section>
