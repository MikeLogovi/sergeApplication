
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forum d'ESGIS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="src/public/application/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="src/public/application/adminlte.css">
    <link rel="stylesheet" href="src/public/application/plugins/datatables/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="src/public/application/plugins/datatables/dataTables.bootstrap4.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="acceuil" class="nav-link">Acceuil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="forum" class="nav-link">Forum</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="listeMessage" class="nav-link">Messages publiés</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="listeEtudiant" class="nav-link">Liste des étudiants</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="deconnexion" class="nav-link">Déconnexion</a>
      </li>
    </ul>

  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
      <img src="src/public/application/dist/img/e.jpg" alt="ESGIS Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ESGIS</span>
    </a>


    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=$_SESSION['user']['photoDeProfil'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['user']['prenoms'];?></a>
        </div>
      </div>


      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Mon compte
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profil" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Voir mon profil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="modifProfil" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Modifier mon profil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="supprimerProfil" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Supprimer mon compte</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Utilitaires
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="listeEtudiant" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Liste des étudiants</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listeMessage" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                   <p>Liste des messages </p>
                </a>
              </li>
        </ul>
      </nav>

    </div>

  </aside>


  <div class="content-wrapper">


     <?=$content;?>

  </div>


  <aside class="control-sidebar control-sidebar-dark">

  </aside>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <strong>ESGIS'S CORPORATION. &copy; 2018 <a href="#">Designed by AFANGBEGNON Serge<i class="icon-heart2"></i></a>.</strong>

    </div>
   <span style="float:left">Tous droits réservés.</span>
  </footer>

</div>

<script src="src/public/application/plugins/jquery/jquery.min.js"></script>
<script src="src/view/application/forum/forum_style/js/main.js"></script>

<script src="src/public/application/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="src/public/application/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="src/public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="src/public/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="src/public/application/dist/js/adminlte.js"></script>

<script src="src/public/application/dist/js/demo.js"></script>
</body>
</html>
