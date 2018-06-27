<?php
namespace App\view\application\liste_etudiant;
use App\classes\User\UserManager;
use \PDO as PDO;
$userManager=new UserManager();
$req=$userManager->getList();
?>
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">LISTE DES ETUDIANTS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="acceuil">Acceuil</a></li>
              <li class="breadcrumb-item active">Liste des etudiants </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

 <section class="content">
      <div class="row">
        <div class="col-12">


          <div class="card">
            <div class="card-header">
              <h3 class="card-title">ETUDIANT</h3>
            </div>
            <!-- /.card-header -->
             <?php require('src/view/partials/errors_form.php');?>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Prénoms</th>
                  <th>Classe</th>
                  <th>Date de naissance</th>
                  <th>Numéro de téléphone</th>

                </tr>
                </thead>
                <tbody>
                <?php while($data=$req->fetch(PDO::FETCH_OBJ)){?>
                    <tr>
                      <td><?=$data->prenoms;?></td>
                      <td><?=$data->classe;?></td>
                      <td><?=$data->dateNaissance;?></td>
                      <td><?=$data->numeroTelephone;?></td>
                    </tr>
                <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Prénoms</th>
                  <th>Classe</th>
                  <th>Date de naissance</th>
                  <th>Numéro de téléphone</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
