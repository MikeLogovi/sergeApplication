<?php
namespace App\view\acceuil;
use App\view\acceuil\ForumManager;
use \PDO as PDO;
$forumManager=new ForumManager();
$req=$forumManager->getMessage();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$site::WEB_SITE_NAME;?>'S FORUM</title>
    <link href="https://fonts.googleapis.com/css?family=Inconsolata|Rubik:300,400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="src/public/acceuil/css/styles-merged.css">
    <link rel="stylesheet" href="src/public/acceuil/css/style.css">
     <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="probootstrap-loader"></div>

  <header role="banner" class="probootstrap-header">
    <div class="container">
        <a href="index.html" class="probootstrap-logo"><?=$site::WEB_SITE_NAME;?><span>.</span></a>

        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
            <?php if(isset($_SESSION['user']['id'])):?>
            <li class="active"><a href="acceuil"><strong style='font-size:15px;color:#012'>ACCEUIL</strong></a></li>
            <li><a href="forum"><strong style='font-size:15px;color:#012'>PUBLIER UN MESSAGE</strong></a></li>
            <li><a href="listeMessage"><strong style='font-size:15px;color:#012'>GESTION DES MESSAGES</strong></a></li>
            <li><a href="listeMembre">G<strong style='font-size:15px;color:#012'>ESTION DES MEMBRES</strong></a></li>

            <?php else:?>
            <li class="active"><a href="acceuil"><strong style='font-size:15px;color:#012'>ACCEUIL</strong></a></li>
            <li><a href="connexion"><strong style='font-size:15px;color:#012'>PUBLIER UN MESSAGE</strong></a></li>
            <li><a href="connexion"><strong style='font-size:15px;color:#012'>GESTION DES MESSAGES</strong></a></li>
            <li><a href="connexion"><strong style='font-size:15px;color:#012' >GESTION DES MEMBRES</strong></a></li>
            <li><a href="inscription"><strong style='font-size:15px;color:#012'>S'INSCRIRE</strong></a></li>
            <?php endif?>
          </ul>
          <div class="extra-text visible-xs">
            <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
            <h5>Connect</h5>
            <ul class="social-buttons">
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-facebook2"></i></a></li>
              <li><a href="#"><i class="icon-instagram2"></i></a></li>
            </ul>
          </div>
        </nav>
        <?php require('src/view/partials/errors_form.php');?>
    </div>
  </header>
  <!-- END: header -->

  <div class="probootstrap-main-content">
    <section class="probootstrap-slider flexslider">
      <ul class="slides">
         <!-- class="overlay" -->
        <li style="background-image: url(src/public/acceuil/img/acceuil2.png);">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="probootstrap-slider-text text-center">
                  <h1 class="probootstrap-heading probootstrap-animate mb20" style="color:rgba(255,0,0,0.5)">Bienvenue sur le forum de <?=$site::WEB_SITE_NAME;?>!</h1>
                  <p class="probootstrap-animate"><a style="background-color:rgba(255,0,0,1)" href="connexion" class="btn btn-ghost btn-ghost-white">CONNECTE TOI</a></p>
                </div>
              </div>
            </div>
          </div>
        </li>
        <!-- class="overlay" -->
        <li style="background-image: url(src/public/acceuil/img/acceuil1.png);">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="probootstrap-slider-text text-center">
                  <h1 class="probootstrap-heading probootstrap-animate mb20" style="color:rgba(0,100,255,1)">
                    des discussions t'attendent!
                  </h1>
                   <p class="probootstrap-animate">
                    <a style="background-color:rgba(0,100,255,1)" href="connexion" class="btn btn-ghost btn-ghost-white">
                       Connecte toi
                    </a>
                   </p>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </section>
    <?php if($req->rowCount()!=0):?>
    <section class="probootstrap-section probootstrap-bg-white">
      <div class="container-fluid">
        <div class="section-heading text-center">
          <h2 class="mt0 mb0">DERNIERS MESSAGES PUBLIES</h2>
        </div>
      </div>
    </section>

    <section class="probootstrap-section probootstrap-bg-white">
        <div class="container">
          <!-- END row -->
          <div class="row">
            <div class="col-md-12 probootstrap-animate">
              <div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth mt50">
                <?php while($data=$req->fetch(PDO::FETCH_OBJ)){?>
                <div class="item">
                  <div class="probootstrap-testimony-wrap">
                    <figure>
                      <img src="<?=$data->photoDeProfil;?>" alt="Etudiant">
                    </figure>
                    <blockquote class="quote">&ldquo;<?=$data->contenu;?>.&rdquo; <cite class="author">&mdash;<?=$data->userName;?></cite></blockquote>
                  </div>
                </div>
              <?php }?>
              </div>
            </div>
          </div>
          <!-- END row -->
        </div>
      </section>
       <?php endif;?>
    </div>

    <div class="probootstrap-footer-spacer"></div>
    <footer class="probootstrap-footer">
      <div class="probootstrap-footer-section">
        <div class="container">
          <div class="row mb80">
            <div class="col-md-4">
              <div class="probootstrap-footer-widget">
              <h3>A PROPOS DE NOUS</h3>
              <p>BLUEBEARD est un forum de partage de sujet de discussions de tout genre</p>
              <p><a href="connexion" class="btn btn-ghost btn-ghost-white btn-sm">SE CONNECTER</a></p>
              </div>
            </div>
            <div class="col-md-4" style='visibility:hidden;'>
              <div style='color:white' class="probootstrap-link-wrap probootstrap-footer-widget">
                <h3>ACTIVITES</h3>
                <ul >
                  <li><a  href="#">Communiquer entre etudiants</a></li>
                  <li><a href="#">Partager nos difficultes</a></li>
                  <li><a href="#">Se soutenir mutuellement</a></li>
                  <li><a  href="#">Se partager des sujets d'examens </a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="probootstrap-footer-widget">
                <h3>Suivez nous</h3>
                <ul class="probootstrap-footer-social">
                  <li><a href="#"><i class="icon-twitter"></i></a></li>
                  <li><a href="#"><i class="icon-facebook"></i></a></li>
                  <li><a href="#"><i class="icon-dribbble"></i></a></li>
                  <li><a href="#"><i class="icon-instagram2"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <p class="text-center">&copy; <?=$site::WEB_SITE_NAME;?>'S CORPORATION. Designed by <a href="#"><?=$site::WEB_SITE_DEVELOPPER;?></a><i class="icon-heart2"></i></p>
          </div>
        </div>
      </div>
    </footer>

  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
  </div>


  <script src="src/public/acceuil/js/scripts.min.js"></script>
  <script src="src/public/acceuil/js/main.min.js"></script>


  </body>
</html>
