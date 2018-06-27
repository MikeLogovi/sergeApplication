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
                    <label for="prenoms">Prénoms</label>
                    <input type="text" class="form-control" id="prenoms" name="prenomsModif" placeholder="Votre prénom" <?='value='.$function->get_input('prenomsModif');?>>
                  </div>
                 <div class="form-group">
                    <label>Classe</label>
                    <select class="form-control" name='classeModif' id='classe'>
                      <option value='1ere annee'>1ere annee</option>
                      <option value='2eme annee'>2eme annee</option>
                      <option value='3eme annee'>3eme annee</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="dateNaissance">Date de naissance</label>
                    <input type="date" class="form-control" name="dateNaissanceModif" id="dateNaissance" <?='value='.$function->get_input('dateNaissanceModif');?>>
                  </div>
                   <div class="form-group">
                    <label for="numeroTelephone">Numéro de telephone</label>
                    <input type="text" class="form-control" id="numeroTelephone" name="numeroTelephoneModif" placeholder="+22893575268" <?='value='.$function->get_input('numeroTelephoneModif');?>>
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
