<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forum <?=$site::WEB_SITE_NAME;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="src/public/application/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="src/public/application/adminlte.css">
    <link rel="stylesheet" href="src/public/application/plugins/datatables/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="src/public/application/plugins/datatables/dataTables.bootstrap4.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- FROALA EDITOR -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="src/public/application/froala/css/froala_editor.css">
  <link rel="stylesheet" href="src/public/application/froala/css/froala_style.css">
  <link rel="stylesheet" href="src/public/application/froala/css/plugins/code_view.css">
  <link rel="stylesheet" href="src/public/application/froala/css/plugins/colors.css">
  <link rel="stylesheet" href="src/public/application/froala/css/plugins/emoticons.css">
  <link rel="stylesheet" href="src/public/application/froala/css/plugins/image_manager.css">
  <link rel="stylesheet" href="src/public/application/froala/css/plugins/image.css">
  <link rel="stylesheet" href="src/public/application/froala/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="src/public/application/froala/css/plugins/table.css">
  <link rel="stylesheet" href="src/public/application/froala/css/plugins/char_counter.css">
  <link rel="stylesheet" href="src/public/application/froala/css/plugins/video.css">
  <link rel="stylesheet" href="src/public/application/froala/css/plugins/fullscreen.css">
  <link rel="stylesheet" href="src/public/application/froala/css/plugins/file.css">
  <link rel="stylesheet" href="src/public/application/froala/css/plugins/quick_insert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-------------------->
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
        <a href="listeMembre" class="nav-link">Liste des membres</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="deconnexion" class="nav-link">Déconnexion</a>
      </li>
    </ul>

      <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" >
          <div id='lastMessages'>
          <a href="#" class="dropdown-item">
            <!-- Message Start-->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
        </div>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
        <a href="forum" class="dropdown-item dropdown-footer">Voir tous les messages</a>

        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <div id='notifications'>
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </div>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="forum" class="brand-link">
      <img src="src/public/application/dist/img/B.png" alt="<?=$site::WEB_SITE_NAME?>'s Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">&nbsp;<?=$site::WEB_SITE_NAME;?></span>
    </a>


    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=$_SESSION['user']['photoDeProfil'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['user']['username'];?></a>
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
                <a href="listeMembre" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Liste des membres</p>
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
      <strong><?=$site::WEB_SITE_NAME;?>'S CORPORATION. &copy; <date>2018</date> <a href="#">Designed by <?=$site::WEB_SITE_DEVELOPPER;?><i class="icon-heart2"></i></a>.</strong>

    </div>
   <span style="float:left">Tous droits réservés.</span>
  </footer>

</div>

<script src="src/public/application/plugins/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js"></script>
<script src="src/view/application/forum/forum_style/js/main.js"></script>
<script src="src/view/application/inbox/inbox_style/js/main.js"></script>

<script src="src/public/application/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="src/public/application/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="src/public/application/dist/js/adminlte.js"></script>

<script src="src/public/application/dist/js/demo.js"></script>
<script>


var reloadTime=1000;
var timeout=1000;
var reloadTime2=20000;
var timeout=1000;
function getLastMessage(){
   $.getJSON('src/view/application/forum/forumGetLastMessages.php',function(data){

         $('#lastMessages').html(data);

  });
}
function getNotifications(){
  $.getJSON('src/view/application/notifications/getNotifications.php',function(data){

         $('#notifications').html(data);

  });
}

  window.setTimeout(getLastMessage,timeout);
   window.setInterval(getLastMessage,reloadTime);
    window.setTimeout(getNotifications,timeout);
   window.setInterval(getNotifications,reloadTime2);
</script>

<!--- FROLA EDITOR--->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

  <script type="text/javascript" src="src/public/application/froala/js/froala_editor.min.js" ></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="src/public/application/froala/js/plugins/video.min.js"></script>

  <script>
    $(function(){
      $('#fmessage').froalaEditor({
        // Define new link styles.
        linkStyles: {
          class1: 'Class 1',
          class2: 'Class 2'
        }
      });
       $('#Imessage').froalaEditor({
        // Define new link styles.
        linkStyles: {
          class1: 'Class 1',
          class2: 'Class 2'
        }
      });
    });
  </script>
<!------------------->
</body>
</html>
