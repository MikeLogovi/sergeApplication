<?php
namespace App\view\application\liste_message;
use App\view\application\liste_message\ForumManager;
use \PDO as PDO;
$forumManager=new ForumManager();
$req=$forumManager->getMessage();
?>
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">LISTE DES MESSAGES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="acceuil">Acceuil</a></li>
              <li class="breadcrumb-item active">Liste des messages </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 <?php require('src/view/partials/errors_form.php');?>
  <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Messages publiés</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                  <tr>
                    <th>Auteur</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Date de publication</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($data=$req->fetch(PDO::FETCH_OBJ)){?>
                  <tr>
                    <td><?=$data->prenoms;?></td>
                    <td><?=$data->titre;?></td>
                    <td><?=$data->contenu;?></td>
                    <td><?=$data->datePublication;?></td>
                    <td>
                <?php if($data->matricule==$_SESSION['user']['matricule']):?>
                <div class="margin">
                  <div class="btn-group">
                    <a href='#'  class="btn btn-success">Modifier</a>
                  </div>
                  <div class="btn-group">
                    <a href='listeMessage/supprimer/<?=$data->id;?>' class="btn btn-danger">Supprimer</a>
                  </div>
                </div>
              <?php endif?>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row -->
