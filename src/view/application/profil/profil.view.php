
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">MON PROFIL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="acceuil">Acceuil</a></li>
              <li class="breadcrumb-item active">Mon profil </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">


            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?=$_SESSION['user']['photoDeProfil'];?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?=$_SESSION['user']['prenoms'];?></h3>

                <p class="text-muted text-center">Etudiant à ESGIS</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Classe</b> <a class="float-right"><?=$_SESSION['user']['classe'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Date de naissance</b> <a class="float-right"<?=$_SESSION['user']['dateNaissance'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Numero de telephone</b> <a class="float-right"><?=$_SESSION['user']['numeroTelephone'];?></a>
                  </li>
                </ul>

                <a href="modifProfil" class="btn btn-primary btn-block"><b>Modifier mon profil</b></a>
              </div>

            </div>
        </div>
      </div>
    </div>
  </section>
